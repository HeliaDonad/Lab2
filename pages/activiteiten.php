<?php
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Db.php");
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Thema.php");

// Databaseverbinding
$conn = Db::getConnection();

$query_themas = "SELECT id, naam, icoon FROM themas ORDER BY sort_order";
$result_themas = $conn->query($query_themas);
$themas = [];
while ($row = $result_themas->fetch(PDO::FETCH_ASSOC)) {
    // Maak een Thema object aan met de gegevens uit de database
    $thema = new Thema($row['id'], $row['naam'], $row['icoon'], '', '');
    $themas[] = $thema;
}
$query_activiteiten = "SELECT id, image, tekst, tekst_url FROM activiteiten";
$result_activiteiten = $conn->query($query_activiteiten);
$activiteiten = [];
while ($row = $result_activiteiten->fetch(PDO::FETCH_ASSOC)) {
    $row['image'] = base64_encode($row['image']); // Convert BLOB to base64
    $activiteiten[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activiteiten rond mensenrechten</title>
    <link rel="stylesheet" href="../css/nav.css?89970">
    <link rel="stylesheet" href="../css/activiteiten.css?97578">
    <link rel="stylesheet" href="../css/filter2.css?66678">
    <link rel="stylesheet" href="../css/shared.css">
</head>
<body>
    <?php include_once("../components/headerPages.inc.php"); ?>
    <div class="container">
    <h2>Activiteiten rond mensenrechten</h2>
        <?php include_once("../components/filter2.inc.php"); ?>

    <div class="container2">
        <div class="button-bar">
            <?php foreach ($activiteiten as $item): ?>
                <!--<a href="<?php echo htmlspecialchars($item['tekst_url']); ?>" class="button" style="background-image: url('data:image/svg+xml;base64,<?php echo $item['image']; ?>');">-->
                <a href="<?php echo htmlspecialchars($item['tekst_url']); ?>" class="button" style="background-image: url('data:image/png;base64,<?php echo $item['image']; ?>');">
                    <span class="text"><?php echo htmlspecialchars($item['tekst']); ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>       
        <script src="../js/filter2.js"></script>
    </div>
</body>
</html>