<?php
include_once(__DIR__ . DIRECTORY_SEPARATOR . "./classes/Db.php");

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    exit("NO SESSION");
}

if (!isset($_GET['filter'])) {
    exit("Filter niet ingesteld");
}

$filter_id = intval($_GET['filter']);

$conn = Db::getConnection();

// Query om de filternaam op te halen
$query = "SELECT naam FROM filters WHERE id = :filter_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(":filter_id", $filter_id, PDO::PARAM_INT);
$stmt->execute();
$filter = $stmt->fetch(PDO::FETCH_ASSOC);

// Query om de gegevens op te halen op basis van de filter_id
$query = "SELECT o.naam AS organisatie_naam, o.url AS organisatie_url, t.naam AS thema_naam
          FROM filter_organisatie AS fo
          JOIN themas AS t ON fo.thema_id = t.id
          JOIN organisaties AS o ON fo.organisatie_id = o.id
          WHERE fo.filter_id = :filter_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(":filter_id", $filter_id, PDO::PARAM_INT);
$stmt->execute();
$gegevens = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gefilterde resultaten</title>
    <!-- Voeg hier je CSS-bestanden toe -->
</head>
<body>
<h1>Gefilterde resultaten voor: <?php echo htmlspecialchars($filter['naam']); ?></h1>
<ul>
    <?php foreach ($gegevens as $gegeven): ?>
        <li>
            <a href="<?php echo htmlspecialchars($gegeven['organisatie_url']); ?>" target="_blank">
                <?php echo htmlspecialchars($gegeven['organisatie_naam']); ?> - <?php echo htmlspecialchars($gegeven['thema_naam']); ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
<!-- Voeg hier je JavaScript-bestanden toe -->
</body>
</html>
