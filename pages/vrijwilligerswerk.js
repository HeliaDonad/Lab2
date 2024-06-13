document.addEventListener('DOMContentLoaded', function() {
    // Toggle filter content
    const filterElements = document.querySelectorAll('.filter');
    filterElements.forEach(filter => {
        filter.addEventListener('click', function() {
            const target = document.querySelector(this.getAttribute('data-target'));
            if (target) {
                const isActive = target.style.display === 'block';
                document.querySelectorAll('.filter-content').forEach(content => content.style.display = 'none');
                filterElements.forEach(el => el.classList.remove('active'));
                if (!isActive) {
                    target.style.display = 'block';
                    this.classList.add('active');
                }
            }
        });
    });

    // Display the range value for afstand
    const afstandSlider = document.getElementById('afstand');
    const afstandValue = document.getElementById('afstand-waarde');
    if (afstandSlider && afstandValue) {
        afstandSlider.addEventListener('input', function() {
            afstandValue.textContent = `${this.value}km`;
        });
    }
});
