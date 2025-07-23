<?php
/**
 * My Account navigation and layout
 *
 * Centered layout using Tailwind CSS.
 *
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

do_action( 'woocommerce_before_account_navigation' );
?>

<div class="flex justify-center items-center min-h-4/6 p-6 bg-gray-50">
    <div class="flex flex-col md:flex-row gap-6 max-w-6xl w-full">
        <!-- Sidebar Navigation -->
        <nav class="woocommerce-MyAccount-navigation w-full md:w-1/3 bg-gray-50 p-6 shadow-md rounded-lg">
            <ul class="space-y-4">
                <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
                    <li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
                        <a 
                            href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>" 
                            class="block text-gray-700 hover:text-blue-500 font-medium <?php echo wc_is_current_account_menu_item( $endpoint ) ? 'text-blue-500 font-semibold' : ''; ?>"
                            <?php echo wc_is_current_account_menu_item( $endpoint ) ? 'aria-current="page"' : ''; ?>
                        >
                            <?php echo esc_html( $label ); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="w-full md:w-2/3 bg-gray-50 p-6 shadow-md rounded-lg">
            <?php do_action( 'woocommerce_account_content' ); ?>
        </div>
    </div>
</div>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
