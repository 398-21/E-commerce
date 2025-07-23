<a href="<?php the_permalink(); ?>"
    class="group flex items-center justify-between border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-shadow overflow-hidden bg-white p-4 space-x-4 min-h-[80px]">
    <div class="flex items-center space-x-4">
        <!-- Product Image - SVG Flag -->
        <?php
        global $product;
        $sku = $product->get_sku();
        $sku_prefix = strtolower(substr($sku, 0, 2)); // Get first 2 letters of SKU and convert to lowercase
        $flag_url = "https://flagcdn.com/{$sku_prefix}.svg";  // Changed to SVG format
        ?>
        <div class="flex-shrink-0 w-12 h-8 flex items-center justify-center bg-gray-50 border border-gray-100 rounded overflow-hidden">
    <img src="<?php echo esc_url($flag_url); ?>" 
        alt="<?php echo esc_attr(get_the_title()); ?> flag"
        class="w-full h-full object-cover aspect-[4/3] drop-shadow-sm"
        onerror="this.onerror=null; this.src='<?php echo esc_url(get_template_directory_uri() . '/images/default-flag.svg'); ?>'; this.alt='Default flag';"
    >
</div>

        <!-- Product Title -->
        <h2 class="text-sm font-medium text-gray-800 truncate">
            <?php the_title(); ?>
        </h2>
    </div>

    <!-- Dropdown Icon -->
    <div class="ml-auto self-center">
        <div class="p-2 rounded-full group-hover:bg-gray-200 transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-5 h-5 text-gray-600 group-hover:text-gray-800 transform -rotate-90">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 9.75l-7.5 7.5-7.5-7.5" />
            </svg>
        </div>
    </div>
</a>