<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template has been customized to handle variable and simple products with a tailored layout.
 * WooCommerce hooks are retained for compatibility.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;


if (!$product->is_type('variable')) {
    // Fallback for non-variable products
    wc_get_template_part('single-product/add-to-cart/simple');
    return;
}



$variations = $product->get_available_variations();

if (empty($variations)) {
    echo '<p>' . esc_html__('This product has no variations available.', 'woocommerce') . '</p>';
    return;
}

$product_name = $product->get_name();
?>


<section class="py-6">
    <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">
        <?php echo esc_html($product_name); ?>
    </h1>

    <div
        class="variations-list grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-4 justify-self-center sm:px-4 md:px-6 lg:px-20">
        <?php foreach ($variations as $variation): ?>
            <?php
            $variation_obj = wc_get_product($variation['variation_id']);
            $coverage = $product->get_name();
            $variation_attributes = implode(', ', $variation_obj->get_variation_attributes());
            $data = 'N/A';
            $validity = 'N/A';
            if (preg_match('/^(\d+(?:\.\d+)?GB)\s+(\d+Day)$/i', $variation_attributes, $matches)) {
                $data = $matches[1];
                $validity = $matches[2];

                // Transform "7Day" => "7-Days"
                $validity = str_replace('Day', '-Day', $validity);

                // // Option 2: Regex-based approach
                // $validity = preg_replace('/^(\d+)Day$/', '$1-Days', $validity);
            }
            $price = $variation_obj->get_price_html();
            ?>
            <div
                class="variation-item flex flex-col justify-between w-full sm:w-64 mx-auto p-6 border-[#191970] rounded-lg bg-[#f5f5f5] text-[#333333] shadow-md">
                <div>
                <div class="mb-4 flex justify-center">
    <img src="<?php echo get_template_directory_uri(); ?>/images/esim.svg" 
        alt="Variation Image"
        class="rounded-md w-56 sm:w-80 md:w-56 h-auto">
</div>
                    <hr class="border-neutral-400 my-4">

                    <p class="flex items-center text-sm mb-2">
                        <strong class="mr-2">Coverage:</strong> <?php echo esc_html($coverage); ?>
                    </p>

                    <p class="flex items-center text-sm mb-2">
                        <strong class="mr-2">Data:</strong> <?php echo esc_html($data); ?>
                    </p>

                    <p class="flex items-center text-sm mb-2">
                        <strong class="mr-2">Validity:</strong> <?php echo esc_html($validity); ?>
                    </p>

                    <p class="flex items-center text-sm mb-4">
                        <strong class="mr-2">Price:</strong> <?php echo wp_kses_post($price); ?>
                    </p>
                </div>

                <button type="button" onclick="redirectToCheckout(<?php echo $variation['variation_id']; ?>)"
                    class="single_add_to_cart_button button alt mt-4 font-semibold py-2 px-4 rounded w-full transition bg-[#FA8072] !important border border-[#E9967A] !important text-white !important hover:bg-[#E9967A] !important hover:shadow-md !important"
                    style="background-color: #FA8072 !important; border-color: #E9967A !important; color: white !important;">
                    <?php esc_html_e('Buy Now', 'woocommerce'); ?>
                </button>
            </div>
        <?php endforeach; ?>
    </div>
</section>


<script>
    function redirectToCheckout(variationId) {
        const isLoggedIn = <?php echo is_user_logged_in() ? 'true' : 'false'; ?>;

        if (!isLoggedIn) {
            // Redirect to My Account page if the user is not logged in
            window.location.href = '<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>';
            return;
        }

        const quantity = 1; // Default quantity for "Buy Now"
        const productId = <?php echo $product->get_id(); ?>;

        // Redirect to the checkout page with product and variation added to the cart
        const checkoutUrl = '<?php echo esc_url(wc_get_checkout_url()); ?>' +
            `?add-to-cart=${productId}&variation_id=${variationId}&quantity=${quantity}`;

        window.location.href = checkoutUrl;
    }
</script>