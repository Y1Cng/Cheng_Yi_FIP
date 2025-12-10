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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Roboto:wght@400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.8.3/plyr.css" />
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/ScrollTrigger.min.js"></script>
</head>

<body>
    <!-- Header -->
    <header class="flex items-center justify-between px-4 md:px-16 py-4 md:py-8">
        <!-- Logo Section -->
        <div class="flex items-center gap-2 md:gap-4">
            <div class="relative">
                <img src="./images/profile-image.svg" alt="Profile" class="w-10 h-10 md:w-12 md:h-12 rounded-full">
            </div>

            <div class="relative">
                <div class="hire-me-btn rounded-full px-4 py-2">
                    <span class="hire-me-text text-xs font-medium">Hire Me!</span>
                </div>
                <div class="absolute inset-0 border-2 border-dashed border-gray-400 rounded-full scale-110 pointer-events-none">
                </div>
                <img src="./images/arrow-icon.png" alt="Arrow" class="absolute -right-8 top-0 w-10 h-5 pointer-events-none">
            </div>
        </div>

        <!-- Search Form -->
        <form action="" class="hidden md:flex items-center gap-2">
            <div class="search-input-wrapper flex items-center border rounded-full px-4 py-2">
                <input type="text" class="search-input bg-transparent border-none outline-none text-sm" placeholder="Search projects..." name="search" value="<?php echo htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <button class="search-btn px-4 py-2 rounded-full text-sm transition-colors" type="submit">
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
        <nav class="main-nav hidden md:flex items-center gap-8 lg:gap-16">
            <a href="about.php" class="nav-link text-xl lg:text-2xl transition-colors">About Me</a>
            <a href="contact.php" class="nav-link text-xl lg:text-2xl transition-colors">Contact</a>
            <a href="index.php" class="nav-link active text-xl lg:text-2xl transition-colors">Portfolio</a>
        </nav>

        <!-- Mobile Navigation Menu -->
        <nav id="mobileMenu" class="overlay">
            <button id="closeMobileMenu" class="absolute top-4 right-4 text-3xl" style="color: #6E7B8B; background: none; border: none; cursor: pointer; font-size: 2rem;">&times;</button>
            <div class="flex flex-col items-center justify-center h-full gap-8">
                <a href="about.php" class="nav-link text-2xl transition-colors" style="color: #6E7B8B;">About Me</a>
                <a href="contact.php" class="nav-link text-2xl transition-colors" style="color: #6E7B8B;">Contact</a>
                <a href="index.php" class="nav-link text-2xl transition-colors" style="color: #6E7B8B;">Portfolio</a>
            </div>
        </nav>

    </header>

    <main>
    <!-- Hero Section -->
    <section class="px-4 md:px-16 py-4 md:py-8">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-3xl md:text-4xl mb-6 md:mb-8">Hi there!</h1>
            <p class="font-secondary text-sm leading-relaxed max-w-2xl mx-auto px-2 md:px-0">
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
    <section class="px-4 md:px-16 py-4 md:py-6">
        <div class="max-w-4xl mx-auto text-center">
            <div class="bg-gray-300 rounded-lg overflow-hidden aspect-video">
                <video id="player" class="w-full h-full" preload="metadata">
                    <source src="./videos/Cheng_Yi_Demo_Reel.mp4" type="video/mp4">
                    <p>Your browser does not support the video tag.</p>
                </video>
            </div>
            <p class="font-secondary text-sm mt-2 video-description">A showcase of my projects and creative process
            </p>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="px-4 md:px-16 py-2 md:py-4">
        <div class="flex justify-center">
            <div class="flex flex-wrap items-center justify-center gap-2 md:gap-4" id="filterButtons">
                <button
                    class="filter-btn px-4 md:px-6 py-2 rounded-full text-sm transition-colors active"
                    data-filter="all">
                    All <span class="ml-2 text-xs">6</span>
                </button>
                <button
                    class="filter-btn border px-4 md:px-6 py-2 rounded-full text-sm transition-colors"
                    data-filter="ui">
                    UI & UX
                </button>
                <button
                    class="filter-btn border px-4 md:px-8 py-2 rounded-full text-sm transition-colors"
                    data-filter="motion">
                    Motion Graphics
                </button>
                <button
                    class="filter-btn border px-4 md:px-6 py-2 rounded-full text-sm transition-colors"
                    data-filter="rebrand">
                    Rebrand
                </button>
                <button
                    class="filter-btn border px-4 md:px-6 py-2 rounded-full text-sm transition-colors"
                    data-filter="backend">
                    Backend
                </button>
            </div>
        </div>
    </section>

    <!-- Projects Grid -->
    <section class="portfolio px-4 md:px-16 py-4 md:py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4 portfolio-grid">
            <?php
            $imageMap = array(
                'flowsonic' => 'flowsonic_earbuds_x-ray_1_0000.jpg',
                'sports' => 'stadium_1_1582.jpg',
                'quatro' => 'quatro-project-outdoor.jpg',
                'contact' => 'backend project image.png',
                'portfolio contact' => 'backend project image.png'
            );
            
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
                
                $projectName = strtolower($row['project']);
                $projectImage = './images/image-placeholder.png';
                
                foreach($imageMap as $key => $image) {
                    if(strpos($projectName, $key) !== false) {
                        // URL encode the image filename to handle spaces
                        $encodedImage = str_replace(' ', '%20', $image);
                        $projectImage = './images/'.$encodedImage;
                        break;
                    }
                }
                
                echo '<article class="portfolio-item project-card '.$categoryClass.'" data-category="'.$categoryClass.'">
                    <div class="bg-gray-300 aspect-[4/3] md:aspect-[3/2] mb-4 relative overflow-hidden rounded-lg">
                        <img src="'.$projectImage.'" alt="'.htmlspecialchars($row['project'], ENT_QUOTES, 'UTF-8').'"
                            class="w-full h-full object-cover" onerror="this.src=\'./images/image-placeholder.png\'">
                    </div>
                    <div class="text-center">
                        <h3 class="font-medium mb-2"><a href="detail.php?id='.$row['id'].'">'.$row['project'].'</a></h3>
                        <p class="font-secondary text-xs">'.$row['flag'].'</p>
                    </div>
                </article>';
            }
            ?>
        </div>
    </section>
    </main>

    <!-- Footer -->
    <footer class="px-4 md:px-16 py-4 md:py-6 text-center">
        <button class="back-to-top rounded-full p-3 md:p-4 mb-6 md:mb-8 transition-colors">
            <img src="./images/up-arrow-btn.png" alt="Back to top" class="w-5 h-5 md:w-6 md:h-6">
        </button>
        <p class="font-secondary text-xs copyright">@Yi Cheng. All rights reserved.</p>
    </footer>

    <script src="https://cdn.plyr.io/3.8.3/plyr.js"></script>
    <script src="js/main.js"></script>
</body>

</html>

