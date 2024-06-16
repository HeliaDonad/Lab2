<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="../css/nav.css?80970">
    <link rel="stylesheet" href="../css/account.css?49978">
    <link rel="stylesheet" href="../css/shared.css">
    <link rel="stylesheet" href="../css/footer.css?02593">
</head>
<body>
    <?php include_once("../components/headerPages.inc.php"); ?>

    <div class="container">
        <h2>Mijn account</h2>
        
        <div class="button-bar">
            <a href="mijn_account.php" class="button">
                <img src="../images/iconen/profile_icon.svg" alt="Account icoon">
                <p>Mijn account</p>
            </a>
            <a href="meldingen.php" class="button">
                <img src="../images/iconen/meldingen_icon.svg" alt="Meldingen icoon">
                <p>Meldingen</p>
            </a>
            <a href="taal.php" class="button">
                <img src="../images/iconen/taal.svg" alt="Taal icoon">
                <p>Taal</p>
            </a>
            <a href="voorwaarden.php" class="button">
                <img src="../images/iconen/voorwaarden.svg" alt="Voorwaarden icoon">
                <p>Voorwaarden</p>
            </a>
        </div>
        
    </div>

    <?php include_once("../components/footer.inc.php"); ?>
</body>
</html>
