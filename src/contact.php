<?php
require_once 'includes/header.php';
?>

    <div class="animate__animated animate__fadeIn">
        <!-- Hero Section -->
        <div class="bg-green-900 text-white py-12 mb-8">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl font-bold mb-4">Contact</h1>
                <p class="text-green-200">Neem contact met ons op</p>
            </div>
        </div>

        <div class="container mx-auto px-4 mb-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-6 text-green-900">Stuur ons een bericht</h2>
                    <form action="process_contact.php" method="POST" class="space-y-6">
                        <div>
                            <label for="name" class="block text-gray-700 mb-2">Naam</label>
                            <input type="text" id="name" name="name" required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label for="email" class="block text-gray-700 mb-2">E-mail</label>
                            <input type="email" id="email" name="email" required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label for="subject" class="block text-gray-700 mb-2">Onderwerp</label>
                            <select id="subject" name="subject" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="">Kies een onderwerp</option>
                                <option value="question">Vraag over product</option>
                                <option value="order">Bestelling</option>
                                <option value="other">Anders</option>
                            </select>
                        </div>
                        <div>
                            <label for="message" class="block text-gray-700 mb-2">Bericht</label>
                            <textarea id="message" name="message" rows="5" required
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
                        </div>
                        <button type="submit"
                                class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg transition-colors">
                            Verstuur bericht
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="space-y-8">
                    <div class="bg-white p-8 rounded-lg shadow-lg">
                        <h2 class="text-2xl font-bold mb-6 text-green-900">Contact Informatie</h2>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-4">
                                <svg class="w-6 h-6 text-green-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <div>
                                    <h3 class="font-bold text-gray-900">Adres</h3>
                                    <p class="text-gray-600">Duurzaamheidsstraat 123<br>1234 AB Amsterdam</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <svg class="w-6 h-6 text-green-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <div>
                                    <h3 class="font-bold text-gray-900">E-mail</h3>
                                    <p class="text-gray-600">info@ecovibe.nl</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-4">
                                <svg class="w-6 h-6 text-green-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                <div>
                                    <h3 class="font-bold text-gray-900">Telefoon</h3>
                                    <p class="text-gray-600">+31 (0)20 1234567</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Opening Hours -->
                    <div class="bg-white p-8 rounded-lg shadow-lg">
                        <h2 class="text-2xl font-bold mb-6 text-green-900">Openingstijden</h2>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Maandag - Vrijdag</span>
                                <span class="text-gray-900">09:00 - 18:00</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Zaterdag</span>
                                <span class="text-gray-900">10:00 - 17:00</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Zondag</span>
                                <span class="text-gray-900">Gesloten</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Form validation and animation
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const button = this.querySelector('button[type="submit"]');
            button.classList.add('animate__animated', 'animate__pulse');
            // Add your form submission logic here

            // Simulate form submission
            setTimeout(() => {
                button.classList.remove('animate__animated', 'animate__pulse');
                // You would typically handle the form submission here
                alert('Bericht verzonden! We nemen zo snel mogelijk contact met je op.');
                this.reset();
            }, 1000);
        });
    </script>

<?php
require_once 'includes/footer.php';
?>