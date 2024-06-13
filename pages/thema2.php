<?php
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Db.php");
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Themas2.php");

/*session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    exit("NO SESSION");
}*/

$conn = Db::getConnection();

// Query voor het ophalen van themas
$query_themas = "SELECT * FROM themas2";
$result_themas = $conn->query($query_themas);
$themas = [];
while ($row = $result_themas->fetch(PDO::FETCH_ASSOC)) {
    $themas[] = new Thema2($row['id'], $row['naam'], $row['icoon']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eerste Hulp Bij Mensenrechten</title>
    <link rel="stylesheet" href="../css/nav.css?55677">
    <link rel="stylesheet" href="../css/thema2.css?93849">
    <link rel="stylesheet" href="../css/shared.css?18385">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

<?php include_once("../components/headerPages.inc.php"); ?>

<a href="/LAB2/signin_login_logout/logout.php">Log Out</a>

<div class="container">
    <h2>Informatie over mensenrechtenkwesties</h2>
    <p>Iedereen heeft mensenrechten, altijd en overal. Hieronder komt u meer te weten over uw rechten en die van anderen in specifieke situaties. </p>
    <div class="button-bar">
        <?php foreach ($themas as $thema): ?>
            <a href="./pages/detail_thema2.php?thema_id=<?php echo $thema->getId(); ?>" class="button"> 
                <span class="text"><?php echo htmlspecialchars($thema->getNaam()); ?></span>
                <img src="data:image/svg+xml;base64,<?php echo base64_encode($thema->getIcoonData()); ?>" alt="<?php echo htmlspecialchars($thema->getNaam()); ?>"> 
            </a>
        <?php endforeach; ?>
    </div>
</div>

<script src="button.js"></script>
</body>
</html>
