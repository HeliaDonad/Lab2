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
    <label><input type="checkbox" name="interesses" value="1"> Discriminatie</label>
    <label><input type="checkbox" name="interesses" value="2"> Racisme</label>
    <label><input type="checkbox" name="interesses" value="3"> Persoonsgegevens</label>
    <label><input type="checkbox" name="interesses" value="4"> Kinderrechten</label>
    <label><input type="checkbox" name="interesses" value="5"> Publieke en private ombudsmannen</label>
    <label><input type="checkbox" name="interesses" value="6"> Migranten</label>
    <label><input type="checkbox" name="interesses" value="7"> Gevangenis</label>
    <label><input type="checkbox" name="interesses" value="8"> Politie</label>
    <label><input type="checkbox" name="interesses" value="9"> Mindervaliden</label>
    <label><input type="checkbox" name="interesses" value="10"> Ouderen</label>
    <label><input type="checkbox" name="interesses" value="11"> Gendergelijkheid</label>
    <label><input type="checkbox" name="interesses" value="12"> Armoede</label>
    <label><input type="checkbox" name="interesses" value="13"> Wonen</label>
    <label><input type="checkbox" name="interesses" value="14"> LGBTI(QIA)+</label>
    <label><input type="checkbox" name="interesses" value="15"> Daklozen</label>
    <label><input type="checkbox" name="interesses" value="16"> Frans-Duitse gemeenschap</label>
    <label><input type="checkbox" name="interesses" value="17"> Gezondheid</label>
    <label><input type="checkbox" name="interesses" value="18"> Klimaat & Milieu</label>
    <label><input type="checkbox" name="interesses" value="19"> NGO's en Verenigingen</label>
    <label><input type="checkbox" name="interesses" value="20"> Justitie</label>
    <label><input type="checkbox" name="interesses" value="21"> Politiek</label>
    <label><input type="checkbox" name="interesses" value="22"> Andere</label>
    <label><input type="checkbox" name="interesses" value="24"> Juridisch</label>
    <div class="form-buttons">
        <button class="save-button">Opslaan</button>
    </div>
</div>

        <div id="locatie-filter" class="filter-content">
            <label for="postcode">Postcode of gemeente:</label>
            <input type="text" id="postcode" name="postcode">
            
            <label for="buurten">Selecteer buurt(en):</label>
            <input type="text" id="buurten" name="buurten">

            <label for="afstand">Maximale afstand:</label>
            <input type="range" id="afstand" name="afstand" min="0" max="50" value="0">
            <span id="afstand-waarde">0km</span>
            <div class="form-buttons">
                <button class="save-button">Opslaan</button>
            </div>
        </div>

        <div id="engagement-filter" class="filter-content">
            <label><input type="checkbox" name="engagement" value="kort"> Kort werk van 1 of meer dagen</label>
            <label><input type="checkbox" name="engagement" value="periode"> Bepaalde periode of tijdelijk werken</label>
            <label><input type="checkbox" name="engagement" value="terugkerend"> Terugkerend engagement</label>
            <label><input type="checkbox" name="engagement" value="af-te-spreken"> Af te spreken</label>
            <div class="form-buttons">
                <button class="save-button">Opslaan</button>
            </div>
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
            <div class="form-buttons">
                <button class="save-button">Opslaan</button>
            </div>
        </div>
    </div>

    <script src="./vrijwilligerswerk.js"></script>
</body>
</html>
