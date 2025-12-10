(() => {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    const backToTopBtn = document.querySelector('.back-to-top');
    const mobileMenuBtn = document.querySelector('#mobileMenuBtn');
    const mobileMenu = document.querySelector('#mobileMenu');
    const closeMobileMenu = document.querySelector('#closeMobileMenu');

    function filterProjects(category) {
        portfolioItems.forEach(item => {
            if (category === 'all' || item.classList.contains(category)) {
                item.style.display = 'block';
                item.style.opacity = '1';
            } else {
                item.style.opacity = '0.3';
            }
        });

        filterBtns.forEach(btn => {
            btn.classList.remove('active', 'bg-gray-500', 'text-white');
            btn.classList.add('border', 'border-gray-300', 'text-gray-500');
            if (btn.dataset.filter === category) {
                btn.classList.add('active', 'bg-gray-500', 'text-white');
                btn.classList.remove('border', 'border-gray-300', 'text-gray-500');
            }
        });
    }

    function handleFilterClick(event) {
        const selectedCategory = event.target.dataset.filter;
        filterProjects(selectedCategory);
    }

    function scrollToTop() {
        window.scrollTo(0, 0);
    }

    function openMobileMenu() {
        if (mobileMenu) {
            mobileMenu.style.transform = 'translateX(0)';
        }
    }

    function closeMobileMenuHandler() {
        if (mobileMenu) {
            mobileMenu.style.transform = 'translateX(-100%)';
        }
    }

    function initAnimations() {
        if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);
            gsap.from('.portfolio-item', {
                opacity: 0,
                y: 20,
                duration: 0.6,
                stagger: 0.2,
                scrollTrigger: {
                    trigger: '.portfolio',
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                }
            });
        }
    }

    if (filterBtns.length > 0) {
        filterBtns.forEach(btn => {
            btn.addEventListener('click', handleFilterClick);
        });
    }

    if (backToTopBtn) {
        backToTopBtn.addEventListener('click', scrollToTop);
    }

    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', openMobileMenu);
    }

    if (closeMobileMenu) {
        closeMobileMenu.addEventListener('click', closeMobileMenuHandler);
    }

    window.addEventListener('load', initAnimations);

    function initVideoPlayer() {
        const video = document.querySelector('#player');
        if (video) {
            video.addEventListener('loadedmetadata', function () {
                video.currentTime = 0.1;
                setTimeout(function () {
                    video.currentTime = 0;
                }, 100);
            });

            const player = new Plyr('#player', {
                controls: [
                    'play-large',
                    'play',
                    'progress',
                    'current-time',
                    'duration',
                    'mute',
                    'volume',
                    'settings',
                    'fullscreen'
                ],
                settings: ['quality', 'speed'],
                ratio: '16:9'
            });
        }
    }

    window.addEventListener('load', initVideoPlayer);

})();
