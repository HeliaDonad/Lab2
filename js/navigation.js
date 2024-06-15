document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('.subnav li a');
    const currentUrl = window.location.href;

    links.forEach(link => {
        const linkUrl = link.href;

        if (currentUrl === linkUrl) {
            link.classList.add('active'); 
        }
    });
});
