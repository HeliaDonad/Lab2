<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="../css/nav.css?80970">
    <link rel="stylesheet" href="../css/mijn_account.css?06968">
    <link rel="stylesheet" href="../css/shared.css">
</head>
<body>
    <?php include_once("../components/headerPages.inc.php"); ?>

    <div class="container">
        <h2>Mijn account</h2>
        
        <div class="button-bar">
            <div class="button">
                <img src="../images/iconen/profile_icon.svg" alt="Account icoon">
                <p>Account</p>
                <div class="logout-link">
                    <a href="../signin_login_logout/logout.php" class="logout">Log uit</a>
                </div>
            </a>
            </div>
            <a href="wachtwoord_wijzigen.php" class="button">
                <img src="../images/iconen/wachtwoord_wijzigen.svg" alt="Wachtwoord wijzigen icoon">
                <p>Wachtwoord wijzigen</p>
            </a>
            <a href="verwijder_acc.php" class="button">
                <img src="../images/iconen/verwijder_acc.svg" alt="Account verwijderen icoon">
                <p>Account Verwijderen</p>
            </a>
        </div>
    </div>

</body>
</html>
