<?php
/**
 * Checkout coupon form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-coupon.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

if ( ! wc_coupons_enabled() ) { // @codingStandardsIgnoreLine.
	return;
}

?>



<div class="woocommerce-form-coupon-toggle bg-gray-200 text-center p-1 rounded-md shadow-md">
    <p class="text-gray-700 font-medium mb-2">
        <?php esc_html_e('Have a coupon?', 'woocommerce'); ?>
        <a href="#" class="showcoupon text-blue-600 font-semibold underline">
            <?php esc_html_e('Click here to enter your code', 'woocommerce'); ?>
        </a>
    </p>
</div>

<!-- Wrapper to fully remove space between message and form -->
<div class="w-full flex justify-center">
    <form class="checkout_coupon woocommerce-form-coupon flex flex-col sm:flex-row items-center gap-2 bg-white p-2 rounded-lg shadow-md w-full max-w-lg mx-auto justify-center mt-0" method="post" style="display:none">
        <div class="w-full sm:w-3/4">
            <label for="coupon_code" class="hidden"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label>
            <input type="text" name="coupon_code" class="w-full border border-gray-300 p-1.5 rounded-md focus:ring-2 focus:ring-blue-500 text-center" placeholder="<?php esc_attr_e( 'Enter coupon code', 'woocommerce' ); ?>" id="coupon_code" value="" />
        </div>

        <div class="w-full sm:w-auto">
            <button type="submit" class="w-full sm:w-28 bg-questblue text-white py-1.5 px-4 rounded-md hover:bg-blue-700 transition" name="apply_coupon">
                <?php esc_html_e( 'Apply', 'woocommerce' ); ?>
            </button>
        </div>
    </form>
</div>
