<?php
/**
 * Thank You Page Template Override
 */

defined('ABSPATH') || exit;

if ($order): ?>
    <section class="container mx-auto py-10 px-8">
        <div class="max-w-4xl mx-auto p-6 bg-white shadow rounded-lg">
            <!-- Thank You Message -->
            <h1 class="text-2xl sm:text-3xl font-semibold text-center text-gray-800">
                <?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you for your order!', 'woocommerce'), $order); ?>
            </h1>

            <!-- Order Status Message -->
            <p class="text-center text-gray-600 mt-2 text-sm sm:text-base">
                Your order has been received and is now being processed.
            </p>

            <!-- eSIM Validity Message -->
            <p class="text-center text-red-600 font-bold mt-4 text-sm sm:text-base">
                This eSIM will remain valid for 180 days until activation. Please activate it within this period to avoid
                expiration.
            </p>

            <!-- Custom Order Details Table -->
            <div class="mt-8 border-t border-gray-200 pt-4">
                <h2 class="text-lg font-medium text-gray-800 mb-4">Order Details</h2>

                <!-- Make table scrollable on small screens -->
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
                                // Get product data
                                $product = $item->get_product();
                                $product_name = $item->get_name();

                                // Initialize variables
                                $data = 'N/A';
                                $validity = 'N/A';

                                $product_name_parts = explode(' - ', $product_name);
                                $clean_product_name = trim($product_name_parts[0]); // Get the first part

                                // Process meta data
                                $meta_data = $item->get_meta_data();
                                $attributes_string = '';

                                // Combine meta data into a single string
                                foreach ($meta_data as $meta) {
                                    $attributes_string .= $meta->value . ' ';
                                }

                                // Match data (e.g., "1GB") and validity (e.g., "7Day")
                                if (preg_match('/(\d+(?:\.\d+)?GB)/i', $attributes_string, $data_matches)) {
                                    $data = $data_matches[1]; // Extract "1GB"
                                }
                                if (preg_match('/(\d+Day)/i', $attributes_string, $validity_matches)) {
                                    $validity = str_replace('Day', '-Day', $validity_matches[1]); // Format "7Day" to "7-Days"
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

            <!-- Call to Action -->
            <div class="mt-8 text-center">
                <a href="<?php echo esc_url(home_url('/')); ?>"
                    class="px-6 py-3 bg-questblue text-white rounded-lg text-sm sm:text-base hover:bg-blue-700 transition">
                    Continue Shopping
                </a>
            </div>
        </div>
    </section>
<?php endif; ?>