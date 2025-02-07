<?php
require_once 'includes/header.php';
?>

    <div class="relative bg-green-900 text-white py-24 mb-12">
        <!-- Hero Section -->
        <div class="relative bg-green-900 text-white py-24 mb-12">
            <div class="container mx-auto px-4">
                <div class="max-w-3xl">
                    <h1 class="text-4xl md:text-6xl font-bold mb-6 animate__animated animate__fadeInUp">
                        Duurzaam leven, stijlvol genieten
                    </h1>
                    <p class="text-xl mb-8 text-green-200 animate__animated animate__fadeInUp animate__delay-1s">
                        Ontdek onze collectie eco-vriendelijke producten die stijl en duurzaamheid samenbrengen.
                    </p>
                    <a href="producten.php" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-8 rounded-lg transition-colors animate__animated animate__fadeInUp animate__delay-2s">
                        Ontdek onze producten
                    </a>
                </div>
            </div>

        </div>

        <!-- Featured Products -->
        <div class="container mx-auto px-4 py-12">
            <h2 class="text-3xl font-bold mb-8 text-center text-green-900">Uitgelichte Producten</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Featured Product 1 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                    <div class="aspect-w-1 aspect-h-1 bg-gray-200">
                        <img src="assets/img/product1.png" alt="Eco-vriendelijke waterflessen" class="object-cover w-full h-64">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Bamboe Waterfles</h3>
                        <p class="text-gray-600 mb-4">Duurzame waterfles gemaakt van 100% natuurlijk bamboe.</p>
                        <p class="text-green-600 font-bold">€24,95</p>
                    </div>
                </div>

                <!-- Featured Product 2 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                    <div class="aspect-w-1 aspect-h-1 bg-gray-200">
                        <img src="assets/img/product2.png" alt="Organische kleding" class="object-cover w-full h-64">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Organisch Katoenen T-shirt</h3>
                        <p class="text-gray-600 mb-4">100% organisch katoen, eerlijk geproduceerd.</p>
                        <p class="text-green-600 font-bold">€29,95</p>
                    </div>
                </div>

                <!-- Featured Product 3 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                    <div class="aspect-w-1 aspect-h-1 bg-gray-200">
                        <img src="assets/img/product3.png" alt="Eco-vriendelijke accessoires" class="object-cover w-full h-64">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Bamboe Tandenborstel Set</h3>
                        <p class="text-gray-600 mb-4">Set van 4 biologisch afbreekbare tandenborstels.</p>
                        <p class="text-green-600 font-bold">€12,95</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mission Statement -->
        <div class="bg-green-50 py-16">
            <div class="container mx-auto px-4">
                <div class="max-w-3xl mx-auto text-center">
                    <h2 class="text-3xl font-bold mb-6 text-green-900">Onze Missie</h2>
                    <p class="text-lg text-gray-700 mb-8">
                        Bij EcoVibe geloven we dat duurzaam leven niet betekent dat je moet inleveren op stijl en comfort.
                        Onze producten zijn zorgvuldig geselecteerd om zowel het milieu als jouw levensstijl te verrijken.
                    </p>
                    <a href="over-ons.php" class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-lg transition-colors">
                        Lees meer over ons
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Add JavaScript for animations -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add scroll animations
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate__fadeIn');
                        entry.target.style.opacity = 1;
                    }
                });
            });

            document.querySelectorAll('.fade-in').forEach((el) => {
                el.style.opacity = 0;
                observer.observe(el);
            });
        });
    </script>

<?php
require_once 'includes/footer.php';
?>