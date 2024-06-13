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
            { id: 2, naam: 'Racisme' },
            { id: 3, naam: 'Persoonsgegevens' },
            { id: 4, naam: 'Kinderrechten' },
            { id: 5, naam: 'Publieke en private ombudsmannen' },
            { id: 6, naam: 'Migranten' },
            { id: 7, naam: 'Gevangenis' },
            { id: 8, naam: 'Politie' },
            { id: 9, naam: 'Mindervaliden' },
            { id: 10, naam: 'Ouderen' },
            { id: 11, naam: 'Gendergelijkheid' },
            { id: 12, naam: 'Armoede' },
            { id: 13, naam: 'Wonen' },
            { id: 14, naam: 'LGBTI(QIA)+' },
            { id: 15, naam: 'Daklozen' },
            { id: 16, naam: 'Frans-Duitse gemeenschap' },
            { id: 17, naam: 'Gezondheid' },
            { id: 18, naam: 'Klimaat & Milieu' },
            { id: 19, naam: 'NGO\'s en Verenigingen' },
            { id: 20, naam: 'Justitie' },
            { id: 21, naam: 'Politiek' },
            { id: 22, naam: 'Andere' },
            { id: 24, naam: 'Juridisch' },
        ]);
    });
}
