<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.2.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

do_action('woocommerce_before_customer_login_form'); ?>

<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')): ?>

	<div class="flex flex-wrap items-center justify-center h-5/6 bg-white" id="customer_login">

		<!-- Login Form -->
		<div id="loginForm" class="w-full sm:w-1/2 lg:w-1/3 bg-gray-50 shadow-lg rounded-lg p-8 m-4 mt-20 mb-20">
			<h2 class="text-2xl font-semibold text-gray-800 text-center mb-6"><?php esc_html_e('Login', 'woocommerce'); ?>
			</h2>
			<p class="text-center mt-4 text-red-500 font-medium">
				Please Login to start shopping and enjoy our affordable eSIM plans for your travels!
			</p>
			

			<form class="woocommerce-form woocommerce-form-login login space-y-4" method="post">

				<?php do_action('woocommerce_login_form_start'); ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="username"
						class="block text-sm font-medium text-gray-700 mb-1"><?php esc_html_e('Username or email address', 'woocommerce'); ?>&nbsp;<span
							class="required text-red-500">*</span></label>
					<input type="text"
						class="woocommerce-Input woocommerce-Input--text input-text w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400"
						name="username" id="username" autocomplete="username" required />
				</p>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="password"
						class="block text-sm font-medium text-gray-700 mb-1"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span
							class="required text-red-500">*</span></label>
					<input
						class="woocommerce-Input woocommerce-Input--text input-text w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400"
						type="password" name="password" id="password" autocomplete="current-password" required />
				</p>

				<?php do_action('woocommerce_login_form'); ?>

				<p class="form-row flex items-center justify-between">
					<label
						class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme flex items-center text-gray-600">
						<input
							class="woocommerce-form__input woocommerce-form__input-checkbox h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
							name="rememberme" type="checkbox" id="rememberme" value="forever" />
						<span class="ml-2"><?php esc_html_e('Remember me', 'woocommerce'); ?></span>
					</label>
					<a class="woocommerce-LostPassword lost_password text-sm text-indigo-600 hover:underline"
						href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Forgot your password?', 'woocommerce'); ?></a>
				</p>

				<p class="form-row">
					<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
					<button type="submit"
						class="woocommerce-button button woocommerce-form-login__submit w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
						name="login"
						value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Login', 'woocommerce'); ?></button>
				</p>

				<?php do_action('woocommerce_login_form_end'); ?>

			</form>
			<p class="text-center mt-4">
				<button onclick="toggleForms()"
					class="text-indigo-600 hover:underline"><?php esc_html_e('Don’t have an account? Register', 'woocommerce'); ?></button>
			</p>
		</div>

		<!-- Registration Form -->
		<div id="registerForm" class="hidden w-full sm:w-1/2 lg:w-1/3 bg-gray-50 shadow-lg rounded-lg p-8 m-4 mt-20 mb-20 shadow-lg rounded-lg p-8 m-4">
			<h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">
				<?php esc_html_e('Register', 'woocommerce'); ?></h2>

			<form method="post" class="woocommerce-form woocommerce-form-register register space-y-4">

				<?php do_action('woocommerce_register_form_start'); ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_email"
						class="block text-sm font-medium text-gray-700 mb-1"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span
							class="required text-red-500">*</span></label>
					<input type="email"
						class="woocommerce-Input woocommerce-Input--text input-text w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400"
						name="email" id="reg_email" autocomplete="email" required />
				</p>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_password"
						class="block text-sm font-medium text-gray-700 mb-1"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span
							class="required text-red-500">*</span></label>
					<input type="password"
						class="woocommerce-Input woocommerce-Input--text input-text w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400"
						name="password" id="reg_password" autocomplete="new-password" required />
				</p>

				<?php do_action('woocommerce_register_form'); ?>

				<p class="woocommerce-form-row form-row">
					<?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
					<button type="submit"
						class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
						name="register"
						value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>
				</p>

				<?php do_action('woocommerce_register_form_end'); ?>

			</form>
			<p class="text-center mt-4">
				<button onclick="toggleForms()"
					class="text-indigo-600 hover:underline"><?php esc_html_e('Already have an account? Login', 'woocommerce'); ?></button>
			</p>
		</div>

	</div>

	<script>
		function toggleForms() {
			const loginForm = document.getElementById('loginForm');
			const registerForm = document.getElementById('registerForm');

			loginForm.classList.toggle('hidden');
			registerForm.classList.toggle('hidden');
		}
	</script>


<?php endif; ?>

<?php do_action('woocommerce_after_customer_login_form'); ?>