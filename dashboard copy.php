<?php
include_once(__DIR__ . DIRECTORY_SEPARATOR . "./classes/Db.php");

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    exit("NO SESSION");
}

$conn = Db::getConnection();

$query = "SELECT * FROM themas";
$result = $conn->query($query);
$themas = $result->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT * FROM filters";
$result = $conn->query($query);
$filters = $result->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>federaalinstituutmensenrechten</title>
    <link rel="stylesheet" href="css/nav.css?12395">
    <link rel="stylesheet" href="css/dashboard.css?555778899">
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
        <select id="filter-select">
            <option value="">Kies een functie...</option>
            <?php foreach ($filters as $filter): ?>
                <option value="<?php echo $filter['id']; ?>"><?php echo htmlspecialchars($filter['naam']); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button class="save-button" onclick="applyFilter()">Opslaan</button>
</div>

<div class="container">
    <h2>Eerste Hulp Bij Mensenrechten</h2>
    <div class="button-bar">
        <a href="#" class="button wegwijzer"> 
            <span class="text">Mijn wegwijzer</span>
            <img src="images/iconen/mijnwegwijzer.svg" alt="Mijn wegwijzer">
        </a>
        <?php foreach ($themas as $thema): ?>
            <a href="detail.php?thema_id=<?php echo $thema['id']; ?>" class="button"> 
                <span class="text"><?php echo htmlspecialchars($thema['naam']); ?></span>
                <img src="images/iconen/<?php echo strtolower(str_replace(' ', '_', $thema['naam'])); ?>.svg" alt="<?php echo htmlspecialchars($thema['naam']); ?>">
            </a>
        <?php endforeach; ?>
    </div>
</div>

<script>
/*function applyFilter() {
    const filterId = document.getElementById('filter-select').value;
    if (filterId) {
        window.location.href = `filtered_results.php?filter_id=${filterId}`;
    }
}*/

function applyFilter() {
    // Ophalen van de geselecteerde waarde van het select-element
    var filterSelect = document.getElementById("filter-select");
    var selectedValue = filterSelect.value;

    // Controleren of een filter is geselecteerd
    if (selectedValue !== "") {
        // Verstuur de geselecteerde waarde naar de backend (bijvoorbeeld via AJAX)
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "filtered_results.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Verwerk het antwoord van de server, indien nodig
                    console.log(xhr.responseText);
                } else {
                    // Handel eventuele fouten af
                    console.error("Er is een fout opgetreden bij het verzenden van het filter.");
                }
            }
        };
        xhr.send("filter=" + encodeURIComponent(selectedValue));
    } else {
        // Als geen filter is geselecteerd, toon dan een melding of neem een andere actie
        console.log("Geen filter geselecteerd.");
    }
}

</script>
</body>
</html>
