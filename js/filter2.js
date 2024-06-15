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
        button.disabled = true; // Start met alle knoppen disabled
        button.addEventListener('click', function() {
            closeAllFilters();
            mainSaveButton.disabled = false;
        });
    });

    // Controleren of een filter waarde heeft om de save-button te activeren
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

            // Zoek de corresponderende save-button en activeer/deactiveer deze
            const saveButton = content.querySelector('.save-button');
            if (saveButton) {
                saveButton.disabled = !isActive;
            }
        });
    });

    // Controleren of een filter actief is om de main save button te activeren
    document.querySelectorAll('.filter-content').forEach(content => {
        content.addEventListener('input', function() {
            let anyActive = false;
            document.querySelectorAll('.filter-content').forEach(content => {
                const saveButton = content.querySelector('.save-button');
                if (!saveButton.disabled) {
                    anyActive = true;
                }
            });
            mainSaveButton.disabled = !anyActive;
        });
    });
});