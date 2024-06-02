<?php 
include_once(__DIR__ . DIRECTORY_SEPARATOR . "./classes/Db.php");

	session_start();
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true ){

  } else {
    exit("NO SESSION");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>federaalinstituutmensenrechten</title>
    <link rel="stylesheet" href="css/nav.css?12395">
    <link rel="stylesheet" href="css/dashboard.css?15345">
    <link rel="stylesheet" href="css/shared.css?11345">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
<header>
<nav>
    <a class="logo" href="#">
        <img src="images/general/logo.svg" alt="logo">
    </a>
    <label class="burger" for="burger">&#9776;</label>
    <label class="close" for="burger">&times;</label>
    <input type="checkbox" id="burger">
    <ul class="subnav">
        <li><a href="#">Mijn mensenrechten</a></li>
        <li><a href="#">Thema's</a></li>
        <li><a href="#">Zittingen</a></li>
        <li><a href="#">Vrijwilligerswerk</a></li>
        <li><a href="#">Activiteiten</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
</nav>
<div class="actions">
    <div class="action-icon"><i class="material-icons">notifications</i></div>
    <div class="action-icon"><i class="material-icons">settings</i></div>
    <div class="action-icon"><i class="material-icons">account_circle</i></div>
</div>
</header>
<a href="/LAB2/signin_login_logout/logout.php">Log Out</a>

<!-- Filter Section -->
<div class="filter-container">
    <div class="search-box">
        <input type="text" placeholder="Zoeken...">
    </div>
    <div class="select-box">
        <select>
            <option value="">Kies een functie...</option>
            <option value="Schendingen & klachten">Schendingen & klachten</option>
            <option value="Hulpverlening">Hulpverlening</option>
            <option value="Informatie & Monitoring">Informatie & Monitoring</option>
            <option value="Beleidsbeïnvloeding & Actie">Beleidsbeïnvloeding & Actie</option>
        </select>
    </div>
    <button class="save-button">Opslaan</button>
</div>

<div class="container">
    <h2>Eerste Hulp Bij Mensenrechten</h2>
    <div class="button-bar">
        <div class="button wegwijzer">
            <span class="text">Mijn wegwijzer</span>
            <img src="images/iconen/mijnwegwijzer.svg" alt="Mijn wegwijzer">
        </div>
        <div class="button">
            <span class="text">Discriminatie</span>
            <img src="images/iconen/discriminatie.svg" alt="Discriminatie">
        </div>
        <div class="button">
            <span class="text">Persoonsgegevens</span>
            <img src="images/iconen/persoongegevens.svg" alt="Persoonsgegevens">
        </div>
        <div class="button">
            <span class="text">Kinderrechten</span>
            <img src="images/iconen/kinderrechten.svg" alt="Kinderrechten">
        </div>
        <div class="button">
            <span class="text">Publieke en private ombudsmannen</span>
            <img src="images/iconen/publieke_en_private_ombudsmannen.svg" alt="Publieke en private ombudsmannen">
        </div>
        <div class="button">
            <span class="text">Migranten</span>
            <img src="images/iconen/migranten.svg" alt="Migranten">
        </div>
        <div class="button">
            <span class="text">Gevangenis</span>
            <img src="images/iconen/gevangenis.svg" alt="Gevangenis">
        </div>
        <div class="button">
            <span class="text">Politie</span>
            <img src="images/iconen/politie.svg" alt="Politie">
        </div>
        <div class="button">
            <span class="text">Mindervaliden</span>
            <img src="images/iconen/mindervaliden.svg" alt="Mindervaliden">
        </div>
        <div class="button">
            <span class="text">Ouderen</span>
            <img src="images/iconen/ouderen.svg" alt="Ouderen">
        </div>
        <div class="button">
            <span class="text">Gendergelijkheid</span>
            <img src="images/iconen/gendergelijkheid.svg" alt="Gendergelijkheid">
        </div>
        <div class="button">
            <span class="text">Armoede</span>
            <img src="images/iconen/armoede.svg" alt="Armoede">
        </div>
        <div class="button">
            <span class="text">Wonen</span>
            <img src="images/iconen/wonen.svg" alt="Wonen">
        </div>
        <div class="button">
            <span class="text">LGBTI+</span>
            <img src="images/iconen/lgbti+.svg" alt="LGBTI+">
        </div>
        <div class="button">
            <span class="text">Daklozen</span>
            <img src="images/iconen/daklozen.svg" alt="Daklozen">
        </div>
        <div class="button">
            <span class="text">Frans-Duitse gemeenschap</span>
            <img src="images/iconen/frans_duitse_gemeenschap.svg" alt="Frans-Duitse gemeenschap">
        </div>
        <div class="button">
            <span class="text">Gezondheid</span>
            <img src="images/iconen/gezondheid.svg" alt="Gezondheid">
        </div>
        <div class="button">
            <span class="text">Klimaat</span>
            <img src="images/iconen/klimaat.svg" alt="Klimaat">
        </div>
        <div class="button">
            <span class="text">NGO's en Verenigingen</span>
            <img src="images/iconen/ngo's_en_verenigingen.svg" alt="NGO's en Verenigingen">
        </div>
        <div class="button">
            <span class="text">Onderwijs</span>
            <img src="images/iconen/onderwijs.svg" alt="Onderwijs">
        </div>
    </div>
</div>
<script src="button1.js"></script>
</body>
</html>
