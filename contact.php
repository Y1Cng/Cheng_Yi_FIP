<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Yi Cheng</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Roboto:wght@400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
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

        <!-- Navigation -->
        <nav class="hidden md:flex items-center gap-8 lg:gap-16">
            <a href="about.html" class="text-gray-400 text-xl lg:text-2xl hover:text-gray-600 transition-colors">About Me</a>
            <a href="contact.php" class="text-gray-500 text-xl lg:text-2xl hover:text-gray-600 transition-colors">Contact</a>
            <a href="index.php" class="text-gray-400 text-xl lg:text-2xl hover:text-gray-600 transition-colors">Portfolio</a>
        </nav>

        <!-- Profile Icon -->
        <div class="flex items-center gap-2 border border-gray-300 rounded-full px-4 py-2">
            <img src="./images/menu-profile-image.png" alt="Profile" class="w-8 h-8 rounded-full">
            <img src="./images/notification-icon.png" alt="Notification" class="w-5 h-4">
        </div>
    </header>

    <main>
    <!-- Contact Form Section -->
    <section class="px-4 md:px-16 py-8 md:py-16">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-3xl md:text-4xl text-gray-500 mb-8">Get In Touch</h1>
            <div class="mb-8">
                <p class="font-secondary text-gray-500 text-sm mb-2">Your message here → My reply here → Amazing project everywhere.</p>
                <p class="font-secondary text-gray-500 text-sm">Let's start a conversation that could lead to something awesome!</p>
                <?php
                if(isset($_GET['msg'])) {
                    echo '<p class="mt-4 p-4 bg-gray-100 rounded-lg text-gray-700 text-sm">'.htmlspecialchars($_GET['msg'], ENT_QUOTES, 'UTF-8').'</p>';
                }
                ?>
            </div>

            <form method="post" action="includes/send.php" class="space-y-6">
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-gray-500 text-sm mb-2">Name*</label>
                        <input type="text" id="name" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-gray-500">
                    </div>
                    <div>
                        <label for="phone" class="block text-gray-500 text-sm mb-2">Phone Number*</label>
                        <input type="tel" id="phone" name="phone" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-gray-500">
                    </div>
                </div>
                <div>
                    <label for="email" class="block text-gray-500 text-sm mb-2">Email*</label>
                    <input type="email" id="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-gray-500">
                </div>
                <div>
                    <label for="message" class="block text-gray-500 text-sm mb-2">Message*</label>
                    <textarea id="message" name="message" rows="5" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-gray-500"></textarea>
                </div>
                <button type="submit" name="submit" class="bg-gray-500 text-white px-6 py-2 rounded-full text-sm hover:bg-gray-600 transition-colors">Submit</button>
            </form>
        </div>
    </section>
    </main>

    <!-- Footer -->
    <footer class="px-4 md:px-16 py-8 md:py-16 text-center">
        <p class="font-secondary text-gray-500 text-xs">@Yi Cheng. All rights reserved.</p>
    </footer>

    <script src="js/main.js"></script>
</body>

</html>

