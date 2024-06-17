<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Db.php");
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/User.php");

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../signin_login_logout/login.php');
    exit();
}

$userEmail = $_SESSION['user_email'];
$user = new User();
$email = $user->getEmailByEmail($userEmail);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn account</title>
    <link rel="stylesheet" href="../css/nav.css?80970">
    <link rel="stylesheet" href="../css/mijn_account.css?88968">
    <link rel="stylesheet" href="../css/shared.css">
    <link rel="stylesheet" href="../css/footer.css?02593">

</head>
<body>
<?php include_once("../components/headerPages.inc.php"); ?>
<div class="container">
    <h2>Mijn account</h2>
    <div class="button-bar">
        <div class="button">
            <img src="../images/iconen/profile_icon.svg" alt="Account icoon">
            <p><?php echo htmlspecialchars($email); ?></p>
            <div class="logout-link">
                <a href="../signin_login_logout/logout.php" class="logout">Log uit</a>
            </div>
        </div>
        <a href="wijzig_wachtwoord.php" class="button">
            <img src="../images/iconen/wachtwoord_wijzigen.svg" alt="Wachtwoord wijzigen icoon">
            <p>Wachtwoord wijzigen</p>
        </a>
        <a href="verwijder_acc.php" class="button">
            <img src="../images/iconen/verwijder_acc.svg" alt="Account verwijderen icoon">
            <p>Account Verwijderen</p>
        </a>
    </div>
</div>

<?php include_once("../components/footer.inc.php"); ?>

</body>
</html>
