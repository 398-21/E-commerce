<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/view-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

defined('ABSPATH') || exit;

$notes = $order->get_customer_order_notes();
?>


<section class="container mx-auto py-10 px-8">
	<div class="max-w-4xl mx-auto p-6 bg-white shadow rounded-lg">
		<!-- Order Heading -->
		<h1 class="text-2xl sm:text-3xl font-semibold text-center text-gray-800">
			<?php printf(esc_html__('Order Details', 'woocommerce'), $order->get_order_number()); ?>
		</h1>

		<!-- Order Status -->
		<p class="text-center text-gray-600 mt-2 text-sm sm:text-base">
			Placed on <strong><?php echo wc_format_datetime($order->get_date_created()); ?></strong> and is currently
			<span class="font-semibold text-blue-600">
				<?php
				$status = $order->get_status();
				echo esc_html($status === 'cancelled' ? 'Non-Refundable' : wc_get_order_status_name($status));
				?>
			</span>
		</p>

		<?php if ($notes): ?>
			<h2><?php esc_html_e('Order updates', 'woocommerce'); ?></h2>
			<ol class="woocommerce-OrderUpdates commentlist notes">
				<?php foreach ($notes as $note): ?>
					<li class="woocommerce-OrderUpdate comment note">
						<div class="woocommerce-OrderUpdate-inner comment_container">
							<div class="woocommerce-OrderUpdate-text comment-text">
								<div class="woocommerce-OrderUpdate-description description">
									<?php echo wpautop(wptexturize($note->comment_content)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								</div>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</div>
					</li>
				<?php endforeach; ?>
			</ol>
		<?php endif; ?>

		<!-- Order Details Table -->
		<div class="mt-8 border-t border-gray-200 pt-4">
			<h2 class="text-lg font-medium text-gray-800 mb-4">Order Details</h2>

			<!-- Scrollable Table for Mobile -->
			<div class="overflow-x-auto">
				<table class="w-full border border-gray-300 text-left border-collapse min-w-[600px] sm:min-w-full">
					<thead class="bg-gray-100">
						<tr>
							<th class="px-4 py-2 font-medium text-gray-600 border-b text-sm sm:text-base">Product</th>
							<th class="px-4 py-2 font-medium text-gray-600 border-b text-sm sm:text-base">Data</th>
							<th class="px-4 py-2 font-medium text-gray-600 border-b text-sm sm:text-base">Validity</th>
							<th class="px-4 py-2 font-medium text-gray-600 border-b text-sm sm:text-base">Quantity</th>
							<th class="px-4 py-2 font-medium text-gray-600 border-b text-sm sm:text-base">Price</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($order->get_items() as $item_id => $item): ?>
							<?php
							$product = $item->get_product();
							$product_name = $item->get_name();
							$data = 'N/A';
							$validity = 'N/A';

							// Extract only the part before the hyphen (-)
							$product_name_parts = explode(' - ', $product_name);
							$clean_product_name = trim($product_name_parts[0]); // Get the first part
							// Get Meta Data
							$meta_data = $item->get_meta_data();
							$attributes_string = '';
							foreach ($meta_data as $meta) {
								$attributes_string .= $meta->value . ' ';
							}

							// Extract "1GB" and "7Day" values
							if (preg_match('/(\d+(?:\.\d+)?GB)/i', $attributes_string, $data_matches)) {
								$data = $data_matches[1];
							}
							if (preg_match('/(\d+Day)/i', $attributes_string, $validity_matches)) {
								$validity = str_replace('Day', '-Day', $validity_matches[1]);
							}
							?>
							<tr>
								<td class="px-4 py-2 border-b text-gray-800 text-sm sm:text-base">
									<?php echo esc_html($clean_product_name); ?>
								</td>
								<td class="px-4 py-2 border-b text-gray-800 text-sm sm:text-base">
									<?php echo esc_html($data); ?>
								</td>
								<td class="px-4 py-2 border-b text-gray-800 text-sm sm:text-base">
									<?php echo esc_html($validity); ?>
								</td>
								<td class="px-4 py-2 border-b text-gray-800 text-sm sm:text-base">
									<?php echo esc_html($item->get_quantity()); ?>
								</td>
								<td class="px-4 py-2 border-b text-gray-800 text-sm sm:text-base">
									<?php echo wc_price($order->get_line_total($item, true, true)); ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>

		<!-- Billing Address -->
		<div class="mt-8 border-t border-gray-200 pt-4">
			<h2 class="text-lg font-medium text-gray-800 mb-4">Billing Address</h2>
			<div class="p-4 border rounded-lg bg-gray-50">
				<p class="text-gray-800 text-sm sm:text-base">
					<?php echo esc_html($order->get_billing_first_name() . ' ' . $order->get_billing_last_name()); ?>
				</p>
				<p class="text-gray-800 text-sm sm:text-base"><?php echo esc_html($order->get_billing_email()); ?></p>
			</div>
		</div>

		<!-- Reorder Products -->
		<div class="mt-8 pt-4">
			<ul class="flex flex-wrap gap-4">
				<?php foreach ($order->get_items() as $item_id => $item):
					$product = $item->get_product();
					if ($product && $product->is_purchasable() && $product->is_in_stock()):
						$product_url = get_permalink($product->get_id());
						?>
						<li>
							<a href="<?php echo esc_url($product_url); ?>"
								class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm sm:text-base hover:bg-blue-700 transition">
								Order Again
							</a>
						</li>
					<?php endif; endforeach; ?>
			</ul>
		</div>
	</div>
</section>