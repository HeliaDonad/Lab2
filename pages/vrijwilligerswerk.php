<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vrijwilligerswerk</title>
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/vrijwilligerswerk.css?23456">
    <link rel="stylesheet" href="../css/shared.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <?php include_once("../components/headerPages.inc.php"); ?>
    <div class="container">
        <h2>Vrijwilligerswerk</h2>

        <div class="filter-bar">
            <div class="filter" data-target="#zoeken-filter">
                <span>Zoeken</span>
            </div>
            <div class="filter" data-target="#interesses-filter">
                <span>Interesses</span>
            </div>
            <div class="filter" data-target="#locatie-filter">
                <span>Locatie</span>
            </div>
            <div class="filter" data-target="#engagement-filter">
                <span>Engagement</span>
            </div>
            <div class="filter" data-target="#meer-filters">
                <span>Meer filters</span>
            </div>
            <button class="main-save-button">Opslaan</button>
        </div>

        <div id="zoeken-filter" class="filter-content">
            <input type="text" placeholder="Zoeken...">
        </div>

        <div id="interesses-filter" class="filter-content">
            <!-- Interests filter content will be populated with JavaScript -->
        </div>

        <div id="locatie-filter" class="filter-content">
            <label for="postcode">Postcode of gemeente:</label>
            <input type="text" id="postcode" name="postcode">
            
            <label for="buurten">Selecteer buurt(en):</label>
            <input type="text" id="buurten" name="buurten">

            <label for="afstand">Maximale afstand:</label>
            <input type="range" id="afstand" name="afstand" min="0" max="50" value="0">
            <span id="afstand-waarde">0km</span>
        </div>

        <div id="engagement-filter" class="filter-content">
            <label><input type="checkbox" name="engagement" value="kort"> Kort werk van 1 of meer dagen</label>
            <label><input type="checkbox" name="engagement" value="periode"> Bepaalde periode of tijdelijk werken</label>
            <label><input type="checkbox" name="engagement" value="terugkerend"> Terugkerend engagement</label>
            <label><input type="checkbox" name="engagement" value="af-te-spreken"> Af te spreken</label>
        </div>

        <div id="meer-filters" class="filter-content">
            <label for="taal">Selecteer taal:</label>
            <select id="taal" name="taal">
                <option value="nederlands">Nederlands</option>
                <option value="frans">Frans</option>
                <option value="duits">Duits</option>
                <option value="engels">Engels</option>
            </select>

            <label>Toegankelijkheid:</label>
            <label><input type="checkbox" name="toegankelijkheid" value="fysieke-beperkingen"> Fysieke beperkingen</label>
            <label><input type="checkbox" name="toegankelijkheid" value="taal-leren"> Taal leren</label>
            <label><input type="checkbox" name="toegankelijkheid" value="student"> Student</label>
            <label><input type="checkbox" name="toegankelijkheid" value="psychische-kwetsbaarheid"> Psychische kwetsbaarheid</label>
            <label><input type="checkbox" name="toegankelijkheid" value="mensen-met-strafblad"> Mensen met strafblad</label>
            <label><input type="checkbox" name="toegankelijkheid" value="jong-dementie"> (Jong) dementie</label>

            <label>Doelgroep:</label>
            <label><input type="checkbox" name="doelgroep" value="individu"> Individu</label>
            <label><input type="checkbox" name="doelgroep" value="groepen"> Groepen</label>

            <label for="datums">Wanneer wil je vrijwilligen?</label>
            <input type="date" id="datums" name="datums">
        </div>
    </div>

    <script src="./vrijwilligerswerk.js"></script>
</body>
</html>
