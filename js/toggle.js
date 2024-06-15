document.querySelectorAll('.toggle-checkbox').forEach(toggleCheckbox => {
    toggleCheckbox.addEventListener('change', function() {
        if (toggleCheckbox.checked) {
            console.log(`Toggle ${toggleCheckbox.id} is ON`);
            // Voeg hier de code toe die moet worden uitgevoerd wanneer de schakelaar aan is
        } else {
            console.log(`Toggle ${toggleCheckbox.id} is OFF`);
            // Voeg hier de code toe die moet worden uitgevoerd wanneer de schakelaar uit is
        }
    });
});
