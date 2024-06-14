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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vrijwilligerswerk</title>
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/vrijwilligerswerk.css?99778">
    <link rel="stylesheet" href="../css/filter2.css">
    <link rel="stylesheet" href="../css/shared.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <?php include_once("../components/headerPages.inc.php"); ?>
    <div class="container">
        <h2>Vrijwilligerswerk</h2>
        <?php include_once("../components/filter2.inc.php"); ?>
        
        <script src="./filter2.js"></script>
</body>
</html>