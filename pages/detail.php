<?php
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Db.php");

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

$query = "SELECT organisaties.id, organisaties.naam 
          FROM organisaties 
          JOIN thema_organisatie ON organisaties.id = thema_organisatie.organisatie_id 
          WHERE thema_organisatie.thema_id = :thema_id";
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
    <link rel="stylesheet" href="../css/nav.css?49977">
    <link rel="stylesheet" href="../css/detail.css?15345">
    <link rel="stylesheet" href="../css/shared.css?14445">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

<?php include_once("../components/headerPages.inc.php"); ?>

<div class="container">
    <h2><?php echo htmlspecialchars($thema['naam']); ?></h2>
    <ul>
        <?php foreach ($organisaties as $organisatie): ?>
            <li><a href="#?id=<?php echo htmlspecialchars($organisatie['id']); ?>"><?php echo htmlspecialchars($organisatie['naam']); ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>
