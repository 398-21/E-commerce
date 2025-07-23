<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.2.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_lost_password_form' );
?>

<div class="px-4 sm:px-0 mx-auto"> <!-- Added px-4 for mobile padding -->
    <div class="max-w-md bg-gray-50 p-6 rounded-lg shadow-lg border border-gray-200 mt-40 mb-40 mx-auto">
        <h2 class="text-2xl font-semibold text-gray-900 text-center"><?php esc_html_e( 'Reset Password', 'woocommerce' ); ?></h2>

        <p class="text-sm text-red-500 text-center mt-2">
            <?php esc_html_e( 'Enter your email below, and we will send you a password reset link.', 'woocommerce' ); ?>
        </p>

        <form method="post" class="woocommerce-ResetPassword lost_reset_password mt-6">
            <?php wc_print_notices(); ?>

            <!-- Email Input -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="user_login">
                    <?php esc_html_e( 'Email Address', 'woocommerce' ); ?>
                </label>
                <input type="email" name="user_login" id="user_login"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition">
                    <?php esc_html_e( 'Reset Password', 'woocommerce' ); ?>
                </button>
            </div>

            <?php wp_nonce_field( 'lost_password' ); ?>
            <input type="hidden" name="wc_reset_password" value="true">
        </form>

        <!-- Back to Login Link -->
        <p class="text-sm text-center mt-4">
            <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="text-blue-600 hover:underline">
                <?php esc_html_e( 'Back to Login', 'woocommerce' ); ?>
            </a>
        </p>
    </div>
</div>
<?php
do_action( 'woocommerce_after_lost_password_form' );