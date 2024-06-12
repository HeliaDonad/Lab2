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
            <a href="../dashboard.php">Mijn mensenrechten</a>
        </li>
        <li <?php if (strpos($_SERVER['REQUEST_URI'], 'thema2.php') !== false) echo 'class="active"'; ?>>
            <a href="../pages/thema2.php">Thema's</a>
        </li>
        <li <?php if (strpos($_SERVER['REQUEST_URI'], 'zittingen.php') !== false) echo 'class="active"'; ?>>
            <a href="../pages/zittingen.php">Zittingen</a>
        </li>
        <li <?php if (strpos($_SERVER['REQUEST_URI'], 'vrijwilligerswerk.php') !== false) echo 'class="active"'; ?>>
            <a href="../pages/vrijwilligerswerk.php">Vrijwilligerswerk</a>
        </li>
        <li <?php if (strpos($_SERVER['REQUEST_URI'], 'activiteiten.php') !== false) echo 'class="active"'; ?>>
            <a href="../pages/activiteiten.php">Activiteiten</a>
        </li>
        <li><a href="#">Contact</a></li>
    </ul>
</nav>
<div class="actions">
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
        <div class="action-icon"><i class="material-icons">notifications</i></div>
        <!--<div class="action-icon"><i class="material-icons">settings</i></div>-->
        <div class="action-icon"><i class="material-icons">account_circle</i></div>
        <a href="../signin_login_logout/logout.php">Log Out</a>
    <?php else: ?>
        <a class="login-button" href="../signin_login_logout/login.php">Log In</a>
        <a class="signin-button" href="../signin_login_logout/signin.php">Aanmelden</a>
    <?php endif; ?>
</div>
</header>
<script src="./navigation.js"></script>
