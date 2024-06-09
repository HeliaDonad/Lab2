<?php
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Db.php");
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Thema.php");
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Wegwijzer.php");

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    exit("NO SESSION");
}

if (!isset($_GET['thema_id'])) {
    exit("Thema ID niet opgegeven");
}

$thema_id = intval($_GET['thema_id']);
$conn = Db::getConnection();
$thema = Thema::getThemaById($thema_id);

$vraag_id = isset($_GET['vraag_id']) ? intval($_GET['vraag_id']) : 1; // Start with the first vraag
$vraag = Wegwijzer::getVraagByIdAndThemaId($vraag_id, $thema_id);
$antwoorden = Wegwijzer::getAntwoordenByVraagId($vraag_id, $conn);

$action = isset($_GET['action']) ? $_GET['action'] : null;
$action_instructies = null;
$organisaties = null;

if ($action) {
    $action_instructies = Wegwijzer::getActionInstructiesByAction($action, $conn);

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
    <link rel="stylesheet" href="../css/nav.css?48987">
    <link rel="stylesheet" href="../css/wegwijzer.css?89095">
    <link rel="stylesheet" href="../css/shared.css?18845">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <?php include_once("../components/headerPages.inc.php"); ?>
    <div class="container">
        <h3>Mijn wegwijzer</h3>
        <h2><?php echo htmlspecialchars($thema->getNaam()); ?></h2>
        <div id="vraag-container">
            <?php if ($vraag): ?>
                <div class="blauwe-kader">
                    <p><?php echo htmlspecialchars($vraag['vraag_tekst']); ?></p>
                    <?php if ($antwoorden): ?>
                        <form id="antwoord-form">
                            <?php foreach ($antwoorden as $antwoord): ?>
                                <?php
                                    $volgende_vraag_id = $antwoord['volgende_vraag_id'] ? '&vraag_id=' . $antwoord['volgende_vraag_id'] : '';
                                    $action_param = $antwoord['action'] ? '&action=' . $antwoord['action'] : '';
                                ?>
                                <input type="radio" id="antwoord-<?php echo $antwoord['id']; ?>" class="antwoord-selector" name="antwoord" value="<?php echo $volgende_vraag_id . $action_param; ?>">
                                <label for="antwoord-<?php echo $antwoord['id']; ?>" class="antwoord-label"><?php echo htmlspecialchars($antwoord['antwoord_tekst']); ?></label><br>
                            <?php endforeach; ?>
                        </form>
                        <button id="volgende-btn" disabled>Volgende</button>
                    <?php else: ?>
                        <p>Geen verdere vragen beschikbaar.</p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if ($action_instructies): ?>
                <p><?php echo htmlspecialchars($action_instructies); ?></p>
                <?php if ($organisaties): ?>
                    <ul>
                        <?php foreach ($organisaties as $organisatie): ?>
                            <li><?php echo htmlspecialchars($organisatie['naam']); ?>: <a href="<?php echo htmlspecialchars($organisatie['url']); ?>"><?php echo htmlspecialchars($organisatie['url']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const volgendeBtn = document.getElementById('volgende-btn');
        const antwoordForm = document.getElementById('antwoord-form');

        antwoordForm.addEventListener('change', function() {
            volgendeBtn.disabled = false;
            volgendeBtn.style.backgroundColor = 'green'; // Change button color when an answer is selected
        });

        volgendeBtn.addEventListener('click', function(event) {
            event.preventDefault();
            const selectedAntwoord = antwoordForm.querySelector('input[name="antwoord"]:checked');
            if (selectedAntwoord) {
                const queryParams = `?thema_id=<?php echo $thema_id; ?>${selectedAntwoord.value}`;
                window.location.href = `wegwijzer.php${queryParams}`;
            } else {
                alert('Selecteer eerst een antwoord.');
            }
        });
    });
    </script>
</body>
</html>
