<?php 
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Db.php");
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Thema.php");

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    exit("NO SESSION");
}

if (!isset($_GET['thema_id'])) {
    exit("Thema ID niet opgegeven");
}

$thema_id = intval($_GET['thema_id']);

$conn = Db::getConnection();

$query = "SELECT * FROM themas WHERE id = :thema_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(":thema_id", $thema_id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$thema = new Thema($row['id'], $row['naam'], null, $row['uitleg']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($thema->getNaam()); ?> - Wegwijzer</title>
    <link rel="stylesheet" href="../css/nav.css?48907">
    <link rel="stylesheet" href="../css/wegwijzer.css?89095">
    <link rel="stylesheet" href="../css/shared.css?18845">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <?php include_once("../components/headerPages.inc.php"); ?>
<div class="container">
    <h3>Mijn wegwijzer</h3>
    <h2><?php echo htmlspecialchars($thema->getNaam()); ?></h2>
    <p class="uitleg"><?php echo htmlspecialchars($thema->getUitleg()); ?></p>
</div>
</body>
</html>
