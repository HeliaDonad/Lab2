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
                <span>Meer filters</span>
            </div>
            <button class="main-save-button">Opslaan</button>
        </div>

        <!-- Zoeken filter -->
        <div id="zoeken-filter" class="filter-content">
            <input type="text" placeholder="Zoeken...">
        </div>

        <!-- Interesses filter -->
        <div id="interesses-filter" class="filter-content">
            <?php
            // Loop over de $themas array om de thema's weer te geven
            foreach ($themas as $thema) {
                ?>
                <label>
                    <input type="checkbox" name="interesses" value="<?php echo htmlspecialchars($thema->getNaam()); ?>">
                    <img src="data:image/svg+xml;base64,<?php echo base64_encode($thema->getIcoonData()); ?>" alt="<?php echo htmlspecialchars($thema->getNaam()); ?>">
                    <?php echo htmlspecialchars($thema->getNaam()); ?>
                </label>
                <?php
            }
            ?>
            <div class="form-buttons">
                <button class="save-button">Opslaan</button>
            </div>
        </div>

        <!-- Locatie filter -->
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

        <!-- Engagement filter -->
        <div id="engagement-filter" class="filter-content">
            <label><input type="checkbox" name="engagement" value="kort"> Kort werk van 1 of meer dagen</label>
            <label><input type="checkbox" name="engagement" value="periode"> Bepaalde periode of tijdelijk werken</label>
            <label><input type="checkbox" name="engagement" value="terugkerend"> Terugkerend engagement</label>
            <label><input type="checkbox" name="engagement" value="af-te-spreken"> Af te spreken</label>
            <div class="form-buttons">
                <button class="save-button">Opslaan</button>
            </div>
        </div>

        <!-- Meer filters -->
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


