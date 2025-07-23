<?php
/**
 * Edit account form
 *
 * Styled with Tailwind CSS.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.6.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_edit_account_form' ); ?>

<div class="p-6">
	<div class="max-w-4xl mx-auto bg-transparent rounded-lg p-8">
		<h2 class="text-2xl font-semibold text-gray-800 mb-6"><?php esc_html_e( 'Edit Account Details', 'woocommerce' ); ?></h2>
		
		<form class="woocommerce-EditAccountForm edit-account space-y-6" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >
			<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

			<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
				<!-- First Name -->
				<div>
					<label for="account_first_name" class="block text-sm font-medium text-gray-700">
						<?php esc_html_e( 'First name', 'woocommerce' ); ?>&nbsp;<span class="text-red-500">*</span>
					</label>
					<input type="text" id="account_first_name" name="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" class="p-2 block w-full border border-gray-500 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
				</div>

				<!-- Last Name -->
				<div>
					<label for="account_last_name" class="block text-sm font-medium text-gray-700">
						<?php esc_html_e( 'Last name', 'woocommerce' ); ?>&nbsp;<span class="text-red-500">*</span>
					</label>
					<input type="text" id="account_last_name" name="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" class="p-2 block w-full border border-gray-500 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
				</div>
			</div>

			<!-- Display Name -->
			<div>
				<label for="account_display_name" class="block text-sm font-medium text-gray-700">
					<?php esc_html_e( 'Display name', 'woocommerce' ); ?>&nbsp;<span class="text-red-500">*</span>
				</label>
				<input type="text" id="account_display_name" name="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" class="p-2 block w-full border border-gray-500 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
				<p class="p-2 text-sm text-gray-500"><?php esc_html_e( 'This will be how your name will be displayed in the account section and in reviews.', 'woocommerce' ); ?></p>
			</div>

			<!-- Email Address -->
			<div>
				<label for="account_email" class="block text-sm font-medium text-gray-700">
					<?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="text-red-500">*</span>
				</label>
				<input type="email" id="account_email" name="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" class="p-2 block w-full border border-gray-500 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
			</div>

			<!-- Hook for Additional Fields -->
			<?php
			/**
			 * Hook where additional fields should be rendered.
			 *
			 * @since 8.7.0
			 */
			do_action( 'woocommerce_edit_account_form_fields' );
			?>

			<!-- Password Section -->
			<fieldset class="border-t border-gray-200 pt-6">
				<legend class="text-lg font-medium text-gray-900"><?php esc_html_e( 'Password change', 'woocommerce' ); ?></legend>
				<div class="space-y-4 mt-4">
					<div>
						<label for="password_current" class="block text-sm font-medium text-gray-700">
							<?php esc_html_e( 'Current password (leave blank to leave unchanged)', 'woocommerce' ); ?>
						</label>
						<input type="password" id="password_current" name="password_current" autocomplete="off" class="mt-1 block w-full border border-gray-500 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
					</div>

					<div>
						<label for="password_1" class="block text-sm font-medium text-gray-700">
							<?php esc_html_e( 'New password (leave blank to leave unchanged)', 'woocommerce' ); ?>
						</label>
						<input type="password" id="password_1" name="password_1" autocomplete="off" class="mt-1 block w-full border border-gray-500 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
					</div>

					<div>
						<label for="password_2" class="block text-sm font-medium text-gray-700">
							<?php esc_html_e( 'Confirm new password', 'woocommerce' ); ?>
						</label>
						<input type="password" id="password_2" name="password_2" autocomplete="off" class="mt-1 block w-full border border-gray-500 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
					</div>
				</div>
			</fieldset>

			<!-- Hook for Custom Fields -->
			<?php do_action( 'woocommerce_edit_account_form' ); ?>

			<!-- Submit Button -->
			<div>
				<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
				<button type="submit" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>" class="mt-4 w-full md:w-auto bg-blue-500 text-white font-medium py-2 px-4 rounded-md shadow-sm hover:bg-blue-600 transition <?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ); ?>">
					<?php esc_html_e( 'Save changes', 'woocommerce' ); ?>
				</button>
				<input type="hidden" name="action" value="save_account_details" />
			</div>

			<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
		</form>
	</div>
</div>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
