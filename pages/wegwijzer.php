<?php
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Db.php");
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Thema.php");
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Wegwijzer.php");

/*session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    exit("NO SESSION");
}*/

if (!isset($_GET['thema_id'])) {
    exit("Thema ID niet opgegeven");
}

$thema_id = intval($_GET['thema_id']);

$conn = Db::getConnection();
$thema = Thema::getThemaById($thema_id);

// Haal het filter-id op uit de database
$query = "SELECT filter_id FROM organisatie_filters WHERE id = 1"; 
$stmt = $conn->prepare($query);
$stmt->execute();
$filter_row = $stmt->fetch(PDO::FETCH_ASSOC);

// Controleer of het filter-id in de database overeenkomt met het filter-id in de URL
$filter_id = isset($_GET['filter_id']) ? intval($_GET['filter_id']) : null;
if (!$filter_row || $filter_row['filter_id'] != $filter_id) {
    exit("Filter ID is niet geldig");
}

$vraag_id = isset($_GET['vraag_id']) ? intval($_GET['vraag_id']) : 1;

$vraag = Wegwijzer::getVraagByIdAndThemaId($vraag_id, $thema_id, $filter_id);
$antwoorden = Wegwijzer::getAntwoordenByVraagId($vraag_id, $filter_id);

$action = isset($_GET['action']) ? $_GET['action'] : null;
$action_instructies = null;
$organisaties = null;

if ($action) {
    $action_info = Wegwijzer::getActionInstructiesByAction($action, $conn);
    $action_instructies = $action_info['action_instructies'];
    $knop_tekst = $action_info['knop_tekst'];
    $contact_tekst = $action_info['contact_tekst'];
    $knop_url = $action_info['knop_url'];

    switch ($action) {
        case 'CONTACT_ORGANIZATIONS':
            $organisaties = Wegwijzer::getDiscriminatieOrganisaties($conn);
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($thema->getNaam()); ?> - Wegwijzer</title>
    <link rel="stylesheet" href="../css/wegwijzer.css?88854">
    <link rel="stylesheet" href="../css/shared.css">
    <link rel="stylesheet" href="../css/footer.css?02593">
    <link rel="stylesheet" href="../css/nav.css?48989">

</head>
<body>
    <?php include_once("../components/headerPages.inc.php"); ?>
    <div class="container">
        <h3>Mijn wegwijzer</h3>
        <h2><?php echo htmlspecialchars($thema->getNaam()); ?></h2>
        <div class="blauwe-kader" id="vraag-container" style="<?php echo $action ? 'display: none;' : ''; ?>">
            <?php if ($vraag): ?>
                <div class="vraag-content" id="vraag-content">
                    <p><?php echo htmlspecialchars($vraag['vraag_tekst']); ?></p>
                    <?php if ($antwoorden): ?>
                        <form id="antwoord-form">
                            <?php foreach ($antwoorden as $antwoord): ?>
                                <?php
                                    $volgende_vraag_id = $antwoord['volgende_vraag_id'] ? '&vraag_id=' . $antwoord['volgende_vraag_id'] : '';
                                    $action_param = $antwoord['action'] ? '&action=' . $antwoord['action'] : '';
                                ?>
                                <input type="radio" id="antwoord-<?php echo $antwoord['id']; ?>" class="antwoord-selector" name="antwoord" value="<?php echo $volgende_vraag_id . $action_param . '&filter_id=' . $filter_id; ?>">
                                <label for="antwoord-<?php echo $antwoord['id']; ?>" class="antwoord-label"><?php echo htmlspecialchars($antwoord['antwoord_tekst']); ?></label><br>
                            <?php endforeach; ?>
                        </form>
                        <button id="volgende-btn" disabled>Volgende</button>
                    <?php else: ?>
                        <p>Geen verdere vragen beschikbaar.</p>
                        <button onclick="location.href='wegwijzer.php?thema_id=<?php echo $thema_id; ?>&filter_id=<?php echo $filter_id; ?>'">Mijn wegwijzer</button>
                        <button onclick="location.href='index.php'">Beginscherm</button>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="blauwe-kader" id="antwoord-container" style="<?php echo $action ? '' : 'display: none;'; ?>">
            <?php if ($action_instructies): ?>
                <div class="antwoord-content">
                    <p><?php echo htmlspecialchars($action_instructies); ?></p>
                    <a href="<?php echo htmlspecialchars($knop_url); ?>" class="button2">
                        <span class="text2"><?php echo htmlspecialchars($knop_tekst); ?></span>
                    </a>
                    <p><?php echo htmlspecialchars($contact_tekst); ?></p>
                    <?php if ($organisaties): ?>
                        <ul class="organisaties">
                            <?php foreach ($organisaties as $organisatie): ?>
                                <li>
                                    <a style="display: block; margin-bottom: 20px;" href="<?php echo htmlspecialchars($organisatie['url']); ?>"><?php echo htmlspecialchars($organisatie['naam']); ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <button onclick="location.href='wegwijzer.php?thema_id=<?php echo $thema_id; ?>&filter_id=<?php echo $filter_id; ?>'">Mijn wegwijzer</button>
                    <button onclick="location.href='../dashboard.php'">Beginscherm</button>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const volgendeBtn = document.getElementById('volgende-btn');
            const antwoordForm = document.getElementById('antwoord-form');

            antwoordForm.addEventListener('change', function() {
                volgendeBtn.disabled = false;
                volgendeBtn.classList.add('volgende-btn');
            });

            volgendeBtn.addEventListener('click', function(event) {
                event.preventDefault();
                const selectedAntwoord = antwoordForm.querySelector('input[name="antwoord"]:checked');
                if (selectedAntwoord) {
                    window.location.href = `wegwijzer.php?thema_id=<?php echo $thema_id; ?>&filter_id=<?php echo $filter_id; ?>${selectedAntwoord.value}`;
                } else {
                    alert('Selecteer eerst een antwoord.');
                }
            });
        });
    </script>

<?php include_once("../components/footer.inc.php"); ?>

</body>
</html>
