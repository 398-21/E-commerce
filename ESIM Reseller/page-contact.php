<?php
/**
 * Template Name: Contact Us
 * Description: A custom template for the Contact Us page with AJAX form submission.
 */
defined('ABSPATH') || exit;

get_header();
?>

<section class="container mx-auto py-10">
    <div class="py-16 text-black">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-center mb-6">Contact Us</h1>
            <p class="text-lg text-center mb-10">
                Have questions or need assistance? Fill out the form below, and we will get back to you as soon as possible.
            </p>

            <!-- Contact Form -->
            <form id="contact-form" method="post" class="bg-gray-50 rounded-lg shadow-lg p-8 text-gray-800">
                <input type="hidden" name="action" value="submit_contact_form"> <!-- Action required for AJAX -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400" required>
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                    <textarea id="message" name="message" rows="5" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400" required></textarea>
                </div>
                <button type="submit" style="width: 100%; color: #515151; font-weight: bold; padding-top: 0.75rem; padding-bottom: 0.75rem; border-radius: 0.5rem; box-shadow: 0 4px 6px rgba(0,0,0,0.1); background-color: #e2dfed; outline: none;" onmousefocus="this.style.boxShadow='0 0 0 2px rgba(79, 70, 229, 0.5)'">
                    Send Message
                </button>
            </form>

            <!-- Confirmation Message -->
            <div id="confirmation-message" class="mt-6 text-center"></div>
        </div>
    </div>
</section>

<script>
    document.getElementById('contact-form').addEventListener('submit', async function (e) {
        e.preventDefault(); // Prevent default form submission

        const confirmationMessage = document.getElementById('confirmation-message');
        const formData = new FormData(this);

        try {
            const response = await fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
                method: 'POST',
                body: formData,
            });

            const result = await response.json();

            if (result.success) {
                confirmationMessage.innerHTML = `<p class="text-green-500 font-medium">${result.data.message}</p>`;
                this.reset(); // Reset the form
            } else {
                confirmationMessage.innerHTML = `<p class="text-red-500 font-medium">${result.data.message}</p>`;
            }
        } catch (error) {
            confirmationMessage.innerHTML = `<p class="text-red-500 font-medium">Something went wrong. Please try again later.</p>`;
        }
    });
</script>

<?php get_footer(); ?>