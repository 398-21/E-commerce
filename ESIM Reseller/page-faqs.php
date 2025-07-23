<?php
/**
 * Template Name: FAQs
 * Description: A custom template for the FAQs page.
 */
defined('ABSPATH') || exit;

get_header('shop');
?>

<section class="container mx-auto">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">Frequently Asked Questions</h1>

        <!-- FAQ Sections -->
        <div class="space-y-10">
            <?php
            $faq_categories = [
                "Getting Started with eSIMs" => [
                    "What is an eSIM?" => "An eSIM (embedded SIM) is a digital SIM that allows you to activate a mobile data plan without needing a physical SIM card. It works just like a traditional SIM but is built directly into your device.",
                    "Which devices are compatible with Galactic Roam eSIMs?" => "Galactic Roam eSIMs work with a wide range of smartphones, tablets, and wearables, including:<br>
                        <strong>Apple:</strong> iPhone XR and newer, iPads with eSIM support<br>
                        <strong>Samsung:</strong> Galaxy S20 series and newer<br>
                        <strong>Google:</strong> Pixel 3 and newer (except certain regional models)<br>
                        <strong>Other brands:</strong> Many newer models support eSIM (check with your manufacturer).",
                    "How do I check if my device supports eSIM?" => "You can check by:<br>
                        <strong>For iPhone:</strong> Go to Settings → Cellular → Add Cellular Plan.<br>
                        <strong>For Android:</strong> Go to Settings → Connections → SIM Card Manager → Add Mobile Plan.<br>
                        Dial *#06# – if an EID (Embedded Identity Document) number appears, your device supports eSIM."
                ],
                "Purchasing & Activation" => [
                    "How do I purchase a Galactic Roam eSIM?" => "Visit our website and select your preferred eSIM plan.<br>
                        Complete the purchase process and provide your email.<br>
                        Receive a confirmation email with an activation QR code.",
                    "How do I install and activate my Galactic Roam eSIM?" => "Open the QR code email on another device.<br>
                        <strong>For iPhone:</strong> Go to Settings → Cellular → Add Cellular Plan and scan the QR code.<br>
                        <strong>For Android:</strong> Go to Settings → Connections → SIM Card Manager → Add Mobile Plan and scan the QR code.<br>
                        Follow on-screen instructions and wait for activation.",
                    "When should I install and activate my eSIM?" => "There are two distinct steps in the eSIM setup process:<br><br>
                        <strong>Installation:</strong> You can install your eSIM to your device any time after purchase. This only adds the eSIM profile to your device but doesn't start using data or begin your plan period.<br><br>
                        <strong>Activation:</strong> This happens when you actually start using the eSIM data. Activation should be done closer to your trip, ideally within 24-48 hours before departure, to ensure your plan's validity period covers your entire trip. Once activated, your plan's countdown begins regardless of actual data usage.",
                    "How long does it take to receive my eSIM QR code?" => "Your QR code will be sent instantly via email after completing your purchase."
                ],
                "Using Your eSIM" => [
                    "Can I make phone calls and send SMS with Galactic Roam eSIM?" => "Galactic Roam eSIMs are data-only, which means:<br>
                        - You cannot make traditional phone calls or send SMS.<br>
                        - You can make calls via internet-based apps like WhatsApp, Skype, Zoom, Telegram, FaceTime, and Messenger.",
                    "Can I use WhatsApp with Galactic Roam eSIM?" => "Yes! WhatsApp works as usual since it only requires an internet connection.",
                    "Can my primary SIM receive calls while using a Galactic Roam eSIM?" => "Yes, if your phone supports Dual SIM Dual Standby (DSDS). This allows your physical SIM to receive calls while your eSIM is used for data.",
                    "Should I keep eSIM roaming on or off?" => "Keep roaming ON to ensure your eSIM connects to the correct local network while traveling.",
                    "Will I be able to use 5G with Galactic Roam eSIM?" => "Yes, if:<br>
                        - Your device supports 5G.<br>
                        - You are in a region where our eSIM provider offers 5G coverage.<br>
                        Otherwise, your eSIM will connect to the fastest available network (4G LTE or 3G)."
                ],
                "Managing Your eSIM" => [
                    "Can I check my remaining data balance?" => "Yes! You can check your data usage by:
                    <ol class='list-decimal pl-4'>
                    <li>Go to <a href='/my-account' class='text-blue-500 underline' target='_blank'>My Account</a></li>
                    <li>Click on <a href='/my-account/orders' class='text-blue-500 underline' target='_blank'>Orders</a></li>
                    <li>Click on 'View' under your order number</li>
                    <li>Click on the link provided to check your remaining data balance</li>
                    <li>Click on 'Check usage' and the data bar will indicate the remaining data & validity</li>
                    </ol>",
                    "Can I top up my eSIM balance?" => "No, we currently do not offer top-ups. You will need to purchase a new eSIM when your data runs out.",
                    "When does my eSIM expire?" => "Activated eSIMs expire based on the plan duration (e.g., 7-day, 30-day).",
                    "What should I do if I need to transfer my eSIM to another device?" => "1. Remove the eSIM from your current device.<br>
                        2. Reinstall it on your new device using the same QR code.<br>
                        3. If the QR code does not work, contact our support team for assistance.",
                    "How do I remove an eSIM from my device?" => "<strong>iPhone:</strong> Go to Settings → Cellular → Select eSIM → Remove Cellular Plan.<br>
                        <strong>Android:</strong> Go to Settings → Connections → SIM Card Manager → Select eSIM → Remove."
                ],
                "Troubleshooting & Support" => [
                    "What should I do if my eSIM won’t install or activate?" => "1. Ensure you have a stable internet connection.<br>
                        2. Make sure your phone is not locked to a specific carrier.<br>
                        3. Restart your device and try again.<br>
                        4. If the issue persists, contact our support team.",
                    "What should I do if I cannot scan the QR code?" => "If the QR code is still not working, contact our support team for a replacement.",
                    "How can I verify that my eSIM is working?" => "1. Check your device settings – your eSIM should be listed as active.<br>
                        2. Try browsing the web or using a data-reliant app.<br>
                        3. If you experience issues, restart your device and check your network settings.",
                    "How do I contact Galactic Roam’s customer support?" => "For assistance, reach out to us via:<br>
                        <strong>Email:</strong> support@galacticroam.com"
                ],
                "Refunds & Cancellations" => [
                    "Can I refund my remaining eSIM balance?" => "No, once an eSIM has been activated and used, the data is non-refundable.",
                    "Can I refund my unused eSIM?" => "Yes, if it has not been activated. Please review our refund policy or contact support for assistance.",
                    "When should I remove my eSIM?" => "You do not need to remove it. Simply disable it and switch back to your primary SIM. You can reuse it for future trips."
                ]
            ];
            ?>

            <?php foreach ($faq_categories as $category => $faqs): ?>
                <div class="mt-10">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6"><?php echo $category; ?></h2>
                    <div class="space-y-4">
                        <?php foreach ($faqs as $question => $answer): ?>
                            <div
                                class="border border-gray-200 rounded-lg shadow-md bg-white">
                                <button
                                    class="w-full text-left px-4 py-3 text-gray-800 font-medium flex justify-between items-center focus:outline-none"
                                    onclick="toggleFAQ(this)">
                                    <span><?php echo $question; ?></span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 transition-transform transform rotate-0" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div class="hidden p-4 mt-2 bg-white rounded-sm text-sm text-gray-800"><?php echo $answer; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
    function toggleFAQ(button) {
        const content = button.nextElementSibling;
        content.classList.toggle('hidden');
    }
</script>

<?php get_footer(); ?>