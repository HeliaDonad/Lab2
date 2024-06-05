<?php
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Db.php");
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Thema.php");
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Organisatie.php");
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Thema_Organisatie.php");

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    exit("NO SESSION");
}

if (!isset($_GET['thema_id'])) {
    exit("Thema ID niet opgegeven");
}

$thema_id = intval($_GET['thema_id']);

$conn = Db::getConnection();

// Fetch theme details using Thema class
$query = "SELECT * FROM themas WHERE id = :thema_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(":thema_id", $thema_id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$thema = new Thema($row['id'], $row['naam']);

// Fetch related organizations using ThemaOrganisatie and Organisatie classes
$query = "SELECT organisaties.id, organisaties.naam, organisaties.url 
          FROM organisaties 
          JOIN thema_organisatie ON organisaties.id = thema_organisatie.organisatie_id 
          WHERE thema_organisatie.thema_id = :thema_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(":thema_id", $thema_id, PDO::PARAM_INT);
$stmt->execute();
$organisaties = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $organisaties[] = new Organisatie($row['id'], $row['naam'], $row['url'], null);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($thema->getNaam()); ?> - Organisaties</title>
    <link rel="stylesheet" href="../css/nav.css?49977">
    <link rel="stylesheet" href="../css/detail.css?19345">
    <link rel="stylesheet" href="../css/shared.css?14445">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

<?php include_once("../components/headerPages.inc.php"); ?>

<div class="container">
    <h2><?php echo htmlspecialchars($thema->getNaam()); ?></h2>
    <ul>
        <?php foreach ($organisaties as $organisatie): ?>
            <li><a href="<?php echo htmlspecialchars($organisatie->getUrl()); ?>" target="_blank"><?php echo htmlspecialchars($organisatie->getNaam()); ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>
