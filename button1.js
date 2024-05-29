document.addEventListener('DOMContentLoaded', function() {
    const burgerIcon = document.querySelector('.burger'); 
    const closeIcon = document.querySelector('.close'); 
    const subnav = document.querySelector('.subnav');
    const burgerCheckbox = document.getElementById('burger');

    burgerIcon.addEventListener('click', function() {
        console.log('Burgerpictogram is geklikt');
        subnav.classList.add('active');
        burgerIcon.style.display = 'none';
        closeIcon.style.display = 'block';
    });

    closeIcon.addEventListener('click', function() {
        console.log('Kruispictogram is geklikt');
        subnav.classList.remove('active');
        burgerIcon.style.display = 'block';
        closeIcon.style.display = 'none';
    });

    window.addEventListener('resize', function() {
        console.log('Vensterformaat is gewijzigd');
        if (window.innerWidth >= 1024) {
            subnav.classList.remove('active');
            burgerIcon.style.display = 'none';
            closeIcon.style.display = 'none';
            burgerCheckbox.checked = false;
        } else {
            if (!subnav.classList.contains('active')) {
                burgerIcon.style.display = 'block';
                closeIcon.style.display = 'none';
            }
        }
    });

    if (window.innerWidth >= 1024) {
        burgerIcon.style.display = 'none';
        closeIcon.style.display = 'none';
        burgerCheckbox.checked = false;
    } else {
        burgerIcon.style.display = 'block';
    }
});
