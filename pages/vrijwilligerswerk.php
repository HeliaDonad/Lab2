<?php
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Db.php");
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Thema.php");

// Databaseverbinding
$conn = Db::getConnection();

$query_themas = "SELECT id, naam, icoon FROM themas ORDER BY sort_order";
$result_themas = $conn->query($query_themas);
$themas = [];
while ($row = $result_themas->fetch(PDO::FETCH_ASSOC)) {
    // Maak een Thema object aan met de gegevens uit de database
    $thema = new Thema($row['id'], $row['naam'], $row['icoon'], '', '');
    $themas[] = $thema;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vrijwilligerswerk</title>
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/vrijwilligerswerk.css?99578">
    <link rel="stylesheet" href="../css/filter2.css?66670">
    <link rel="stylesheet" href="../css/shared.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <?php include_once("../components/headerPages.inc.php"); ?>
    <div class="container">
        <h2>Vrijwilligerswerk</h2>
        <?php include_once("../components/filter2.inc.php"); ?>
        
        <script>
 document.addEventListener('DOMContentLoaded', function() {
    // Toggle filter content
    const filterElements = document.querySelectorAll('.filter');
    const afstandSlider = document.getElementById('afstand');
    const afstandValue = document.getElementById('afstand-waarde');
    const saveButtons = document.querySelectorAll('.save-button');
    const mainSaveButton = document.querySelector('.main-save-button');

    // Functie om alle filters te sluiten
    function closeAllFilters() {
        document.querySelectorAll('.filter-content').forEach(content => {
            content.style.display = 'none';
        });
    }

    // Klik event voor elke filter
    filterElements.forEach(filter => {
        filter.addEventListener('click', function() {
            const target = document.querySelector(this.getAttribute('data-target'));
            if (target) {
                const isActive = target.style.display === 'block';
                closeAllFilters();
                filterElements.forEach(el => el.classList.remove('active'));
                if (!isActive) {
                    target.style.display = 'block';
                    this.classList.add('active');
                }
            }
        });
    });

    // Display the range value for afstand
    if (afstandSlider && afstandValue) {
        afstandSlider.addEventListener('input', function() {
            afstandValue.textContent = `${this.value}km`;
        });
    }

    // Klik event voor elke opslaan knop in filters
    saveButtons.forEach(button => {
        button.addEventListener('click', function() {
            closeAllFilters();
            mainSaveButton.disabled = false;
        });
    });

    // Controleren of een filter waarde heeft om de main save button te activeren
    document.querySelectorAll('.filter-content').forEach(content => {
        content.addEventListener('input', function() {
            let isActive = false;
            content.querySelectorAll('input, select').forEach(input => {
                if (input.type === 'checkbox' && input.checked) {
                    isActive = true;
                } else if (input.type !== 'checkbox' && input.value) {
                    isActive = true;
                }
            });
            mainSaveButton.disabled = !isActive;
        });
    });
});
        </script>
</body>
</html>