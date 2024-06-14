<?php
session_start();
$currentFile = basename($_SERVER['SCRIPT_FILENAME'], '.php');
?>
<!--<link rel="stylesheet" href="../css/nav.css">-->
<header>
<nav>
    <a class="logo" href="../dashboard.php">
        <img src="../images/general/logo.svg" alt="logo">
    </a>
    <label class="burger" for="burger">&#9776;</label>
    <label class="close" for="burger">&times;</label>
    <input type="checkbox" id="burger">
    <ul class="subnav">
        <li <?php if (strpos($_SERVER['REQUEST_URI'], 'dashboard.php') !== false) echo 'class="active"'; ?>>
            <a href="../dashboard.php">
                <img src="../images/iconen/mensenrechten.svg" alt="Mijn mensenrechten" class="nav-icon" id="icoon-display"> Mijn mensenrechten
            </a>
        </li>
        <li <?php if (strpos($_SERVER['REQUEST_URI'], 'thema2.php') !== false) echo 'class="active"'; ?>>
            <a href="../pages/thema2.php"><img src="../images/iconen/thema's.svg" alt="Thema's" class="nav-icon" id="icoon-display"> Thema's</a>
        </li>
        <li <?php if (strpos($_SERVER['REQUEST_URI'], 'zittingen.php') !== false) echo 'class="active"'; ?>>
            <a href="../pages/zittingen.php"><img src="../images/iconen/zittingen.svg" alt="Zittingen" class="nav-icon" id="icoon-display"> Zittingen</a>
        </li>
        <li <?php if (strpos($_SERVER['REQUEST_URI'], 'vrijwilligerswerk.php') !== false) echo 'class="active"'; ?>>
            <a href="../pages/vrijwilligerswerk.php"><img src="../images/iconen/vrijwilligerswerk_icon.svg" alt="Vrijwilligerswerk" class="nav-icon" id="icoon-display"> Vrijwilligerswerk</a>
        </li>
        <li <?php if (strpos($_SERVER['REQUEST_URI'], 'activiteiten.php') !== false) echo 'class="active"'; ?>>
            <a href="../pages/activiteiten.php"><img src="../images/iconen/activiteiten_icon.svg" alt="Activiteiten" class="nav-icon" id="icoon-display"> Activiteiten</a>
        </li>
        <li>
            <a href="#"><img src="../images/iconen/contact_icon.svg" alt="Contact" class="nav-icon" id="icoon-display"> Contact</a>
        </li>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <li>
        <a href="#">
            <img src="../images/iconen/meldingen_icon.svg" alt="notificatie" class="nav-icon" id="icoon-display">
            <span class="hidden-text">Meldingen</span>
        </a>
    </li>
    <li>
        <a href="#">
            <img src="../images/iconen/profile_icon.svg" alt="Profiel" class="nav-icon" id="icoon-display">
            <span class="hidden-text">Account</span>
        </a>
    </li>
    <li class="logout-mobile" id="logout">
                <a href="../signin_login_logout/logout.php" id="logout-mobile" class="logout-button">Uitloggen</a>
            </li>
        <?php else: ?>
            <li class="login-mobile" id="login">
                <a href="../signin_login_logout/login.php" id="login-mobile" class="login-button">Inloggen</a>
            </li>
            <li class="signin-mobile" id="signin">
                <a href="../signin_login_logout/signin.php" id="signin-mobile" class="signin-button">Registreren</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
<div class="actions">
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
        <div id="icon_mobile" class="action-icon"><i class="material-icons">notifications</i></div>
        <!--<div class="action-icon"><i class="material-icons">settings</i></div>-->
        <div id="icon_mobile" class="action-icon"><i class="material-icons">account_circle</i></div>
        <a class="logout-button" id="display-logout" href="../signin_login_logout/logout.php">Uitloggen</a>
    <?php else: ?>
        <a class="login-button" id="display-logout" href="../signin_login_logout/login.php">Inloggen</a>
        <a class="signin-button" id="display-logout" href="../signin_login_logout/signin.php">Registreren</a>
    <?php endif; ?>
</div>
</header>
<script src="./navigation.js"></script>
