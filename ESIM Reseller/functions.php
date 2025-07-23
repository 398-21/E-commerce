<?php
/**
 * eSIM functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package eSIM
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function esim_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on eSIM, use a find and replace
	 * to change 'esim' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('esim', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'esim'),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'esim_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'esim_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function esim_content_width()
{
	$GLOBALS['content_width'] = apply_filters('esim_content_width', 640);
}
add_action('after_setup_theme', 'esim_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function esim_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'esim'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'esim'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'esim_widgets_init');


/**
 * Enqueue scripts and styles.
 */
function esim_scripts()
{
	// wp_enqueue_style( 'esim-style', get_stylesheet_uri(), array(), _S_VERSION );
	// wp_enqueue_style('tailwind', 'https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css');
	// wp_enqueue_style('tailwind', 'https://cdn.tailwindcss.com');
	wp_enqueue_style('tailwind-css', get_template_directory_uri() . '/src/output.css');
	wp_style_add_data('esim-style', 'rtl', 'replace');

	//wp_enqueue_script('esim-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'esim_scripts');

// Enqueue Material Icons
function enqueue_material_icons()
{
	wp_enqueue_style('material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', [], null); // No versioning for external resources
}
add_action('wp_enqueue_scripts', 'enqueue_material_icons');

// Enqueue Font Awesome
function enqueue_font_awesome()
{
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css', [], null); // No versioning for external resources
}
add_action('wp_enqueue_scripts', 'enqueue_font_awesome');

function disable_woocommerce_sidebar() {
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');
}
add_action('init', 'disable_woocommerce_sidebar');

remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);



function enqueue_public_sans_font()
{
	wp_enqueue_style(
		'public-sans-font',
		'https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;700&display=swap',
		[],
		null
	);
}
add_action('wp_enqueue_scripts', 'enqueue_public_sans_font');

remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);


function enqueue_load_more_script()
{
    global $wp_query;

    wp_enqueue_script(
        'load-more-products',
        get_template_directory_uri() . '/js/load-more-products.js',
        ['jquery'],
        null,
        true
    );

    // Safely pass data to the script.
    wp_localize_script('load-more-products', 'load_more_params', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'query' => wp_json_encode($wp_query->query_vars), // Pass the current query vars.
        'posts_per_page' => 16, // Set default posts per page.
        'max_pages' => $wp_query->max_num_pages, // Include the max number of pages for frontend logic.
    ]);
}
add_action('wp_enqueue_scripts', 'enqueue_load_more_script');

// Force 16 products per page for the Shop page.
add_filter('loop_shop_per_page', 'set_products_per_page', 20);
function set_products_per_page($cols) {
    return 47; // Number of products per page.
}

function load_more_products() {
    $query_vars = json_decode(stripslashes(sanitize_text_field($_POST['query'])), true);
    $query_vars['paged'] = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $query_vars['posts_per_page'] = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 16;
    $query_vars['post_status'] = 'publish';

    $query = new WP_Query($query_vars);

    error_log(print_r($query_vars, true)); // Debug query variables.
    error_log('Total found posts: ' . $query->found_posts); // Check total products.

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            wc_get_template_part('woocommerce/content-custom-product');
        }
    } else {
        echo ''; // No products found.
		
    }

    wp_reset_postdata();
    wp_die();
}
add_action('wp_ajax_load_more_products', 'load_more_products');
add_action('wp_ajax_nopriv_load_more_products', 'load_more_products');

//remove page titles
function remove_wc_page_titles($title) {
    if (is_shop() || is_checkout() || is_cart() || is_account_page()) {
        return false; // Use false instead of an empty string
    }
    return $title;
}
add_filter('woocommerce_page_title', 'remove_wc_page_titles');




function disable_sale_flash() {
    remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_cart_title', 10 );

}
add_action( 'init', 'disable_sale_flash' );

add_action('template_redirect', function() {
    if (is_front_page() && !is_page('shop')) {
        wp_redirect(home_url('/'));
        exit;
    }
});

//singleproduct direct to checkout
add_action('woocommerce_thankyou', 'clear_cart_after_checkout');

function clear_cart_after_checkout($order_id) {
    if (!is_admin() && $order_id) {
        WC()->cart->empty_cart();
    }
}

add_action('template_redirect', 'clear_cart_on_page_navigation');

function clear_cart_on_page_navigation() {
    if (is_cart() || is_checkout() || is_wc_endpoint_url('order-received')) {
        // Don't clear the cart on cart, checkout, or thank-you pages
        return;
    }

    // Clear the WooCommerce cart
    if (WC()->cart) {
        WC()->cart->empty_cart();
    }
}

//prevent from brutally accessing the cart page
add_action('template_redirect', 'redirect_cart_to_shop');

