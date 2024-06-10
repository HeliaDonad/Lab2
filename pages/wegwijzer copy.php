<?php
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Db.php");
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Thema.php");
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Wegwijzer.php");
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Organisatie.php");

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
$antwoorden = Wegwijzer::getAntwoordenByVraagId($vraag_id);

$action = isset($_GET['action']) ? $_GET['action'] : null;
$action_instructies = null;
$organisaties = null;

if ($action) {
    $action_info = Wegwijzer::getActionInstructiesByAction($action, $conn);
    $action_instructies = $action_info['action_instructies'];

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
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/wegwijzer.css">
    <link rel="stylesheet" href="../css/shared.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
                                <input type="radio" id="antwoord-<?php echo $antwoord['id']; ?>" class="antwoord-selector" name="antwoord" value="<?php echo $volgende_vraag_id . $action_param; ?>">
                                <label for="antwoord-<?php echo $antwoord['id']; ?>" class="antwoord-label"><?php echo htmlspecialchars($antwoord['antwoord_tekst']); ?></label><br>
                            <?php endforeach; ?>
                        </form>
                        <button id="volgende-btn" disabled>Volgende</button>
                    <?php else: ?>
                        <p>Geen verdere vragen beschikbaar.</p>
                        <button onclick="location.href='wegwijzer.php?thema_id=<?php echo $thema_id; ?>'">Mijn wegwijzer</button>
                        <button onclick="location.href='index.php'">Beginscherm</button>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="blauwe-kader" id="antwoord-container" style="<?php echo $action ? '' : 'display: none;'; ?>">
            <?php if ($action_instructies): ?>
                <div class="antwoord-content">
                    <p><?php echo htmlspecialchars($action_instructies); ?></p>
                    <?php if ($organisaties): ?>
                        <ul>
                            <?php foreach ($organisaties as $organisatie): ?>
                                <li>
                                    <a href="<?php echo htmlspecialchars($organisatie->getUrl()); ?>"><?php echo htmlspecialchars($organisatie->getNaam()); ?></a>
                                    <p><?php echo htmlspecialchars($organisatie->getContactTekst()); ?></p>
                                    <a href="<?php echo htmlspecialchars($organisatie->getKnopUrl()); ?>" class="button2">
                                        <span class="text2"><?php echo htmlspecialchars($organisatie->getKnopTekst()); ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <button onclick="location.href='wegwijzer.php?thema_id=<?php echo $thema_id; ?>'">Mijn wegwijzer</button>
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
                    window.location.href = `wegwijzer.php?thema_id=<?php echo $thema_id; ?>${selectedAntwoord.value}`;
                } else {
                    alert('Selecteer eerst een antwoord.');
                }
            });
        });
    </script>
</body>
</html>
