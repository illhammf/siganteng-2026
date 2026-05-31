const menuToggle = document.getElementById('menuToggle');
const navMenu = document.getElementById('navMenu');

if (menuToggle && navMenu) {
    menuToggle.addEventListener('click', function () {
        navMenu.classList.toggle('active');
    });
}

const navLinks = document.querySelectorAll('.nav-menu a');

navLinks.forEach(function (link) {
    link.addEventListener('click', function () {
        navMenu.classList.remove('active');
    });
});