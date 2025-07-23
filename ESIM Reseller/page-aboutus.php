<?php
/**
 * Template Name: About Us
 * Description: A custom template for the About Us page.
 */
get_header();
?>
<section class="container mx-auto mt-10 bg-questblue mb-10 rounded-lg shadow-lg overflow-hidden">
    <!-- Hero Section -->
    <div class="text-center py-20 bg-questblue text-white">
        <h1 class="text-5xl font-extrabold">About Us</h1>
        <p class="text-lg max-w-2xl mx-auto mt-4">
            Discover how Galactic Roam is redefining connectivity for travelers worldwide.
        </p>
    </div>

    <!-- Company Overview Section -->
    <div class="text-gray-800 bg-white py-16">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-8">Stay Connected, Effortlessly</h2>
            <p class="text-lg text-center mb-12 leading-relaxed">
                At Galactic Roam, we believe staying connected should be seamless and stress-free. Whether you're exploring the world or traveling for work, our mission is to provide reliable and affordable connectivity solutions right at your fingertips.
            </p>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="bg-questblue py-16">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-white mb-8">Why Choose Us?</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="text-center p-6 bg-questblue text-white rounded-lg shadow-md transform hover:scale-105 transition-transform duration-300">
                    <h3 class="text-xl font-semibold mb-2">Global Coverage</h3>
                    <p>Access high-speed data wherever you are with exceptional global coverage.</p>
                </div>
                <!-- Feature 2 -->
                <div class="text-center p-6 bg-questblue text-white rounded-lg shadow-md transform hover:scale-105 transition-transform duration-300">
                    <h3 class="text-xl font-semibold mb-2">Cost-Effective</h3>
                    <p>Say goodbye to roaming fees with our affordable plans designed for every traveler.</p>
                </div>
                <!-- Feature 3 -->
                <div class="text-center p-6 bg-questblue text-white rounded-lg shadow-md transform hover:scale-105 transition-transform duration-300">
                    <h3 class="text-xl font-semibold mb-2">Instant Activation</h3>
                    <p>No waiting, no physical SIM cards – connect instantly with our easy setup process.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Story Section -->
    <div class="bg-white py-16">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-800 text-center mb-8">Our Story</h2>
            <p class="text-lg text-gray-600 text-center mb-12 leading-relaxed">
                Founded in Singapore, Galactic Roam is a pioneer in the eSIM revolution. With a vision to redefine connectivity for the modern traveler, we blend innovation with simplicity, empowering you to roam freely without compromises.
            </p>
        </div>
    </div>

    <!-- Call-to-Action Section -->
    <div class="py-16 bg-questblue">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Ready to Get Started?</h2>
            <p class="text-lg mb-6 text-white">
                Join us on our journey to revolutionize connectivity. Stay connected, wherever you travel.
            </p>
            <a href="/" class="px-14 py-4 bg-white text-questblue font-bold rounded-md shadow-md hover:opacity-90 hover:shadow-lg transform hover:scale-105 transition-transform duration-300">
                Explore Our Plans
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>