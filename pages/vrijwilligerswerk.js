// vrijwilligerswerk.js

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

    // Populate interests filter with data from database
    // Assuming a function fetchInterests exists to fetch data from the server
    const interessesFilter = document.getElementById('interesses-filter');
    if (interessesFilter) {
        fetchInterests().then(interests => {
            interests.forEach(interest => {
                const label = document.createElement('label');
                label.innerHTML = `<input type="checkbox" name="interesses" value="${interest.id}"> ${interest.naam}`;
                interessesFilter.appendChild(label);
            });
        });
    }
});

// Mock function to fetch interests
function fetchInterests() {
    return new Promise(resolve => {
        // Mock data, replace with actual AJAX call to fetch data from server
        resolve([
            { id: 1, naam: 'Discriminatie' },
            { id: 2, naam: 'Milieu' },
            { id: 3, naam: 'Gezondheid' },
        ]);
    });
}
