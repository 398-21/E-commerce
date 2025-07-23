<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>

<div class="p-6">
	<div class="max-w-3xl mx-auto bg-transparent rounded-lg p-8">
		<!-- Welcome Section -->
		<div class="pb-4 mb-6">
			<h1 class="text-2xl font-semibold text-gray-800">
				<?php
				printf(
					/* translators: 1: user display name 2: logout url */
					wp_kses(__('Hello %1$s,<span class="text-sm font-normal text-gray-500"></span>', ), $allowed_html),
					'<strong>' . esc_html($current_user->display_name) . '</strong>',
					esc_url(wc_logout_url())
				);
				?>
			</h1>
			<p class="mt-2 text-gray-600">
				<?php
				/* Translators: 1: Orders URL, 2: Address URL, 3: Account URL */
				$dashboard_desc = __(
					'From your account dashboard, you can view your <a href="%1$s" class="text-blue-500 hover:underline">recent orders</a>, manage your <a href="%2$s" class="text-blue-500 hover:underline">billing address</a>, and <a href="%3$s" class="text-blue-500 hover:underline">edit your password and account details</a>.',
					'woocommerce'
				);

				if (wc_shipping_enabled()) {
					/* Translators: 1: Orders URL, 2: Addresses URL, 3: Account URL */
					$dashboard_desc = __(
						'From your account dashboard, you can view your <a href="%1$s" class="text-blue-500 hover:underline">recent orders</a>, <a href="%2$s" class="text-blue-500 hover:underline">manage your shipping and billing addresses</a>, and <a href="%3$s" class="text-blue-500 hover:underline">edit your password and account details</a>.',
						'woocommerce'
					);
				}

				echo wp_kses_post(sprintf(
					$dashboard_desc,
					esc_url(wc_get_endpoint_url('orders')),
					esc_url(wc_get_endpoint_url('edit-address')),
					esc_url(wc_get_endpoint_url('edit-account'))
				));
				?>
			</p>

		</div>

		<hr class="border-t-2 border-blue-300 my-4">

		<!-- Dashboard Cards -->
		<div class="grid grid-cols-1 sm:grid-cols-2 gap-6 min-h-[200px]">
			<!-- Recent Orders Card -->
			<a href="<?php echo esc_url(wc_get_endpoint_url('orders')); ?>"
				class="flex items-center justify-between bg-blue-50 p-4 rounded-lg shadow hover:shadow-md hover:bg-blue-100 transition">
				<div>
					<h3 class="text-lg font-medium text-gray-800">Recent Orders</h3>
					<p class="text-sm text-gray-600">View and manage your recent orders</p>
				</div>
				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24"
					stroke="currentColor" stroke-width="2">
					<path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
				</svg>
			</a>

			<!-- Account Details Card -->
			<a href="<?php echo esc_url(wc_get_endpoint_url('edit-account')); ?>"
				class="flex items-center justify-between bg-green-50 p-4 rounded-lg shadow hover:shadow-md hover:bg-green-100 transition">
				<div>
					<h3 class="text-lg font-medium text-gray-800">Account Details</h3>
					<p class="text-sm text-gray-600">Edit your password and account details</p>
				</div>
				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24"
					stroke="currentColor" stroke-width="2">
					<path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
				</svg>
			</a>
		</div>

		<!-- WooCommerce Hooks -->
		<div class="mt-8">
			<?php
			/**
			 * My Account dashboard.
			 *
			 * @since 2.6.0
			 */
			do_action('woocommerce_account_dashboard');

			/**
			 * Deprecated woocommerce_before_my_account action.
			 *
			 * @deprecated 2.6.0
			 */
			do_action('woocommerce_before_my_account');

			/**
			 * Deprecated woocommerce_after_my_account action.
			 *
			 * @deprecated 2.6.0
			 */
			do_action('woocommerce_after_my_account');
			?>
		</div>
	</div>
</div>