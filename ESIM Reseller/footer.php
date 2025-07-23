<footer id="colophon" class="bg-white border-t border-gray-200 py-10 relative overflow-hidden">
	<!-- Space Theme Images with Fixed Positioning -->
	<div class="fixed-image-container" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; pointer-events: none;">
		<!-- Astronaut - visible on desktop and mobile -->
		<img src="<?php echo esc_url(get_template_directory_uri() . '/images/astronaut.png'); ?>" alt="Astronaut" 
			style="position: absolute; top: 20px; right: 50px; width: 120px; height: auto; opacity: 0.75; z-index: 0;"
			class="astronaut-image">
		<!-- UFO - visible only on desktop -->
		<img src="<?php echo esc_url(get_template_directory_uri() . '/images/ufo.png'); ?>" alt="UFO" 
			style="position: absolute; bottom: 80px; left: 40px; width: 80px; height: auto; opacity: 0.75; z-index: 0;"
			class="ufo-image">
	</div>

	<style>
		/* Desktop (default) - show both images */
		
		/* Tablet - hide both images */
		@media (min-width: 768px) and (max-width: 1024px) {
			.astronaut-image, .ufo-image {
				display: none !important;
			}
		}
		
		/* Mobile - show only astronaut */
		@media (max-width: 767px) {
			.ufo-image {
				display: none !important;
			}
		}
	</style>
	
	<div class="container mx-auto px-2 relative z-10">
		<div class="grid grid-cols-1 md:grid-cols-5 gap-14">
			<!-- About Section -->
			<div class="col-span-1 md:col-span-2">
				<a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center space-x-2 mb-4 ml-[-9px]">
					<!-- Shifted left -->
					<img src="<?php echo esc_url(get_template_directory_uri() . '/images/logo.png'); ?>"
						alt="<?php bloginfo('name'); ?>" class="h-[100px] w-auto">
					<!-- Fixed height, maintains aspect ratio -->
				</a>
				<p class="text-gray-600 text-sm">
					<?php bloginfo('name'); ?> makes staying connected affordable, effortless, and reliable for customers worldwide.
					</p>
			</div>


			<!-- Popular Destinations Section -->
			<div>
				<h3 class="text-gray-800 font-semibold text-lg mb-4">Popular Destinations</h3>
				<ul class="text-gray-600 text-sm space-y-2">
					<li><a href="<?php echo esc_url(home_url('/product/thailand')); ?>"
							class="hover:underline">Thailand</a></li>
					<li><a href="<?php echo esc_url(home_url('/product/vietnam')); ?>" class="hover:underline">Vietnam</a>
					</li>
					<li><a href="<?php echo esc_url(home_url('/product/malaysia')); ?>"
							class="hover:underline">Malaysia</a></li>
					<li><a href="<?php echo esc_url(home_url('/product/australia')); ?>"
							class="hover:underline">Australia</a></li>
					<li><a href="<?php echo esc_url(home_url('/product/china')); ?>"
							class="hover:underline">China</a></li>
					<li><a href="<?php echo esc_url(home_url('/product/indonesia')); ?>"
							class="hover:underline">Indonesia</a></li>
					<li><a href="<?php echo esc_url(home_url('/product/south-korea')); ?>"
							class="hover:underline">South Korea</a></li>
					<li><a href="<?php echo esc_url(home_url('/product/japan')); ?>"
							class="hover:underline">Japan</a></li>
				</ul>
			</div>

			<!-- Partnership Opportunities Section -->
			<div>
				<h3 class="text-gray-800 font-semibold text-lg mb-4">Work With Us</h3>
				<ul class="text-gray-600 text-sm space-y-2">
					<li><a href="<?php echo esc_url(home_url('/about-us')); ?>" class="hover:underline">About Us</a>
					</li>
				</ul>
			</div>

			<!-- Customer Resources Section -->
			<div>
				<h3 class="text-gray-800 font-semibold text-lg mb-4">Customer Support</h3>
				<ul class="text-gray-600 text-sm space-y-2">
					<li><a href="<?php echo esc_url(home_url('/faqs')); ?>" class="hover:underline">FAQs</a></li>
					<li><a href="<?php echo esc_url(home_url('/contact')); ?>" class="hover:underline">Contact Us</a>
					</li>
				</ul>
			</div>
		</div>

		<!-- Bottom Footer Section -->
		<div class="border-t border-gray-200 mt-10 pt-6 text-center md:text-left">
			<div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
				<p class="text-gray-500 text-sm">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights
					Reserved.
					<a href="<?php echo esc_url(home_url('/privacy-policy')); ?>" class="hover:underline">Privacy
						Policy</a>.
					<a href="<?php echo esc_url(home_url('/terms-of-use')); ?>" class="hover:underline">Terms Of Use</a>.
				</p>
				<div class="flex items-center space-x-4">
					<!-- <a href="https://facebook.com" class="text-gray-500 hover:text-gray-800"><i
							class="fab fa-facebook"></i></a>
					<a href="https://www.instagram.com/galacticroam/" class="text-gray-500 hover:text-gray-800"><i
							class="fab fa-instagram"></i></a>
					<a href="https://twitter.com" class="text-gray-500 hover:text-gray-800"><i
							class="fab fa-twitter"></i></a>
					<a href="https://linkedin.com" class="text-gray-500 hover:text-gray-800"><i
							class="fab fa-linkedin"></i></a> -->
				</div>
			</div>
		</div>
	</div>

	<!-- Payment Icons Section -->
	<div class="mt-6 flex items-center justify-center space-x-6">
		<img src="<?php echo esc_url(get_template_directory_uri() . '/images/visa.svg'); ?>" alt="Visa" class="size-10">
		<img src="<?php echo esc_url(get_template_directory_uri() . '/images/mastercard.svg'); ?>" alt="Mastercard"
			class="size-10">
		<img src="<?php echo esc_url(get_template_directory_uri() . '/images/amex.svg'); ?>" alt="American Express"
			class="size-10">
	</div>
</footer>

<?php wp_footer(); ?>
</body>

</html>