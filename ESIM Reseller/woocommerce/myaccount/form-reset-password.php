<?php
/**
 * Lost password reset form.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-reset-password.php.
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

do_action( 'woocommerce_before_reset_password_form' );
?>

<div class="px-4 sm:px-6 md:px-8 mx-auto"> <!-- Added wrapper with horizontal padding -->
    <div class="max-w-md bg-white p-6 rounded-lg shadow-md border border-gray-200 mt-44 mb-44 mx-auto">
        <h2 class="text-2xl font-semibold text-gray-900 text-center"><?php esc_html_e( 'Reset Your Password', 'woocommerce' ); ?></h2>

        <p class="text-sm text-gray-600 text-center mt-2">
            <?php esc_html_e( 'Enter a new password below.', 'woocommerce' ); ?>
        </p>

        <form method="post" class="woocommerce-ResetPassword lost_reset_password mt-6">
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="password_1">
                    <?php esc_html_e( 'New Password', 'woocommerce' ); ?>
                </label>
                <input type="password" name="password_1" id="password_1" autocomplete="new-password"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="password_2">
                    <?php esc_html_e( 'Confirm New Password', 'woocommerce' ); ?>
                </label>
                <input type="password" name="password_2" id="password_2" autocomplete="new-password"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <input type="hidden" name="reset_key" value="<?php echo esc_attr( $args['key'] ); ?>">
            <input type="hidden" name="reset_login" value="<?php echo esc_attr( $args['login'] ); ?>">

            <?php do_action( 'woocommerce_resetpassword_form' ); ?>

            <div class="text-center">
                <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
                    <?php esc_html_e( 'Save New Password', 'woocommerce' ); ?>
                </button>
            </div>

            <?php wp_nonce_field( 'reset_password', 'woocommerce-reset-password-nonce' ); ?>
        </form>

        <p class="text-sm text-center mt-4">
            <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="text-blue-600 hover:underline">
                <?php esc_html_e( 'Back to Login', 'woocommerce' ); ?>
            </a>
        </p>
    </div>
</div>

<?php do_action( 'woocommerce_after_reset_password_form' ); ?>