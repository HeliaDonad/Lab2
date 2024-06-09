document.addEventListener("DOMContentLoaded", function() {
    const volgendeBtn = document.getElementById('volgende-btn');
    const antwoordForm = document.getElementById('antwoord-form');

    antwoordForm.addEventListener('change', function() {
        volgendeBtn.disabled = false;
        volgendeBtn.classList.add('volgende-btn');
    });

    volgendeBtn.addEventListener('click', function(event) {
        event.preventDefault();
        const selectedAntwoord = antwoordForm.querySelector('input[name="antwoord"]:checked');
        if (selectedAntwoord) {
            const queryParams = `?thema_id=<?php echo $thema_id; ?>${selectedAntwoord.value}`;
            window.location.href = `wegwijzer.php${queryParams}`;
        } else {
            alert('Selecteer eerst een antwoord.');
        }
    });
});