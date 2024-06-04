<?php
include_once(__DIR__ . DIRECTORY_SEPARATOR . "./classes/Db.php");

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    exit("NO SESSION");
}

$conn = Db::getConnection();

$query = "SELECT * FROM themas";
$result = $conn->query($query);
$themas = $result->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>federaalinstituutmensenrechten</title>
    <link rel="stylesheet" href="css/nav.css?12395">
    <link rel="stylesheet" href="css/dashboard.css?555778899">
    <link rel="stylesheet" href="css/shared.css?11345">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

<?php include_once("./components/header.inc.php"); ?>

<a href="/LAB2/signin_login_logout/logout.php">Log Out</a>

<!-- Filter Section -->
<div class="filter-container">
    <div class="search-box">
        <input type="text" placeholder="Zoeken...">
    </div>
    <div class="select-box">
        <select>
            <option value="">Kies een functie...</option>
            <option value="Schendingen & klachten">Schendingen & klachten</option>
            <option value="Hulpverlening">Hulpverlening</option>
            <option value="Informatie & Monitoring">Informatie & Monitoring</option>
            <option value="Beleidsbeïnvloeding & Actie">Beleidsbeïnvloeding & Actie</option>
        </select>
    </div>
    <button class="save-button">Opslaan</button>
</div>

<div class="container">
    <h2>Eerste Hulp Bij Mensenrechten</h2>
    <div class="button-bar">
        <a href="#" class="button wegwijzer"> 
            <span class="text">Mijn wegwijzer</span>
            <img src="images/iconen/mijnwegwijzer.svg" alt="Mijn wegwijzer">
        </a>
        <?php foreach ($themas as $thema): ?>
            <a href="detail.php?thema_id=<?php echo $thema['id']; ?>" class="button"> 
                <span class="text"><?php echo htmlspecialchars($thema['naam']); ?></span>
                <img src="images/iconen/<?php echo strtolower(str_replace(' ', '_', $thema['naam'])); ?>.svg" alt="<?php echo htmlspecialchars($thema['naam']); ?>">
            </a>
        <?php endforeach; ?>
    </div>
</div>

<script src="button1.js"></script>
</body>
</html>
