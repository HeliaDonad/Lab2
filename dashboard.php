<?php
include_once(__DIR__ . DIRECTORY_SEPARATOR . "./classes/Db.php");
include_once(__DIR__ . DIRECTORY_SEPARATOR . "./classes/Thema.php");

session_start();

$conn = Db::getConnection();

// Query voor het ophalen van filters
$query_filters = "SELECT * FROM filters";
$result_filters = $conn->query($query_filters);
$filters = [];
while ($row_filter = $result_filters->fetch(PDO::FETCH_ASSOC)) {
    $filters[] = $row_filter;
}

$selectedFilterId = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selectedFilterId'])) {
    $selectedFilterId = $_POST['selectedFilterId'];

    // Redirect naar dezelfde pagina om te voorkomen dat de browser wordt gevraagd om gegevens opnieuw in te dienen
    header("Location: dashboard.php?filter_id=" . $selectedFilterId);
    exit();
} elseif (isset($_GET['filter_id'])) {
    $selectedFilterId = $_GET['filter_id'];
}

// Query voor het ophalen van themas
if ($selectedFilterId === null || $selectedFilterId === '') {
    // Als er geen filter is geselecteerd, haal alle thema's op
    $query_themas = "SELECT * FROM themas ORDER BY sort_order";
    $result_themas = $conn->query($query_themas);
    $themas = [];
    while ($row = $result_themas->fetch(PDO::FETCH_ASSOC)) {
        $themas[] = new Thema($row['id'], $row['naam'], $row['icoon'], null, $row['hover']);
    }
} else {
    // Query voor het ophalen van gefilterde thema's
    $query = "SELECT t.id, t.naam, t.icoon, t.hover 
              FROM themas t 
              LEFT JOIN thema_organisatie to2 ON t.id = to2.thema_id 
              LEFT JOIN organisatie_filters ofil ON to2.organisatie_id = ofil.organisatie_id 
              WHERE ofil.filter_id = :filter_id 
              GROUP BY t.id 
              HAVING COUNT(to2.organisatie_id) > 0 
              ORDER BY t.sort_order";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":filter_id", $selectedFilterId, PDO::PARAM_INT);
    $stmt->execute();
    $themas = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $themas[] = new Thema($row['id'], $row['naam'], $row['icoon'], null, $row['hover']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eerste Hulp Bij Mensenrechten</title>
    <link rel="stylesheet" href="css/nav.css?24494">
    <link rel="stylesheet" href="css/dashboard.css?77914">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/shared.css?18382">
</head>
<body>

<?php include_once("./components/header.inc.php"); ?>

<a href="/LAB2/signin_login_logout/logout.php">Log Out</a>

<!-- Filter Section -->
<div class="filter-container">
    <form method="post" class="form-buttons">
        <div class="select-box">
            <select name="selectedFilterId">
                <option value="">Kies een functie...</option>
                <?php foreach ($filters as $filter): ?>
                    <option value="<?php echo htmlspecialchars($filter['id']); ?>"><?php echo htmlspecialchars($filter['naam']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="save-button">Opslaan</button>
    </form>
</div>

<div class="container">
    <h2>Eerste Hulp Bij Mensenrechten</h2>
    <p>Weet u niet bij welke mensenrechtenorganisatie u terecht kan? Maak gebruik van onze wegwijzer om u naar de juiste organisatie te laten leiden.</p>
    <div class="button-bar">
        <a href="./pages/grote_wegwijzer.php" class="button wegwijzer"> 
            <span class="text">Mijn wegwijzer</span>
            <img src="images/iconen/mijnwegwijzer.svg" alt="Mijn wegwijzer">
        </a>
        <?php foreach ($themas as $thema): ?>
            <?php if ($selectedFilterId): ?>
                <a href="./pages/detail_filter.php?thema_id=<?php echo $thema->getId(); ?>&filter_id=<?php echo $selectedFilterId; ?>" class="button" data-hover="<?php echo htmlspecialchars($thema->getHover()); ?>"> 
                    <span class="text"><?php echo htmlspecialchars($thema->getNaam()); ?></span>
                    <img src="data:image/svg+xml;base64,<?php echo base64_encode($thema->getIcoonData()); ?>" alt="<?php echo htmlspecialchars($thema->getNaam()); ?>"> 
                </a>
            <?php else: ?>
                <a href="./pages/detail.php?thema_id=<?php echo $thema->getId(); ?>" class="button" data-hover="<?php echo htmlspecialchars($thema->getHover()); ?>"> 
                    <span class="text"><?php echo htmlspecialchars($thema->getNaam()); ?></span>
                    <img src="data:image/svg+xml;base64,<?php echo base64_encode($thema->getIcoonData()); ?>" alt="<?php echo htmlspecialchars($thema->getNaam()); ?>">
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

<?php include_once("./components/footer.inc.php"); ?>
</body>
</html>
