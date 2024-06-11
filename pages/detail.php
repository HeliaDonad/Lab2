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

$query = "SELECT * FROM themas WHERE id = :thema_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(":thema_id", $thema_id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$thema = new Thema($row['id'], $row['naam'], null, $row['uitleg']);

// ThemaOrganisatie & Organisatie classes
$query = "SELECT organisaties.id, organisaties.naam, organisaties.url, organisaties.body_tekst, organisaties.knop_url, organisaties.knop_tekst, organisaties.contact_tekst
          FROM organisaties 
          JOIN thema_organisatie to2 ON organisaties.id = to2.organisatie_id 
          WHERE to2.thema_id = :thema_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(":thema_id", $thema_id, PDO::PARAM_INT);
$stmt->execute();
$organisaties = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $organisaties[] = new Organisatie($row['id'], $row['naam'], $row['url'], $row['body_tekst'], $row['knop_url'], $row['knop_tekst'], $row['contact_tekst'], $row['contact_url']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($thema->getNaam()); ?> - Organisaties</title>
    <link rel="stylesheet" href="../css/nav.css?48777">
    <link rel="stylesheet" href="../css/detail.css?89095">
    <link rel="stylesheet" href="../css/shared.css?18845">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

<?php include_once("../components/headerPages.inc.php"); ?>

<div class="container">
<a href="./wegwijzer.php?thema_id=<?php echo $thema_id; ?>" class="wegwijzer-button"> 
    <img src="../images/iconen/mijnwegwijzer.svg" alt="Mijn wegwijzer">
    <span class="button-text">Mijn wegwijzer</span>
</a>
        <h2><?php echo htmlspecialchars($thema->getNaam()); ?></h2>
        <p class="uitleg"><?php echo htmlspecialchars($thema->getUitleg()); ?></p>
    <div class="button-bar">
        <?php foreach ($organisaties as $organisatie): ?>
            <div class="button">
                <a href="<?php echo htmlspecialchars($organisatie->getUrl()); ?>"> 
                    <span class="text1"><?php echo htmlspecialchars($organisatie->getNaam()); ?></span>
                </a>
                <p><?php echo htmlspecialchars($organisatie->getBodyTekst()); ?></p>
                <a href="<?php echo htmlspecialchars($organisatie->getKnopUrl()); ?>" class="button2">
                    <span class="text2"><?php echo htmlspecialchars($organisatie->getKnopTekst()); ?></span>
                </a>
                <a href="<?php echo htmlspecialchars($organisatie->getContactUrl()); ?>">
                    <span><?php echo htmlspecialchars($organisatie->getContactTekst()); ?></span>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
