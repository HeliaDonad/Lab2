<?php
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Db.php");

/*session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    exit("NO SESSION");
}*/

$showVraag2 = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vraag1 = $_POST['vraag1'] ?? '';
    $vraag2 = $_POST['vraag2'] ?? '';
    
    $conn = Db::getConnection();
    $stmt = $conn->prepare("INSERT INTO antwoorden2 (vraag1, vraag2) VALUES (:vraag1, :vraag2)");
    $stmt->bindParam(':vraag1', $vraag1);
    $stmt->bindParam(':vraag2', $vraag2);
    $stmt->execute();
    
    if (empty($vraag2)) {
        $showVraag2 = true;
    } else {
        header("Location: wegwijzer.php?thema_id=1");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wegwijzer - Grote Wegwijzer</title>
    <link rel="stylesheet" href="../css/nav.css?48593">
    <link rel="stylesheet" href="../css/grote_wegwijzer.css?88790">
    <link rel="stylesheet" href="../css/shared.css">
    <link rel="stylesheet" href="../css/footer.css?02593">

</head>
<body>
    <?php include_once("../components/headerPages.inc.php"); ?>
    <div class="container">
        <h3>Mijn wegwijzer</h3>
        <p>Vul de onderstaande vraagjes in om de passende mensenrechtenorganisatie te vinden.</p>
        
        <form method="post">
            <div class="blauwe-kader">
                <?php if (!$showVraag2): ?>
                    <div class="vraag-content">
                        <label for="vraag1" class="antwoord-label">Beschrijf kort wat er is gebeurd?</label>
                        <textarea id="vraag1" name="vraag1" class="antwoord-selector" placeholder="Beschrijf hier..." required></textarea>
                    </div>
                    <button type="button" id="volgende-btn" class="volgende-btn" disabled>Volgende</button>
                <?php else: ?>
                    <div class="vraag-content">
                        <label for="vraag2" class="antwoord-label">Kun je specifieke voorbeelden geven van situaties waarin je je gediscrimineerd voelde?</label>
                        <textarea id="vraag2" name="vraag2" class="antwoord-selector" placeholder="Schrijf hier..." required></textarea>
                    </div>
                    <button type="submit" id="submit-btn" class="volgende-btn">Verzend</button>
                <?php endif; ?>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const volgendeBtn = document.getElementById('volgende-btn');
            const vraag1 = document.getElementById('vraag1');

            vraag1.addEventListener('input', function() {
                if (vraag1.value.trim() !== "") {
                    volgendeBtn.disabled = false;
                } else {
                    volgendeBtn.disabled = true;
                }
            });

            volgendeBtn.addEventListener('click', function() {
                const form = vraag1.closest('form');
                form.submit();
            });
        });
    </script>

<?php include_once("../components/footer.inc.php"); ?>

</body>
</html>
