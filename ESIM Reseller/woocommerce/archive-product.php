<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
// do_action('woocommerce_before_main_content');
?>



<section class="container mx-auto py-8 px-4 sm:px-8 lg:px-8 xl:px-24">
    <style>
        /* Force grid columns at different breakpoints */
        @media (max-width: 639px) {
            .esim-grid {
                grid-template-columns: repeat(1, minmax(0, 1fr)) !important;
            }
        }
        @media (min-width: 640px) and (max-width: 1023px) {
            .esim-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
            }
        }
        @media (min-width: 1024px) and (max-width: 1279px) {
            .esim-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
            }
        }
        @media (min-width: 1280px) {
            .esim-grid {
                grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
            }
        }
    </style>

    <!-- Popular Destinations Section -->
    <div class="mb-12">
       <h2 class="text-2xl font-bold mb-4">Popular Destinations</h2>
       <div class="esim-grid grid gap-6">
          <?php
          $popular_destinations = array('thailand', 'vietnam', 'malaysia', 'australia', 'china', 'indonesia', 'south-korea', 'japan');
          
          foreach ($popular_destinations as $destination) {
             $product = get_page_by_path($destination, OBJECT, 'product');
             if ($product) {
                $post = $product;
                setup_postdata($post);
                wc_get_template_part('content', 'custom-product');
                wp_reset_postdata();
             }
          }
          ?>
       </div>
    </div>

    <!-- All Destinations Section -->
    <div class="mt-3">
       <h2 class="text-2xl font-bold my-6">All Destinations</h2>
       <div id="country-grid" class="esim-grid grid gap-6">
          <?php if (woocommerce_product_loop()) : ?>
             <?php
             while (have_posts()) :
                the_post();
                do_action('woocommerce_shop_loop');
                wc_get_template_part('content', 'custom-product');
             endwhile;
             woocommerce_product_loop_end();
             ?>
          <?php else : ?>
             <p class="text-gray-600 text-center">No products found.</p>
          <?php endif; ?>
       </div>
    </div>

    <!-- <div class="flex justify-center mt-8">
       <button id="load-more" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-questblue">
          Load More
       </button>
    </div> -->

</section>

<!-- Why Choose Us Section -->
<section class="py-16 bg-gray-100"> <!-- Full-width section with gray background -->
    <div class="max-w-screen-lg mx-auto px-4">
        <h2 class="text-4xl font-bold text-center mb-10">Why Choose Us</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8"> <!-- Restrict grid width -->
            <!-- Testimonial 1 -->
            <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200 flex flex-col h-full max-w-md mx-auto">
                <div class="flex flex-col items-center mb-6">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/channel.svg'); ?>"
                        alt="Connectivity Icon" class="w-12 h-12">
                    <div class="ml-4">
                        <h3 class="text-xl text-center font-semibold">Instant Connectivity</h3>
                        <p class="text-gray-600 text-sm">Access your eSIM instantly from anywhere in the world.</p>
                    </div>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg h-[150px] flex-grow">
                    <p class="font-bold mb-2">A true game-changer!</p>
                    <p class="text-gray-600 text-sm">
                        “Easy and quick activation, and seamless internet connection. This eSIM made traveling much more convenient.”
                    </p>
                    <p class="text-gray-800 text-xs mt-2">- Sarah Evans</p>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200 flex flex-col h-full max-w-md mx-auto">
                <div class="flex flex-col items-center mb-6">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/world.svg'); ?>"
                        alt="Global Icon" class="w-12 h-12">
                    <div class="ml-4">
                        <h3 class="text-xl text-center font-semibold">Global Coverage</h3>
                        <p class="text-gray-600 text-sm">Stay connected in over 100 countries and regions.
                        </p>
                    </div>
                </div>
                <div class="bg-gray-100 p-4 h-[150px] rounded-lg">
                    <p class="font-bold mb-2">Traveling made easy!</p>
                    <p class="text-gray-600 text-sm">
                        “Works perfectly even in remote areas. The global coverage gives me complete peace of mind.”
                    </p>
                    <p class="text-gray-500 text-xs mt-2">- Mark Lim</p>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200 flex flex-col h-full max-w-md mx-auto">
                <div class="flex flex-col items-center mb-6">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/cheap.svg'); ?>"
                        alt="Transparent Icon" class="w-12 h-12">
                    <div class="ml-4">
                        <h3 class="text-xl text-center font-semibold">Affordable Plans</h3>
                        <p class="text-gray-600 text-sm">Transparent pricing with no hidden fees.</p>
                    </div>
                </div>
                <div class="bg-gray-100 p-4 h-[150px] rounded-lg">
                    <p class="font-bold mb-2">Incredible value!</p>
                    <p class="text-gray-600 text-sm">
                        “Clear pricing with no hidden charges. Very affordable and reliable.”
                    </p>
                    <p class="text-gray-500 text-xs mt-2">- Lisa Palmer </p>
                </div>
            </div>

            <!-- Testimonial 4 -->
            <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200 flex flex-col h-full max-w-md mx-auto">
                <div class="flex flex-col items-center mb-6">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/customer-service.svg'); ?>"
                        alt="Support Icon" class="w-12 h-12">
                    <div class="ml-4">
                        <h3 class="text-xl text-center font-semibold">24/7 Support</h3>
                        <p class="text-gray-600 text-sm">Our team is here to help anytime, anywhere.</p>
                    </div>
                </div>
                <div class="bg-gray-100 p-4 h-[150px] rounded-lg">
                    <p class="font-bold mb-2">Unbeatable customer service!</p>
                    <p class="text-gray-600 text-sm">
                        “The support team went above and beyond in addressing my queries. Thoroughly impressed by their 24/7 availability and professionalism."
                    </p>
                    <p class="text-gray-500 text-xs mt-2">- James Lee</p>
                </div>
            </div>

            <!-- Testimonial 5 -->
            <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200 flex flex-col h-full max-w-md mx-auto">
                <div class="flex flex-col items-center mb-6">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/router.svg'); ?>"
                        alt="Data Icon" class="w-12 h-12">
                    <div class="ml-4">
                        <h3 class="text-xl text-center font-semibold">Fast Data Speeds</h3>
                        <p class="text-gray-600 text-sm">Enjoy reliable, high-speed internet wherever you go.</p>
                    </div>
                </div>
                <div class="bg-gray-100 p-4 h-[150px] rounded-lg">
                    <p class="font-bold mb-2">Superb internet speed!</p>
                    <p class="text-gray-600 text-sm">
                        “The high-speed data is a game-changer. Even in remote areas, the internet speed remained consistent.”
                    </p>
                    <p class="text-gray-500 text-xs mt-2">- Mia Chang</p>
                </div>
            </div>

            <!-- Testimonial 6 -->
            <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200 flex flex-col h-full max-w-md mx-auto">
                <div class="flex flex-col items-center mb-6">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/infinite.svg'); ?>"
                        alt="Reliable Icon" class="w-12 h-12">
                    <div class="ml-4">
                        <h3 class="text-xl text-center font-semibold">Reliable Service</h3>
                        <p class="text-gray-600 text-sm">Trusted by thousands for consistent connectivity.
                        </p>
                    </div>
                </div>
                <div class="bg-gray-100 p-4 h-[150px] rounded-lg">
                    <p class="font-bold mb-2">Rock-solid performance!</p>
                    <p class="text-gray-600 text-sm">
                        “Reliability is everything when you’re on the go, and this service delivers. Great consistency and very dependable performance.”
                    </p>
                    <p class="text-gray-500 text-xs mt-2">- Elijah Davidson
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer('shop'); ?>