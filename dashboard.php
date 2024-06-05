<?php
include_once(__DIR__ . DIRECTORY_SEPARATOR . "./classes/Db.php");
include_once(__DIR__ . DIRECTORY_SEPARATOR . "./classes/Thema.php");

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    exit("NO SESSION");
}

$conn = Db::getConnection();

// Query voor het ophalen van thema's
$query = "SELECT * FROM themas";
$result = $conn->query($query);
$themas = [];
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $themas[] = new Thema($row['id'], $row['naam'], $row['icoon']); 
}

// Query voor het ophalen van filters
$query_filters = "SELECT * FROM filters";
$result_filters = $conn->query($query_filters);
$filters = [];
while ($row_filter = $result_filters->fetch(PDO::FETCH_ASSOC)) {
    $filters[] = $row_filter;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eerste Hulp Bij Mensenrechten</title>
    <link rel="stylesheet" href="css/nav.css?12395">
    <link rel="stylesheet" href="css/dashboard.css?57849">
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
            <?php foreach ($filters as $filter): ?>
                <option value="<?php echo htmlspecialchars($filter['id']); ?>"><?php echo htmlspecialchars($filter['naam']); ?></option>
            <?php endforeach; ?>
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
            <a href="./pages/detail.php?thema_id=<?php echo $thema->getId(); ?>" class="button"> 
                <span class="text"><?php echo htmlspecialchars($thema->getNaam()); ?></span>
                <img src="data:image/svg+xml;base64,<?php echo base64_encode($thema->getIcoonData()); ?>" alt="<?php echo htmlspecialchars($thema->getNaam()); ?>"> 
            </a>
        <?php endforeach; ?>
    </div>
</div>

<script src="button1.js"></script>
</body>
</html>
