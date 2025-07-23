<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eSIM
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        window.addEventListener("pageshow", function (event) {
            if (event.persisted) {
                // Force a page reload if the page was loaded from cache
                window.location.reload();
            }
        });
    </script>
    <?php wp_head(); ?>
</head>

<header class="bg-questblue shadow-sm py-1"> <!-- Reduced top blank area -->
    <div class="container mx-auto">
        <!-- Top Row: Logo, Search Bar, and Navigation -->
        <section class="container mx-auto px-4 sm:px-10 lg:px-12">
            <div class="flex items-center justify-between h-[70px]"> <!-- Ensures consistent header height -->
                <!-- Left Side: Logo and Search -->
                <div class="flex items-center space-x-6 md:w-auto">
                    <!-- Logo -->
                    <a href="<?php echo home_url('/'); ?>" class="inline-flex -ml-14 md:-ml-2"> <!-- Shifted left -->
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/images/G-white.png'); ?>"
                            alt="<?php bloginfo('name'); ?>" class="h-[200px] w-auto"> <!-- Fixed height, auto width -->
                    </a>
                </div>

                <!-- Right Side: Navigation -->
                <div class="flex items-center space-x-4">
                    <!-- Hamburger Icon for Mobile -->
                    <button id="menu-toggle"
                        class="md:hidden block text-white hover:text-purple-500 focus:outline-none flex items-center justify-center w-10 h-10 rounded-full bg-white/20">
                        <span id="menu-icon" class="material-icons text-3xl">menu</span>
                    </button>

                    <!-- Navigation Menu (Dropdown on Mobile) -->
                    <nav id="menu"
                        class="hidden md:flex md:space-x-8 flex-col md:flex-row items-center absolute md:relative top-[75px] right-2 md:top-auto md:right-auto 
               bg-white md:bg-transparent shadow-lg md:shadow-none rounded-md md:rounded-none z-50 w-42 md:w-auto md:p-16 lg:p-12">
                        <a href="<?php echo home_url('/'); ?>"
                            class="flex items-center text-black md:text-white hover:text-purple-500 py-2">
                            <span class="material-icons">storefront</span>
                            <span class="ml-2">Shop</span>
                        </a>

                        <a href="<?php echo home_url('/my-account/'); ?>"
                            class="flex items-center text-black md:text-white hover:text-purple-500 py-2">
                            <span class="material-icons">account_circle</span>
                            <span class="ml-2">My Account</span>
                        </a>
                    </nav>
                </div>
            </div>
        </section>

        <!-- Centered Section: Message and Search Bar -->
        <div class="mt-6 text-center">
            <!-- Attractive Words -->
            <h1
                class="text-lg xs:text-xl sm:text-2xl font-semibold text-white max-w-xs sm:max-w-sm mx-auto leading-tight">
                Stay connected.<br>Wherever you travel.<br>At affordable rates.
            </h1>
            <p class="text-sm xs:text-base text-white max-w-xs sm:max-w-sm mx-auto mt-2 leading-snug mb-6">
                    Seamless connectivity trusted by millions.
            </p>

            <?php if ( is_shop() ) : ?>
            <!-- Search Bar -->
            <div class="relative w-full max-w-screen-lg mx-auto mb-6">
                <form role="search" method="get" action="<?php echo home_url('/'); ?>"
                    onsubmit="return validateSearch()" class="relative w-3/4 mx-auto">
                    <input type="search" name="s"
                        class="lg:w-3/4 md:w-5/6 px-4 pr-12 py-2 h-10 text-sm border rounded-full focus:ring-2 focus:ring-purple-500 focus:outline-none"
                        placeholder="Search for products...">
                    <input type="hidden" name="post_type" value="product">
                    <button type="submit"
                        class="absolute right-14 lg:right-28 md:right-30 top-[57%] transform -translate-y-1/2 text-gray-500">
                        <span class="material-icons text-lg">search</span>
                    </button>
                </form>
            </div>

            <script>
                function validateSearch() {
                    const searchInput = document.querySelector('input[name="s"]');
                    if (!searchInput.value.trim()) {
                        // Redirect user to the homepage if search input is empty
                        window.location.href = "<?php echo home_url('/'); ?>";
                        return false; // Prevent the default form submission
                    }
                    return true;
                }
            </script>
            <?php endif; ?>

        </div>
    </div>
</header>


<script>
    // JavaScript for Toggle Menu on Mobile
    const menuToggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');
    const menuIcon = document.getElementById('menu-icon'); // Menu icon element

    // Add 'hidden' class to menu initially
    menu.classList.add('hidden');

    menuToggle.addEventListener('click', function () {
        if (window.innerWidth < 768) { // Matches Tailwind's md breakpoint
            menu.classList.toggle('hidden');
            menu.classList.toggle('block'); // Ensure visibility toggles properly

            // Toggle between "menu" and "close" icons
            if (menu.classList.contains('hidden')) {
                menuIcon.textContent = 'menu'; // Show hamburger icon
            } else {
                menuIcon.textContent = 'close'; // Show "X" icon
            }
        }
    });

    // Remove 'hidden' class when resizing to md and larger screens
    window.addEventListener('resize', function () {
        if (window.innerWidth >= 768) {
            menu.classList.remove('hidden');
            menu.classList.add('block'); // Show the menu on larger screens
            menuIcon.textContent = 'menu'; // Reset to hamburger icon
        } else {
            menu.classList.add('hidden'); // Hide the menu on mobile
            menuIcon.textContent = 'menu'; // Ensure hamburger icon is visible
        }
    });
</script>