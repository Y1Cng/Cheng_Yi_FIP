<?php
require_once('includes/connect.php');

$where = '1=1';
$s = isset($_GET['search']) ? $_GET['search'] : '';

if(!empty($s)) {
    $where = " project LIKE '%{$s}%'";
}

$query = "SELECT * FROM project WHERE $where";
$results = mysqli_query($connect, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Yi Cheng</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Roboto:wght@400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.8.3/plyr.css" />
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/ScrollTrigger.min.js"></script>
</head>

<body class="bg-white text-gray-600">
    <!-- Header -->
    <header class="flex items-center justify-between px-4 md:px-16 py-4 md:py-8">
        <!-- Logo Section -->
        <div class="flex items-center gap-2 md:gap-4">
            <div class="relative">
                <img src="./images/profile-image.png" alt="Profile" class="w-10 h-10 md:w-12 md:h-12 rounded-full">
            </div>

            <div class="relative">
                <div class="bg-gray-300 rounded-full px-4 py-2">
                    <span class="text-white text-xs font-medium">Hire Me!</span>
                </div>
                <div class="absolute inset-0 border-2 border-dashed border-gray-400 rounded-full scale-110">
                </div>
                <img src="./images/arrow-icon.png" alt="Arrow" class="absolute -right-8 top-0 w-10 h-5">
            </div>
        </div>

        <!-- Search Form -->
        <form action="" class="hidden md:flex items-center gap-2">
            <div class="flex items-center border border-gray-300 rounded-full px-4 py-2">
                <input type="text" class="search-input bg-transparent border-none outline-none text-sm" placeholder="Search projects..." name="search" value="<?php echo htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <button class="search-btn bg-gray-500 text-white px-4 py-2 rounded-full text-sm hover:bg-gray-600 transition-colors" type="submit">
                <span>Search</span>
            </button>
        </form>

        <!-- Mobile Menu Button -->
        <button id="mobileMenuBtn"
            class="md:hidden flex flex-col justify-between w-6 h-5 bg-transparent border-none cursor-pointer"
            aria-label="Menu">
            <span class="block w-full h-0.5 bg-gray-500 transition-all duration-300"></span>
            <span class="block w-full h-0.5 bg-gray-500 transition-all duration-300"></span>
            <span class="block w-full h-0.5 bg-gray-500 transition-all duration-300"></span>
        </button>

        <!-- Navigation -->
        <nav class="hidden md:flex items-center gap-8 lg:gap-16">
            <a href="about.html" class="text-gray-400 text-xl lg:text-2xl hover:text-gray-600 transition-colors">About Me</a>
            <a href="contact.php" class="text-gray-400 text-xl lg:text-2xl hover:text-gray-600 transition-colors">Contact</a>
            <a href="index.php" class="text-gray-500 text-xl lg:text-2xl hover:text-gray-600 transition-colors">Portfolio</a>
        </nav>

        <!-- Mobile Navigation Menu -->
        <nav id="mobileMenu"
            class="fixed top-0 left-0 w-full h-full bg-white transform -translate-x-full transition-transform duration-300 ease-in-out md:hidden z-50">
            <div class="flex flex-col items-center justify-center h-full gap-8">
                <button id="closeMobileMenu" class="absolute top-4 right-4 text-gray-500 text-3xl">&times;</button>
                <a href="about.html" class="text-gray-500 text-2xl hover:text-gray-600 transition-colors">About Me</a>
                <a href="contact.php" class="text-gray-500 text-2xl hover:text-gray-600 transition-colors">Contact</a>
                <a href="index.php" class="text-gray-500 text-2xl hover:text-gray-600 transition-colors">Portfolio</a>
            </div>
        </nav>

        <!-- Profile Icon -->
        <div class="flex items-center gap-2 border border-gray-300 rounded-full px-4 py-2">
            <img src="./images/menu-profile-image.png" alt="Profile" class="w-8 h-8 rounded-full">
            <img src="./images/notification-icon.png" alt="Notification" class="w-5 h-4">
        </div>
    </header>

    <main>
    <!-- Hero Section -->
    <section class="px-4 md:px-16 py-8 md:py-16">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-3xl md:text-4xl text-gray-500 mb-6 md:mb-8">Hi there!</h1>
            <p class="font-secondary text-sm text-gray-500 leading-relaxed max-w-2xl mx-auto px-2 md:px-0">
                I'm a web designer, developer, and motion graphics artist with a passion for turning ideas into digital
                experiences that look stunning, work flawlessly, and leave a lasting impression.
                <br><br>
                When I'm not writing clean code or crafting smooth animations, you'll find me obsessing over user flows,
                experimenting with new design trends, or as I like to call it: "strategic meditation" (wink).
            </p>

            <!-- Social Icons -->
            <div class="flex justify-center flex-wrap gap-4 md:gap-8 mt-8 md:mt-12">
                <a href="#" aria-label="Instagram"><img src="./images/social-icon-instagram.png" alt="Instagram" class="w-6 h-6"></a>
                <a href="#" aria-label="Facebook"><img src="./images/social-icon-facebook.png" alt="Facebook" class="w-6 h-6"></a>
                <a href="#" aria-label="Pinterest"><img src="./images/social-icon-pinterest.png" alt="Pinterest" class="w-6 h-6"></a>
                <a href="#" aria-label="LinkedIn"><img src="./images/social-icon-linkedin.png" alt="LinkedIn" class="w-6 h-6"></a>
                <a href="#" aria-label="RSS"><img src="./images/social-icon-rss.png" alt="RSS" class="w-6 h-6"></a>
            </div>
        </div>
    </section>

    <!-- Video Section -->
    <section class="px-4 md:px-16 py-8 md:py-16">
        <div class="max-w-4xl mx-auto text-center">
            <div class="bg-gray-300 rounded-lg overflow-hidden aspect-video">
                <video id="player" class="w-full h-full" preload="metadata">
                    <source src="./videos/Cheng_Yi_Demo_Reel.mp4" type="video/mp4">
                    <p>Your browser does not support the video tag.</p>
                </video>
            </div>
            <p class="font-secondary text-gray-500 text-sm mt-4">A showcase of my projects and creative process
            </p>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="px-4 md:px-16 py-4 md:py-8">
        <div class="flex justify-center">
            <div class="flex flex-wrap items-center justify-center gap-2 md:gap-4" id="filterButtons">
                <button
                    class="filter-btn bg-gray-500 text-white px-4 md:px-6 py-2 rounded-full text-sm hover:bg-gray-600 transition-colors active"
                    data-filter="all">
                    All <span class="ml-2 text-xs">99</span>
                </button>
                <button
                    class="filter-btn border border-gray-300 text-gray-500 px-4 md:px-6 py-2 rounded-full text-sm hover:bg-gray-100 transition-colors"
                    data-filter="ui">
                    UI & UX
                </button>
                <button
                    class="filter-btn border border-gray-300 text-gray-500 px-4 md:px-8 py-2 rounded-full text-sm hover:bg-gray-100 transition-colors"
                    data-filter="motion">
                    Motion Graphics
                </button>
                <button
                    class="filter-btn border border-gray-300 text-gray-500 px-4 md:px-6 py-2 rounded-full text-sm hover:bg-gray-100 transition-colors"
                    data-filter="rebrand">
                    Rebrand
                </button>
                <button
                    class="filter-btn border border-gray-300 text-gray-500 px-4 md:px-6 py-2 rounded-full text-sm hover:bg-gray-100 transition-colors"
                    data-filter="backend">
                    Backend
                </button>
            </div>
        </div>
    </section>

    <!-- Projects Grid -->
    <section class="portfolio px-4 md:px-16 py-8 md:py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 portfolio-grid">
            <?php
            while($row = mysqli_fetch_array($results)) {
                $category = strtolower($row['flag']);
                $categoryClass = 'ui';
                if(strpos($category, 'backend') !== false) {
                    $categoryClass = 'backend';
                } elseif(strpos($category, 'motion') !== false) {
                    $categoryClass = 'motion';
                } elseif(strpos($category, 'rebrand') !== false) {
                    $categoryClass = 'rebrand';
                }
                
                echo '<article class="portfolio-item project-card '.$categoryClass.'" data-category="'.$categoryClass.'">
                    <div class="bg-gray-300 h-48 md:h-64 mb-4 relative overflow-hidden">
                        <img src="./images/image-placeholder.png" alt="Project Thumbnail"
                            class="center-icon w-16 h-14 md:w-24 md:h-20">
                    </div>
                    <div class="text-center">
                        <h3 class="text-gray-500 font-medium mb-2"><a href="detail.php?id='.$row['id'].'">'.$row['project'].'</a></h3>
                        <p class="font-secondary text-gray-500 text-xs">'.$row['flag'].'</p>
                    </div>
                </article>';
            }
            ?>
        </div>
    </section>
    </main>

    <!-- Footer -->
    <footer class="px-4 md:px-16 py-8 md:py-16 text-center">
        <button class="back-to-top bg-gray-300 rounded-full p-3 md:p-4 mb-6 md:mb-8 hover:bg-gray-400 transition-colors">
            <img src="./images/up-arrow-btn.png" alt="Back to top" class="w-5 h-5 md:w-6 md:h-6">
        </button>
        <p class="font-secondary text-gray-500 text-xs">@Yi Cheng. All rights reserved.</p>
    </footer>

    <script src="https://cdn.plyr.io/3.8.3/plyr.js"></script>
    <script src="js/main.js"></script>
</body>

</html>

