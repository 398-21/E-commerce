<?php
/**
 * Lost password confirmation text.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/lost-password-confirmation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.9.0
 */

defined( 'ABSPATH' ) || exit;

wc_print_notice( esc_html__( 'Password reset email has been sent.', 'woocommerce' ) );
?>

<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md border border-gray-200 mt-44 mb-44 text-center">
    <h2 class="text-2xl font-semibold text-gray-900"><?php esc_html_e( 'Reset Link Sent!', 'woocommerce' ); ?></h2>

    <p class="text-sm text-gray-600 mt-2">
        <?php esc_html_e( 'We have sent you an email with a link to reset your password. Please check your inbox and spam folder.', 'woocommerce' ); ?>
    </p>

    <div class="mt-4">
        <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="text-blue-600 hover:underline">
            <?php esc_html_e( 'Back to Login', 'woocommerce' ); ?>
        </a>
    </div>
</div>