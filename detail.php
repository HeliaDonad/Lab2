<?php
include_once(__DIR__ . DIRECTORY_SEPARATOR . "./classes/Db.php");

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    exit("NO SESSION");
}

if (!isset($_GET['thema_id'])) {
    exit("Thema ID niet opgegeven");
}

$thema_id = intval($_GET['thema_id']);

$conn = Db::getConnection();

$query = "SELECT naam FROM themas WHERE id = :thema_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(":thema_id", $thema_id, PDO::PARAM_INT);
$stmt->execute();
$thema = $stmt->fetch(PDO::FETCH_ASSOC);

$query = "SELECT naam FROM organisaties WHERE thema_id = :thema_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(":thema_id", $thema_id, PDO::PARAM_INT);
$stmt->execute();
$organisaties = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($thema['naam']); ?> - Organisaties</title>
    <link rel="stylesheet" href="css/nav.css?12395">
    <link rel="stylesheet" href="css/dashboard.css?15345">
    <link rel="stylesheet" href="css/shared.css?11345">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
<header>
<nav>
    <a class="logo" href="#">
        <img src="images/general/logo.svg" alt="logo">
    </a>
    <label class="burger" for="burger">&#9776;</label>
    <label class="close" for="burger">&times;</label>
    <input type="checkbox" id="burger">
    <ul class="subnav">
        <li><a href="#">Mijn mensenrechten</a></li>
        <li><a href="#">Thema's</a></li>
        <li><a href="#">Zittingen</a></li>
        <li><a href="#">Vrijwilligerswerk</a></li>
        <li><a href="#">Activiteiten</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
</nav>
<div class="actions">
    <div class="action-icon"><i class="material-icons">notifications</i></div>
    <div class="action-icon"><i class="material-icons">settings</i></div>
    <div class="action-icon"><i class="material-icons">account_circle</i></div>
</div>
</header>
<a href="/LAB2/signin_login_logout/logout.php">Log Out</a>

<div class="container">
    <h2>Organisaties voor <?php echo htmlspecialchars($thema['naam']); ?></h2>
    <ul>
        <?php foreach ($organisaties as $organisatie): ?>
            <li><?php echo htmlspecialchars($organisatie['naam']); ?></li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>
