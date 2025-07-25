<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.5.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_account_orders', $has_orders); ?>

<div class="min-h-[500px] rounded-lg p-5">
	<?php if ($has_orders): ?>

		<table
			class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
			<thead>
				<tr>
					<?php foreach (wc_get_account_orders_columns() as $column_id => $column_name): ?>
						<th scope="col"
							class="woocommerce-orders-table__header woocommerce-orders-table__header-<?php echo esc_attr($column_id); ?>">
							<span class="nobr"><?php echo esc_html($column_name); ?></span>
						</th>
					<?php endforeach; ?>
					<!-- Add Refund Column -->
					<th scope="col" class="woocommerce-orders-table__header woocommerce-orders-table__header-refund"><span
							class="nobr"><?php esc_html_e('Refund', 'woocommerce'); ?></span></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($customer_orders->orders as $customer_order):
					$order = wc_get_order($customer_order);
					?>
					<tr
						class="woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr($order->get_status()); ?> order">
						<?php foreach (wc_get_account_orders_columns() as $column_id => $column_name): ?>
							<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-<?php echo esc_attr($column_id); ?>"
								data-title="<?php echo esc_attr($column_name); ?>">
								<?php if (has_action('woocommerce_my_account_my_orders_column_' . $column_id)): ?>
									<?php do_action('woocommerce_my_account_my_orders_column_' . $column_id, $order); ?>

								<?php elseif ('order-number' === $column_id): ?>
									<a href="<?php echo esc_url($order->get_view_order_url()); ?>">
										<?php echo esc_html($order->get_order_number()); ?>
									</a>

								<?php elseif ('order-date' === $column_id): ?>
									<time datetime="<?php echo esc_attr($order->get_date_created()->date('c')); ?>">
										<?php echo esc_html(wc_format_datetime($order->get_date_created())); ?>
									</time>

								<?php elseif ('order-status' === $column_id): ?>
									<?php
									$status = $order->get_status();
									echo esc_html($status === 'cancelled' ? 'Non-Refundable' : wc_get_order_status_name($status));
									?>

								<?php elseif ('order-total' === $column_id): ?>
									<?php echo wp_kses_post($order->get_formatted_order_total()); ?>

								<?php elseif ('order-actions' === $column_id): ?>
									<?php
									$actions = wc_get_account_orders_actions($order);
									if (!empty($actions)):
										foreach ($actions as $key => $action):
											echo '<a href="' . esc_url($action['url']) . '" class="woocommerce-button button ' . sanitize_html_class($key) . '">' . esc_html($action['name']) . '</a>';
										endforeach;
									endif;
									?>
								<?php endif; ?>
							</td>
						<?php endforeach; ?>

						<!-- Refund Column -->
						<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-refund"
							data-title="<?php esc_attr_e('Refund', 'woocommerce'); ?>">
							<?php if ($order->get_status() === 'completed'): ?>
								<button class="woocommerce-button button refund-button"
									data-order-id="<?php echo esc_attr($order->get_id()); ?>">
									<?php esc_html_e('Request Refund', 'woocommerce'); ?>
								</button>
							<?php elseif ($order->get_status() === 'processing'): ?>
								<span class="text-gray-500"><?php esc_html_e('Refund in Progress', 'woocommerce'); ?></span>
							<?php elseif ($order->get_status() === 'refunded'): ?>
								<span class="text-green-500"><?php esc_html_e('Refund Completed', 'woocommerce'); ?></span>
							<?php elseif ($order->get_status() === 'cancelled'): ?>
								<span class="text-red-500"><?php esc_html_e('Invalid Refund', 'woocommerce'); ?></span>
							<?php else: ?>
								<span class="text-gray-400"><?php esc_html_e('Not Available', 'woocommerce'); ?></span>
							<?php endif; ?>
						</td>

					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

	<?php else: ?>

		<?php wc_print_notice(esc_html__('No order has been made yet.', 'woocommerce')); ?>

	<?php endif; ?>
</div>

<?php do_action('woocommerce_after_account_orders', $has_orders); ?>