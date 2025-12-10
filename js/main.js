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
            btn.classList.remove('active');
            if (btn.dataset.filter === category) {
                btn.classList.add('active');
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
            mobileMenu.classList.add('open');
            document.body.classList.add('no-scroll');
        }
    }

    function closeMobileMenuHandler() {
        if (mobileMenu) {
            mobileMenu.classList.remove('open');
            document.body.classList.remove('no-scroll');
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
