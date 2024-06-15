document.addEventListener('DOMContentLoaded', function() {
    const toggleInputs = document.querySelectorAll('.toggle-input');

    toggleInputs.forEach(input => {
        input.addEventListener('change', function() {
            // Zet alle andere toggles uit
            toggleInputs.forEach(otherInput => {
                if (otherInput !== input) {
                    otherInput.checked = false;
                }
            });
        });
    });
});
