<?php
if (!defined('ABSPATH')) {
	exit;
}

do_action('woocommerce_before_checkout_form', $checkout);

if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
	echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
	return;
}

?>

<form name="checkout" method="post"
	class="checkout woocommerce-checkout mx-auto px-6 py-2 mb-12 max-w-3xl"
	action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data"
	aria-label="<?php echo esc_attr__('Checkout', 'woocommerce'); ?>">

	<!-- Order Summary Section -->
	<div class="order-summary max-w-3xl mx-auto bg-gray-50 p-6 rounded-lg shadow-lg mb-6">
		<?php
		$items = WC()->cart->get_cart();
		foreach ($items as $cart_item_key => $cart_item):
			$product = $cart_item['data'];
			$product_name = $product->get_name();
			$product_price = $product->get_price_html();
			$product_quantity = $cart_item['quantity'];
			$product_subtotal = wc_price($cart_item['line_subtotal']); // Subtotal without tax
			$product_total = wc_price($cart_item['line_total'] + $cart_item['line_tax']); // Total with tax
			$product_image = $product->get_image(); // Use WooCommerce product image
		
			$product_name_parts = explode(' - ', $product_name);
			$display_product_name = $product_name_parts[0]; // Get the first part
			?>
			<div class="order-item flex flex-row items-center w-full border rounded-lg bg-white text-black shadow-md p-6">
				<div class="mr-6">
					<img src="<?php echo get_template_directory_uri(); ?>/images/esim.svg" alt="Variation Image"
						class="rounded-md w-96 h-32">
				</div>

				<div class="flex-1">
					<?php do_action('woocommerce_checkout_order_review'); ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>

	<!-- Customer Details Section -->
	<div class="customer-details max-w-3xl mx-auto bg-gray-50 p-6 rounded-lg shadow-lg mb-6">
		<h2 class="text-lg font-semibold mb-4 text-gray-700">Billing Details</h2>
		<div id="customer_details">
			<div>
				<p class="mt-3 text-red-500">
					Please ensure that the email address you provide is accurate and valid. It will be used to deliver
					your eSIM. Fake or incorrect email addresses may prevent successful delivery.
				</p>
				<?php do_action('woocommerce_checkout_billing'); ?>
			</div>
		</div>
	</div>

	<!-- Choose Payment Section -->
	<div class="choose-payment max-w-3xl mx-auto bg-gray-50 p-6 rounded-lg shadow-lg mb-6">
		<span class="text-gray-600">Before completing this order, please confirm your device is eSIM compatible
			and network-unlocked.</span>
		
		<div class="bg-white p-6 rounded-lg shadow-md mt-4">
			<h2 class="text-lg font-semibold mb-4 text-gray-700">Payment</h2>
			<div class="border-t border-gray-200 pt-4">
				<?php do_action('woocommerce_checkout_payment_hook'); ?>
			</div>
		</div>
	</div>
			
</form>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>
