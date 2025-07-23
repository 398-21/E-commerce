<?php
defined('ABSPATH') || exit;

get_header();
?>

<!-- WooCommerce Hooks for Breadcrumbs and Notices -->
<?php do_action('woocommerce_before_main_content'); ?>

<section class="container mx-auto py-10">
    
    <h1 class="text-3xl font-bold text-center mb-8"><?php woocommerce_page_title(); ?></h1>

    <!-- Card Grid -->
    <div id="country-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php if (woocommerce_product_loop()): ?>
            <?php while (have_posts()):
                the_post(); ?>
                <?php get_template_part('woocommerce/content', 'custom-product'); ?>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-gray-600 text-center">No products found.</p>
        <?php endif; ?>
    </div>

    <div class="flex justify-center mt-8">
        <button id="load-more" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
            Load More
        </button>
    </div>

</section>

<!-- Why Choose Us Section -->
<section class="py-16 bg-gray-100"> <!-- Full-width section with gray background -->
    <div class="max-w-screen-lg mx-auto px-4">
        <h2 class="text-4xl font-bold text-center mb-10">Why Choose Us</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8"> <!-- Restrict grid width -->
            <!-- Testimonial 1 -->
            <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200 flex flex-col h-full max-w-md mx-auto">
                <div class="flex flex-col items-center mb-6">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/connectivity-icon.png'); ?>"
                        alt="Connectivity Icon" class="w-12 h-12">
                    <div class="text-center mt-4">
                        <h3 class="text-xl font-semibold">Instant Connectivity</h3>
                        <p class="text-gray-600 text-sm">Access your eSIM instantly from anywhere in the world.</p>
                    </div>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg flex-grow">
                    <p class="font-bold mb-2">A true game-changer!</p>
                    <p class="text-gray-600 text-sm">
                        “I’ve always struggled with getting connected while traveling, but this eSIM service solved
                        everything. I downloaded it easily, activated it in minutes, and had reliable internet
                        throughout my
                        trip. No more waiting for local SIMs or hunting for Wi-Fi in cafes. This service has made travel
                        so
                        much more convenient and stress-free. Highly recommend to all frequent travelers looking for
                        seamless connectivity.”
                    </p>
                    <p class="text-gray-500 text-xs mt-2">- Sarah Johnson</p>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200 flex flex-col h-full max-w-md mx-auto">
                <div class="flex flex-col items-center mb-6">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/global-icon.png'); ?>"
                        alt="Global Icon" class="w-12 h-12">
                    <div class="ml-4">
                        <h3 class="text-xl text-center font-semibold">Global Coverage</h3>
                        <p class="text-gray-600 text-sm">Stay connected in over 200+ countries and regions worldwide.
                        </p>
                    </div>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg">
                    <p class="font-bold mb-2">Traveling made easy!</p>
                    <p class="text-gray-600 text-sm">
                        “This service has transformed how I travel. I’ve used it across four countries, including remote
                        areas, and it worked perfectly. No more worrying about finding local SIM cards or dealing with
                        high
                        roaming charges. The global coverage gives me complete peace of mind, and the setup process is
                        simple. It’s exactly what every traveler needs. I’m genuinely impressed with the reliability and
                        coverage offered by this eSIM.”
                    </p>
                    <p class="text-gray-500 text-xs mt-2">- Mark Evans</p>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200 flex flex-col h-full max-w-md mx-auto">
                <div class="flex flex-col items-center mb-6">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/transparent-icon.png'); ?>"
                        alt="Transparent Icon" class="w-12 h-12">
                    <div class="ml-4">
                        <h3 class="text-xl text-center font-semibold">Affordable Plans</h3>
                        <p class="text-gray-600 text-sm">Transparent pricing with no hidden fees or surprises.</p>
                    </div>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg">
                    <p class="font-bold mb-2">Incredible value!</p>
                    <p class="text-gray-600 text-sm">
                        “I’ve been using their plans for over a year, and it’s been fantastic. The pricing is clear, and
                        there are absolutely no hidden charges. What I love most is that I can choose a plan that fits
                        my
                        specific travel needs without overspending. It’s affordable, flexible, and reliable. For anyone
                        who
                        travels frequently, this service offers unmatched value and complete transparency. I couldn’t be
                        happier!”
                    </p>
                    <p class="text-gray-500 text-xs mt-2">- Lisa Green</p>
                </div>
            </div>

            <!-- Testimonial 4 -->
            <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200 flex flex-col h-full max-w-md mx-auto">
                <div class="flex flex-col items-center mb-6">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/support-icon.png'); ?>"
                        alt="Support Icon" class="w-12 h-12">
                    <div class="ml-4">
                        <h3 class="text-xl text-center font-semibold">24/7 Support</h3>
                        <p class="text-gray-600 text-sm">Our friendly team is here to help anytime, anywhere.</p>
                    </div>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg">
                    <p class="font-bold mb-2">Unbeatable customer service!</p>
                    <p class="text-gray-600 text-sm">
                        “I’ve had a couple of questions while setting up my eSIM, and the support team went above and
                        beyond
                        to assist me. Their 24/7 availability is a blessing, especially for international travelers
                        dealing
                        with different time zones. They resolved my issue quickly, and their professionalism was
                        outstanding. It’s rare to find such dedicated and responsive customer support these days. I’m
                        thoroughly impressed!”
                    </p>
                    <p class="text-gray-500 text-xs mt-2">- James Carter</p>
                </div>
            </div>

            <!-- Testimonial 5 -->
            <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200 flex flex-col h-full max-w-md mx-auto">
                <div class="flex flex-col items-center mb-6">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/data-icon.png'); ?>"
                        alt="Data Icon" class="w-12 h-12">
                    <div class="ml-4">
                        <h3 class="text-xl text-center font-semibold">Fast Data Speeds</h3>
                        <p class="text-gray-600 text-sm">Enjoy reliable, high-speed internet wherever you go.</p>
                    </div>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg">
                    <p class="font-bold mb-2">Superb internet speed!</p>
                    <p class="text-gray-600 text-sm">
                        “The high-speed data was a game-changer for me. I could stream videos, make video calls, and
                        even
                        upload my travel vlogs without any interruptions. Even in remote areas, the internet speed
                        remained
                        consistent. This is by far the best connectivity solution I’ve used while traveling. I’m amazed
                        by
                        how seamless the experience was. Highly recommended for anyone needing fast and reliable data on
                        the
                        go!”
                    </p>
                    <p class="text-gray-500 text-xs mt-2">- Mia Brown</p>
                </div>
            </div>

            <!-- Testimonial 6 -->
            <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200 flex flex-col h-full max-w-md mx-auto">
                <div class="flex flex-col items-center mb-6">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/reliable-icon.png'); ?>"
                        alt="Reliable Icon" class="w-12 h-12">
                    <div class="ml-4">
                        <h3 class="text-xl text-center font-semibold">Reliable Service</h3>
                        <p class="text-gray-600 text-sm">Trusted by thousands for seamless and consistent connectivity.
                        </p>
                    </div>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg">
                    <p class="font-bold mb-2">Rock-solid performance!</p>
                    <p class="text-gray-600 text-sm">
                        “Reliability is everything when you’re on the go, and this service delivers. I’ve used it during
                        multiple international trips, and it’s never let me down. Whether it’s staying connected for
                        work or
                        keeping in touch with family, I always know I can rely on it. The peace of mind it provides is
                        invaluable. This service is worth every penny for its consistent and dependable performance.”
                    </p>
                    <p class="text-gray-500 text-xs mt-2">- David White</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- WooCommerce After Main Content Hook -->
<?php do_action('woocommerce_after_main_content'); ?>

<?php get_footer(); ?>