function redirect_cart_to_shop() {
    // Check if the current page is the cart page
    if (is_cart()) {
        // Redirect to the shop page
        wp_redirect(wc_get_page_permalink('shop'));
        exit; // Ensure no further processing
    }
}





//checkout
// Limit billing fields to required ones
add_filter('woocommerce_checkout_fields', 'customize_billing_fields');
function customize_billing_fields($fields) {
    // Only include first name, last name, and email in billing fields
    $fields['billing'] = [
        'billing_first_name' => $fields['billing']['billing_first_name'],
        'billing_last_name'  => $fields['billing']['billing_last_name'],
        'billing_email'      => $fields['billing']['billing_email'],
		'billing_country'    => $fields['billing']['billing_country'], // consider
    ];

    return $fields;
}

add_action('wp_enqueue_scripts', function () {
    if (is_checkout()) {
        wp_enqueue_script('wc-checkout', plugins_url('woocommerce/assets/js/frontend/checkout.min.js'), array('jquery'), WC_VERSION, true);
    }
});


function modify_checkout_product_name($product_name, $cart_item, $cart_item_key) {
    // Extract the product variation name from the product name (if any)
    $pattern = '/(\d+GB)\s+(\d+)Day/';
    if (preg_match($pattern, $product_name, $matches)) {
        $data = $matches[1]; // e.g., "20GB"
        $validity = $matches[2] . '-Day'; // Convert "30Day" to "30-Days"
        $product_name = str_replace($matches[0], "$data $validity", $product_name); // Replace in the name
    }

    return $product_name;
}
add_filter('woocommerce_cart_item_name', 'modify_checkout_product_name', 10, 3);

add_action('woocommerce_checkout_create_order', 'add_custom_meta_to_order', 10, 2);

function add_custom_meta_to_order($order, $data) {
    // Add your custom meta data here
    $order->update_meta_data('_esim_iccid', '000000000000000000000'); 
}

// Disable shipping fields completely
add_filter('woocommerce_shipping_fields', '__return_empty_array');

//for seperating the payment from order review
// Detaching `payment` from `woocommerce_checkout_order_review` hook
remove_action('woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
// Attaching `payment` to my `woocommerce_checkout_payment_hook`
add_action('woocommerce_checkout_payment_hook', 'woocommerce_checkout_payment', 10 ); 

add_filter('woocommerce_add_to_cart_validation', function ($passed, $product_id, $quantity) {
    // Prevent adding duplicates to the cart
    if (WC()->cart->find_product_in_cart(WC()->cart->generate_cart_id($product_id))) {
        wc_add_notice(__('This item is already in your cart. Adjust the quantity in the cart if needed.', 'woocommerce'), 'notice');
        return false; // Block adding the item again
    }
    return $passed;
}, 10, 3);

add_filter('wc_add_to_cart_message_html', '__return_null');

function disable_wc_notices_on_checkout() {
    if (is_checkout()) {
        remove_action( 'woocommerce_before_checkout_form', 'woocommerce_output_all_notices', 10 );
    }
}
add_action( 'wp', 'disable_wc_notices_on_checkout' );



function ensure_jquery() {
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'ensure_jquery');

function debug_woocommerce_coupon_events() {
    if (is_checkout()) {
        ?>
        <script type="text/javascript">
            jQuery(function($) {
                $(document.body).on('applied_coupon removed_coupon', function(event) {
                    console.log("WooCommerce Event Fired:", event.type);
                    setTimeout(function() {
                        location.reload(); // Fully reload the page
                    }, 500);
                });
            });
        </script>
        <?php
    }
}
add_action('wp_footer', 'debug_woocommerce_coupon_events');


function test_js_is_running() {
    ?>
    <script type="text/javascript">
        jQuery(function($) {
            console.log("✅ JavaScript is working on this page!"); // Should appear in Console
        });
    </script>
    <?php
}



//myaccount
function customize_my_account_menu_items( $items ) {
    // Remove specific menu items
    unset( $items['downloads'] ); // Remove Downloads
    unset( $items['edit-address'] ); // Remove Addresses

    return $items;
}
add_filter( 'woocommerce_account_menu_items', 'customize_my_account_menu_items' );



//realtime webhook firing
add_filter( 'woocommerce_webhook_deliver_async', '__return_false' );



//refund feature
// Enqueue custom JavaScript for refund feature
add_action( 'wp_enqueue_scripts', 'enqueue_my_account_refund_script' );
function enqueue_my_account_refund_script() {
    if ( is_account_page() ) {
        wp_enqueue_script(
            'my-account-refund',
            get_template_directory_uri() . '/js/my-account-refund.js',
            array( 'jquery' ),
            '1.0',
            true
        );

        wp_localize_script( 'my-account-refund', 'myAccountRefund', array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
        ) );
    }
}

