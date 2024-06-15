<div class="filter-bar">
    <!-- Filteropties -->
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
        <span>Meer</span>
    </div>
    <button class="main-save-button" disabled>Opslaan</button>
</div>

<!-- Zoeken filter -->
<div id="zoeken-filter" class="filter-content" class="zoek-input">
    <input type="text" placeholder="Zoeken...">
    <div class="form-buttons">
        <button class="save-button">Opslaan</button>
    </div>
</div>

<!-- Interesses filter -->
<div id="interesses-filter" class="filter-content">
    <?php
    // Loop over de $themas array om de thema's weer te geven
    foreach ($themas as $thema) {
        ?>
        <div class="checkbox-balk">
        <label>
            <input type="checkbox" name="interesses" value="<?php echo htmlspecialchars($thema->getNaam()); ?>">
            <img src="data:image/svg+xml;base64,<?php echo base64_encode($thema->getIcoonData()); ?>" alt="<?php echo htmlspecialchars($thema->getNaam()); ?>">
            <?php echo htmlspecialchars($thema->getNaam()); ?>
        </label>
        </div>
        <?php
    }
    ?>
    <div class="form-buttons">
        <button class="save-button">Opslaan</button>
    </div>
</div>

<!-- Locatie filter -->
<div id="locatie-filter" class="filter-content">
    <label class="tekst" for="postcode">Postcode of gemeente:</label>
    <input type="text" id="postcode" name="postcode">
    
    <label class="tekst" for="buurten">Selecteer buurt(en):</label>
    <input type="text" id="buurten" name="buurten">

    <label class="tekst" for="afstand">Maximale afstand:</label>
    <input type="range" id="afstand" name="afstand" min="0" max="50" value="0">
    <span id="afstand-waarde">0km</span>
    <div class="form-buttons">
        <button class="save-button">Opslaan</button>
    </div>
</div>

<!-- Engagement filter -->
<div id="engagement-filter" class="filter-content">
    <div class="checkbox-balk" data-value="kort">
        <label><input type="checkbox" name="engagement" value="kort"> Kort werk van 1 of meer dagen</label>
    </div>
    <div class="checkbox-balk" data-value="periode">
        <label><input type="checkbox" name="engagement" value="periode"> Bepaalde periode of tijdelijk werken</label>
    </div>
    <div class="checkbox-balk" data-value="terugkerend">
        <label><input type="checkbox" name="engagement" value="terugkerend"> Terugkerend engagement</label>
    </div>
    <div class="checkbox-balk" data-value="af-te-spreken">
        <label><input type="checkbox" name="engagement" value="af-te-spreken"> Af te spreken</label>
    </div>
    <div class="form-buttons">
        <button class="save-button">Opslaan</button>
    </div>
</div>


<!-- Meer filters -->
<div id="meer-filters" class="filter-content">
    <label class="tekst" for="taal">Selecteer taal:</label>
    <select id="taal" name="taal">
        <option value="nederlands">Nederlands</option>
        <option value="frans">Frans</option>
        <option value="duits">Duits</option>
        <option value="engels">Engels</option>
    </select>

    <label class="tekst">Toegankelijkheid:</label>
    <div class="checkbox-balk">
    <label><input type="checkbox" name="toegankelijkheid" value="fysieke-beperkingen"> Fysieke beperkingen</label>
    </div>
    <div class="checkbox-balk">
    <label><input type="checkbox" name="toegankelijkheid" value="taal-leren"> Taal leren</label>
    </div>
    <div class="checkbox-balk">
    <label><input type="checkbox" name="toegankelijkheid" value="student"> Student</label>
    </div>
    <div class="checkbox-balk">
    <label><input type="checkbox" name="toegankelijkheid" value="psychische-kwetsbaarheid"> Psychische kwetsbaarheid</label>
    </div>
    <div class="checkbox-balk">
    <label><input type="checkbox" name="toegankelijkheid" value="mensen-met-strafblad"> Mensen met strafblad</label>
    </div>
    <div class="checkbox-balk">
    <label><input type="checkbox" name="toegankelijkheid" value="jong-dementie"> (Jong) dementie</label>
    </div>

    <label class="tekst">Doelgroep:</label>
    <div class="checkbox-balk">
    <label><input type="checkbox" name="doelgroep" value="individu"> Individu</label>
    </div>
    <div class="checkbox-balk">
    <label><input type="checkbox" name="doelgroep" value="groepen"> Groepen</label>
    </div>

    <label class="tekst" for="datums">Wanneer wil je vrijwilligen?</label>
    <input class="date" type="date" id="datums" name="datums">
    <div class="form-buttons">
        <button class="save-button">Opslaan</button>
    </div>
</div>
