<?php
/**
 * Customer Processing Order Email – Styled Like Screenshot
 *
 * @package WooCommerce\Templates\Emails
 * @version 3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Email Header
do_action( 'woocommerce_email_header', $email_heading, $email );
?>

<p>
	<?php 
	$first_name = ucwords(strtolower($order->get_billing_first_name()));
	$last_name  = ucwords(strtolower($order->get_billing_last_name()));
	printf( esc_html__( 'Hi %s %s,', 'woocommerce' ), esc_html($first_name), esc_html($last_name) ); 
	?>
</p>

<p><?php printf( esc_html__( 'Just to let you know &mdash; we\'ve received your order #%s, and it is now being processed!', 'woocommerce' ), esc_html( $order->get_order_number() ) ); ?></p>

<p>
	<?php esc_html_e( 'Once your order is processed, you will receive an eSIM activation link. This link can be used both to activate your eSIM and to track your data usage throughout the validity period.', 'woocommerce' ); ?>
</p>

<p>
	<?php esc_html_e( 'Important: While you can install your eSIM immediately, we recommend activating it only 24 hours before your trip starts. Your plan\'s validity period begins from the moment of activation.', 'woocommerce' ); ?>
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

<p>
	<?php printf( __( 'Thanks for using <a href="%s">galacticroam.com</a>!', 'woocommerce' ), esc_url( home_url() ) ); ?>
</p>

<hr style="margin: 40px 0; border: none; border-top: 1px solid #ccc;" />

<h2><?php esc_html_e( 'Frequently Asked Questions', 'woocommerce' ); ?></h2>

<h4><?php esc_html_e( 'How do I install and activate my eSIM?', 'woocommerce' ); ?></h4>
<p>
<?php esc_html_e( 'Open the QR code email on another device. For iPhone: Go to Settings → Cellular → Add Cellular Plan and scan the QR code. For Android: Go to Settings → Connections → SIM Card Manager → Add Mobile Plan and scan the QR code. Follow on-screen instructions to complete setup.', 'woocommerce' ); ?>
</p>

<h4><?php esc_html_e( 'Can I check my remaining data balance?', 'woocommerce' ); ?></h4>
<p>
<?php esc_html_e( 'Yes! You can check your data usage through the same link provided for eSIM activation. Simply click on "Check usage" and the data bar will indicate your remaining data & validity period.', 'woocommerce' ); ?>
</p>

<h4><?php esc_html_e( 'When should I install and activate my eSIM?', 'woocommerce' ); ?></h4>
<p>
<?php esc_html_e( 'Installation and activation are two separate steps:', 'woocommerce' ); ?><br>
• <?php esc_html_e( 'Installation: You can install the eSIM immediately after receiving it.', 'woocommerce' ); ?><br>
• <?php esc_html_e( 'Activation: Do this 24 hours before your trip starts, while you’re still at home with a stable internet connection. Your validity period begins at activation, regardless of your location.', 'woocommerce' ); ?><br>
• <?php esc_html_e( 'Important: Do not wait to activate at the airport or after arriving at your destination, as you may face connectivity issues.', 'woocommerce' ); ?>
</p>

<?php
if ( $additional_content ) {
	echo wp_kses_post( wpautop( wptexturize( $additional_content ) ) );
}

// Footer
do_action( 'woocommerce_email_footer', $email );
