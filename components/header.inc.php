<header>
<nav>
    <a class="logo" href="./dashboard.php">
        <img src="./images/general/logo.svg" alt="logo">
    </a>
    <label class="burger" for="burger">&#9776;</label>
    <label class="close" for="burger">&times;</label>
    <input type="checkbox" id="burger">
    <ul style="list-style-type: none; display:flex;" class="subnav">
        <li <?php if (strpos($_SERVER['REQUEST_URI'], 'dashboard.php') !== false || strpos($_SERVER['REQUEST_URI'], 'dashboard_detail.php') !== false || strpos($_SERVER['REQUEST_URI'], 'grote_wegwijzer.php') !== false || strpos($_SERVER['REQUEST_URI'], 'detail_filter.php') !== false || strpos($_SERVER['REQUEST_URI'], 'wegwijzer.php') !== false) echo 'class="active"'; ?>>
            <a href="./dashboard.php"><img src="./images/iconen/mensenrechten.svg" alt="Thema's" class="nav-icon" id="icoon-display"> Mijn mensenrechten</a>
        </li>
        <li <?php if (strpos($_SERVER['REQUEST_URI'], 'thema2.php') !== false || strpos($_SERVER['REQUEST_URI'], 'detail_thema2.php') !== false) echo 'class="active"'; ?>>
            <a href="./pages/thema2.php"><img src="./images/iconen/thema's.svg" alt="Thema's" class="nav-icon" id="icoon-display"> Thema's</a>
        </li>
        <li <?php if (strpos($_SERVER['REQUEST_URI'], 'zittingen.php') !== false || strpos($_SERVER['REQUEST_URI'], 'zittingen_detail.php') !== false) echo 'class="active"'; ?>>
            <a href="./pages/zittingen.php"><img src="../images/iconen/zittingen.svg" alt="Zittingen" class="nav-icon" id="icoon-display"> Zittingen</a>
        </li>
        <li <?php if (strpos($_SERVER['REQUEST_URI'], 'vrijwilligerswerk.php') !== false) echo 'class="active"'; ?>>
            <a href="./pages/vrijwilligerswerk.php"><img src="../images/iconen/vrijwilligerswerk_icon.svg" alt="Vrijwilligerswerk" class="nav-icon" id="icoon-display"> Vrijwilligerswerk</a>
        </li>
        <li <?php if (strpos($_SERVER['REQUEST_URI'], 'activiteiten.php') !== false) echo 'class="active"'; ?>>
            <a href="./pages/activiteiten.php"><img src="./images/iconen/activiteiten_icon.svg" alt="Activiteiten" class="nav-icon" id="icoon-display"> Activiteiten</a>
        </li>
        <li <?php if (strpos($_SERVER['REQUEST_URI'], 'contact.php') !== false) echo 'class="active"'; ?>>
            <a href="./pages/contact.php"><img src="./images/iconen/contact_icon.svg" alt="Contact" class="nav-icon" id="icoon-display"> Contact</a>
        </li>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <li>
        <a href="./pages/meldingen.php">
            <img src="./images/iconen/meldingen_icon.svg" alt="notificatie" class="nav-icon" id="icoon-display">
            <span class="hidden-text">Meldingen</span>
        </a>
    </li>
    <li>
        <a href="./pages/account.php">
            <img src="./images/iconen/profile_icon.svg" alt="Profiel" class="nav-icon" id="icoon-display">
            <span class="hidden-text">Account</span>
        </a>
    </li>
            <li class="logout-mobile" id="logout">
                <a href="./signin_login_logout/logout.php" id="logout-mobile" class="logout-button">Uitloggen</a>
            </li>
        <?php else: ?>
            <li class="login-mobile" id="login">
                <a href="./signin_login_logout/login.php" id="login-mobile" class="login-button">Inloggen</a>
            </li>
            <li class="signin-mobile" id="signin">
                <a href="./signin_login_logout/signin.php" id="signin-mobile" class="signin-button">Aanmelden</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
<div class="actions">
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
        <a class="material-icons" href="./pages/meldingen.php">
            <img src="./images/iconen/meldingen_icon.svg" alt="Profiel" class="action-icon" id="icon_mobile">
        </a>
        <a class="material-icons" href="./pages/account.php">
            <img src="./images/iconen/profile_icon.svg" alt="Profiel" class="action-icon" id="icon_mobile">
        </a>
        <a class="logout-button" id="display-logout" href="./signin_login_logout/logout.php">Uitloggen</a>
    <?php else: ?>
        <a class="login-button" id="display-logout" href="./signin_login_logout/login.php">Inloggen</a>
        <a class="signin-button" id="display-logout" href="./signin_login_logout/signin.php">Aanmelden</a>
    <?php endif; ?>
</div>
</header>
<script src="./js/navigation.js"></script>
<script src="./js/button.js"></script>