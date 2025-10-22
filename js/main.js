const filterButtons = document.querySelectorAll('#filterButtons button');
const projectCards = document.querySelectorAll('.project-card');
const backToTopButton = document.querySelector('footer button');
const navLinks = document.querySelectorAll('nav a');
const mobileMenuBtn = document.querySelector('#mobileMenuBtn');
const mobileMenu = document.querySelector('#mobileMenu');
const closeMobileMenu = document.querySelector('#closeMobileMenu');

function handleFilterClick(event) {
    const filter = event.target.getAttribute('data-filter');

    // I'm removing active styles from all buttons first
    filterButtons.forEach(btn => {
        btn.classList.remove('active-filter', 'bg-gray-500', 'text-white');
        btn.classList.add('border', 'border-gray-300', 'text-gray-500');
    });

    // I'm adding active styles to the clicked button
    event.target.classList.add('active-filter', 'bg-gray-500', 'text-white');
    event.target.classList.remove('border', 'border-gray-300', 'text-gray-500');

    filterProjects(filter);
}

function filterProjects(filter) {
    projectCards.forEach(card => {
        if (filter === 'all') {
            card.style.display = 'block';
            card.style.opacity = '1';
        } else {
            const category = card.getAttribute('data-category');
            if (category === filter) {
                card.style.display = 'block';
                card.style.opacity = '1';
            } else {
                card.style.opacity = '0.3';
            }
        }
    });
}

function handleBackToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

function handleCardMouseEnter(event) {
    event.target.style.transform = 'translateY(-5px)';
    event.target.style.transition = 'transform 0.3s ease';
}

function handleCardMouseLeave(event) {
    event.target.style.transform = 'translateY(0)';
}

function handleNavMouseEnter(event) {
    event.target.style.transform = 'scale(1.05)';
    event.target.style.transition = 'transform 0.2s ease';
}

function handleNavMouseLeave(event) {
    event.target.style.transform = 'scale(1)';
}

function openMobileMenu() {
    mobileMenu.style.transform = 'translateX(0)';
}

function closeMobileMenuHandler() {
    mobileMenu.style.transform = 'translateX(-100%)';
}

filterButtons.forEach(button => {
    button.addEventListener('click', handleFilterClick);
});

backToTopButton.addEventListener('click', handleBackToTop);

projectCards.forEach(card => {
    card.addEventListener('mouseenter', handleCardMouseEnter);
    card.addEventListener('mouseleave', handleCardMouseLeave);
});

navLinks.forEach(link => {
    link.addEventListener('mouseenter', handleNavMouseEnter);
    link.addEventListener('mouseleave', handleNavMouseLeave);
});

mobileMenuBtn.addEventListener('click', openMobileMenu);
closeMobileMenu.addEventListener('click', closeMobileMenuHandler);
