<?php
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Db.php");
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Zitting.php");

$conn = Db::getConnection();

// Query voor het ophalen van zittingen
$query_zittingen = "SELECT * FROM zittingen";
$result_zittingen = $conn->query($query_zittingen);
$zittingen = [];
while ($row = $result_zittingen->fetch(PDO::FETCH_ASSOC)) {
    $zittingen[] = new Zitting($row['titel'], $row['info'], $row['taal'], $row['datum'], $row['tijd'], $row['plaats'], $row['info_icoon'], $row['taal_icoon'], $row['datum_icoon'], $row['tijd_icoon'], $row['plaats_icoon']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wegwijzer - Grote Wegwijzer</title>
    <link rel="stylesheet" href="../css/nav.css?48593">
    <link rel="stylesheet" href="../css/zittingen.css?29498">
    <link rel="stylesheet" href="../css/shared.css?88988">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <?php include_once("../components/headerPages.inc.php"); ?>
    <div class="container">
        <h2>Zittingen</h2>

        <?php foreach ($zittingen as $zitting): ?>
            <div class="zitting">
                <h3><?php echo htmlspecialchars($zitting->getTitel()); ?></h3>
                <p class="icon-text">
                    <img src="data:image/svg+xml;base64,<?php echo base64_encode($zitting->getInfoIcoon()); ?>" alt="<?php echo htmlspecialchars($zitting->getInfo()); ?>">
                    <?php echo htmlspecialchars($zitting->getInfo()); ?>
                </p>
                <p class="icon-text">
                    <img src="data:image/svg+xml;base64,<?php echo base64_encode($zitting->getTaalIcoon()); ?>" alt="<?php echo htmlspecialchars($zitting->getTaal()); ?>">
                    <?php echo htmlspecialchars($zitting->getTaal()); ?>
                </p>
                <p class="icon-text">
                    <img src="data:image/svg+xml;base64,<?php echo base64_encode($zitting->getDatumIcoon()); ?>" alt="<?php echo htmlspecialchars($zitting->getDatum()); ?>">
                    <?php echo htmlspecialchars($zitting->getDatum()); ?>
                </p>
                <p class="icon-text">
                    <img src="data:image/svg+xml;base64,<?php echo base64_encode($zitting->getTijdIcoon()); ?>" alt="<?php echo htmlspecialchars($zitting->getTijd()); ?>">
                    <?php echo htmlspecialchars($zitting->getTijd()); ?>
                </p>
                <p class="icon-text">
                    <img src="data:image/svg+xml;base64,<?php echo base64_encode($zitting->getPlaatsIcoon()); ?>" alt="<?php echo htmlspecialchars($zitting->getPlaats()); ?>">
                    <?php echo htmlspecialchars($zitting->getPlaats()); ?>
                </p>
            </div>
        <?php endforeach; ?>

    </div>
</body>
</html>
