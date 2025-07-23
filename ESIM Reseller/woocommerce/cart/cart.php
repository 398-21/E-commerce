<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_cart'); ?>

<div class="grid pt-6">
<form class="woocommerce-cart-form bg-gray-100 p-6 rounded-md lg:place-self-center lg:w-10/12 grid"
	action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
	<h1 class="text-2xl font-bold mb-6 text-center">Shopping Cart</h1>

	<?php do_action('woocommerce_before_cart_table'); ?>

	<div class="overflow-x-auto w-full">
    <table class="w-full bg-white rounded-lg shadow-md lg:max-w-5xl overflow-hidden table-auto">
        <thead class="bg-gray-50 border-b border-gray-200">
            <tr>
                <th class="py-3 px-2 sm:px-4 text-left text-xs sm:text-sm font-medium text-gray-700">Remove</th>
                <th class="py-3 px-2 sm:px-4 text-left text-xs sm:text-sm font-medium text-gray-700">Product</th>
                <th class="py-3 px-2 sm:px-4 text-right text-xs sm:text-sm font-medium text-gray-700">Price</th>
                <th class="py-3 px-2 sm:px-4 text-center text-xs sm:text-sm font-medium text-gray-700">Quantity</th>
                <th class="py-3 px-2 sm:px-4 text-right text-xs sm:text-sm font-medium text-gray-700">Subtotal</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            <?php
            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                $_product = $cart_item['data'];
                $product_id = $cart_item['product_id'];

                if ($_product && $_product->exists() && $cart_item['quantity'] > 0) {
                    $product_permalink = $_product->is_visible() ? $_product->get_permalink($cart_item) : '';
                    ?>
                    <tr>
                        <td class="py-4 px-2 sm:px-4 text-center">
                            <?php
                            echo sprintf(
                                '<a href="%s" class="text-red-500 hover:text-red-700 text-xs sm:text-sm" aria-label="Remove %s">&times;</a>',
                                esc_url(wc_get_cart_remove_url($cart_item_key)),
                                esc_html($_product->get_name())
                            );
                            ?>
                        </td>
                        <td class="py-4 px-2 sm:px-4 flex flex-col sm:flex-row items-start sm:items-center">
                            <?php
                            $thumbnail = $_product->get_image('woocommerce_thumbnail', array('class' => 'w-12 h-12 sm:w-16 sm:h-16 rounded-md shadow-sm'));
                            echo $thumbnail;

                            echo $product_permalink ?
                                sprintf(
                                    '<a href="%s" class="mt-2 sm:mt-0 sm:ml-4 text-gray-800 hover:underline text-xs sm:text-sm">%s</a>',
                                    esc_url($product_permalink),
                                    esc_html($_product->get_name())
                                ) :
                                sprintf('<span class="mt-2 sm:mt-0 sm:ml-4 text-gray-800 text-xs sm:text-sm">%s</span>', esc_html($_product->get_name()));

                            // Display variation data or other meta info.
                            echo wc_get_formatted_cart_item_data($cart_item);
                            ?>
                        </td>
                        <td class="py-4 px-2 sm:px-4 text-right text-gray-700 text-xs sm:text-sm">
                            <?php echo WC()->cart->get_product_price($_product); ?>
                        </td>
                        <td class="py-4 px-2 sm:px-4 text-center text-xs sm:text-sm">
                            <?php
                            if ($_product->is_sold_individually()) {
                                $quantity = "1";
                            } else {
                                $quantity = $cart_item['quantity'];
                            }

                            echo '<input type="number" 
                            name="cart[' . $cart_item_key . '][qty]" 
                            value="' . esc_attr($quantity) . '" 
                            min="1" 
                            max="' . esc_attr($_product->get_max_purchase_quantity()) . '" 
                            class="w-12 sm:w-16 border rounded-md text-center p-1 bg-gray-100 cursor-not-allowed pointer-events-none" 
                            readonly>';
                            ?>
                        </td>
                        <td class="py-4 px-2 sm:px-4 text-right text-gray-700 text-xs sm:text-sm">
                            <?php echo WC()->cart->get_product_subtotal($_product, $cart_item['quantity']); ?>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>


	<?php do_action('woocommerce_cart_contents'); ?>
	<?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>

	<div class="cart-collaterals max-w-5xl mt-6 justify-self-end">
            <?php do_action('woocommerce_cart_collaterals'); ?>
    </div>

	<?php do_action('woocommerce_after_cart_table'); ?>
</form>
</div>
<?php do_action('woocommerce_after_cart'); ?>