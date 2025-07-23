<?php
/**
 * Customer Refunded Order Email – Styled Like Customer Processing Email
 *
 * @package WooCommerce\Templates\Emails
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

/*
 * Email Header
 */
do_action( 'woocommerce_email_header', $email_heading, $email );
?>

<p>
	<?php 
	$first_name = ucwords(strtolower($order->get_billing_first_name()));
	$last_name  = ucwords(strtolower($order->get_billing_last_name()));
	printf( esc_html__( 'Hi %s %s,', 'woocommerce' ), esc_html($first_name), esc_html($last_name) ); 
	?>
</p>

<p>
<?php
if ( $partial_refund ) {
	printf(
		esc_html__( 'Your order on %s has been partially refunded. You\'ll find the refund and order details below:', 'woocommerce' ),
		wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES )
	);
} else {
	printf(
		esc_html__( 'Your order on %s has been fully refunded. You\'ll find the refund and order details below:', 'woocommerce' ),
		wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES )
	);
}
?>
</p>

<h2><?php esc_html_e( 'Order Details', 'woocommerce' ); ?></h2>

<table class="td" cellspacing="0" cellpadding="6" border="1" style="width: 100%; border-collapse: collapse;">
	<thead>
		<tr>
			<th><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
			<th><?php esc_html_e( 'Data', 'woocommerce' ); ?></th>
			<th><?php esc_html_e( 'Validity', 'woocommerce' ); ?></th>
			<th><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></th>
			<th><?php esc_html_e( 'Price', 'woocommerce' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ( $order->get_items() as $item_id => $item ) : ?>
			<?php
			$product_name = $item->get_name();
			$data = 'N/A';
			$validity = 'N/A';

			$meta_data = $item->get_meta_data();
			$attributes_string = '';

			foreach ( $meta_data as $meta ) {
				$attributes_string .= $meta->value . ' ';
			}

			if ( preg_match( '/(\d+(?:\.\d+)?GB)/i', $attributes_string, $data_matches ) ) {
				$data = $data_matches[1];
			}
			if ( preg_match( '/(\d+Day)/i', $attributes_string, $validity_matches ) ) {
				$validity = str_replace( 'Day', '-Day', $validity_matches[1] );
			}
			?>
			<tr>
				<td><?php echo esc_html( $product_name ); ?></td>
				<td><?php echo esc_html( $data ); ?></td>
				<td><?php echo esc_html( $validity ); ?></td>
				<td><?php echo esc_html( $item->get_quantity() ); ?></td>
				<td><?php echo wp_kses_post( $order->get_formatted_line_subtotal( $item ) ); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<div style="padding-top: 20px;">
	<?php do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email ); ?>
</div>

<?php if ( $additional_content ) : ?>
	<div style="margin-top: 30px;">
		<?php echo wp_kses_post( wpautop( wptexturize( $additional_content ) ) ); ?>
	</div>
<?php endif; ?>

<?php
/*
 * Email Footer
 */
do_action( 'woocommerce_email_footer', $email );