// Add AJAX handler for refund requests
add_action( 'wp_ajax_send_refund_to_make', 'send_refund_to_make_handler' );
add_action( 'wp_ajax_nopriv_send_refund_to_make', 'send_refund_to_make_handler' );

function send_refund_to_make_handler() {
    // Get the order ID from the POST request
    $order_id = intval( $_POST['order_id'] );

    if ( ! $order_id ) {
        wp_send_json_error( 'Invalid order ID' );
        return;
    }

    $order = wc_get_order( $order_id );
    if ( ! $order || $order->get_status() !== 'completed' ) {
        wp_send_json_error( 'Order not found or not eligible for refund.' );
        return;
    }

	$meta_data = array();
	foreach ( $order->get_meta_data() as $meta ) {
		if ( $meta->get_data()['key'] === 'esim_iccid' ) {
			$meta_data[$meta->get_data()['key']] = $meta->get_data()['value'];
		}
	}

    // Build the payload similar to WooCommerce webhook format
    $payload = array(
        'id'            => $order->get_id(),
        'parent_id'     => $order->get_parent_id(),
        'status'        => $order->get_status(),
        'currency'      => $order->get_currency(),
        'version'       => '9.4.3', // WooCommerce version or your site version
        'date_created'  => $order->get_date_created()->date( 'Y-m-d H:i:s' ),
        'date_modified' => $order->get_date_modified() ? $order->get_date_modified()->date( 'Y-m-d H:i:s' ) : '',
        'total'         => $order->get_total(),
        'total_tax'     => $order->get_total_tax(),
        'customer_id'   => $order->get_user_id(),
        'order_key'     => $order->get_order_key(),
        'billing'       => $order->get_address( 'billing' ),
        'shipping'      => $order->get_address( 'shipping' ),
        'payment_method'       => $order->get_payment_method(),
        'payment_method_title' => $order->get_payment_method_title(),
        'transaction_id'       => $order->get_transaction_id(),
        'line_items'    => array_map( function ( $item ) {
            return array(
                'id'       => $item->get_id(),
                'name'     => $item->get_name(),
                'product_id' => $item->get_product_id(),
                'quantity' => $item->get_quantity(),
                'subtotal' => $item->get_subtotal(),
                'total'    => $item->get_total(),
            );
        }, $order->get_items() ),
        'meta_data'  => $meta_data,
    );

    // Send the payload to Make.com webhook
    $webhook_url = 'https://hook.eu2.make.com/yvi8yuxqjuqr312rnmk6oxs6vx7ux21y'; // Replace with your actual webhook URL
    $response = wp_remote_post( $webhook_url, array(
        'method'  => 'POST',
        'body'    => json_encode( $payload ),
        'headers' => array(
            'Content-Type' => 'application/json',
        ),
    ) );

    if ( is_wp_error( $response ) ) {
        wp_send_json_error( 'Failed to send webhook: ' . $response->get_error_message() );
        return;
    }

    // Update order status to "processing"
    $order->update_status( 'processing', __( 'Refund requested via Make.com.', 'woocommerce' ) );

    wp_send_json_success( 'Webhook sent and refund initiated successfully.' );
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Add WooCommerce Support
function mytheme_add_woocommerce_support()
{
	add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');


// Handle Contact Form Submission
add_action('wp_ajax_submit_contact_form', 'handle_contact_form_submission');
add_action('wp_ajax_nopriv_submit_contact_form', 'handle_contact_form_submission');

function handle_contact_form_submission() {
    // Sanitize form data
    $name = sanitize_text_field($_POST['name'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');

    // Validate form fields
    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error(['message' => 'Please fill in all fields.']);
    }

    // Prepare email
    $to = 'support@galacticroam.com'; // Replace with your recipient email
    $subject = 'Contact Us Form Submission';
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $body = "
        <h2>New Contact Us Submission</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Message:</strong></p>
        <p>$message</p>
    ";

    // Send the email
    if (wp_mail($to, $subject, $body, $headers)) {
        wp_send_json_success(['message' => 'Thank you for reaching out! We’ll get back to you soon.']);
    } else {
        wp_send_json_error(['message' => 'Failed to send the email. Please try again later.']);
    }
}

//email
function custom_woocommerce_email_footer() {
    ?>
    <p style="text-align: center;">Thank you for your order!</p>
    <?php
}
add_filter('woocommerce_email_footer_text', 'custom_woocommerce_email_footer');


// Change WooCommerce currency symbol to S$
function esim_change_currency_symbol($currency_symbol, $currency) {
    // Don't modify the symbol if not on frontend (like admin area)
    if (is_admin()) {
        return $currency_symbol;
    }
    
    // Change $ to S$
    return 'SGD ';
}
add_filter('woocommerce_currency_symbol', 'esim_change_currency_symbol', 10, 2);