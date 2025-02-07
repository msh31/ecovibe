<?php
require_once 'includes/header.php';
?>

    <div class="animate__animated animate__fadeIn">
        <!-- Hero Section -->
        <div class="bg-green-900 text-white py-12 mb-8">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl font-bold mb-4">Onze Producten</h1>
                <p class="text-green-200">Ontdek onze duurzame collectie</p>
            </div>
        </div>

        <!-- Filter and Products -->
        <div class="container mx-auto px-4">
            <!-- Filter Section -->
            <div class="mb-8 flex flex-wrap gap-4">
                <select class="bg-white border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="">Alle Categorieën</option>
                    <option value="lifestyle">Lifestyle</option>
                    <option value="verzorging">Verzorging</option>
                    <option value="accessoires">Accessoires</option>
                </select>
                <select class="bg-white border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="newest">Nieuwste eerst</option>
                    <option value="price-low">Prijs laag-hoog</option>
                    <option value="price-high">Prijs hoog-laag</option>
                </select>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-12">
                <!-- Product Card 1 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="relative">
                        <img src="assets/img/product1.png" alt="Bamboe Waterfles" class="w-full h-64 object-cover">
                        <div class="absolute top-2 right-2 bg-green-500 text-white px-2 py-1 rounded-full text-sm">Nieuw</div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Bamboe Schoonmaak borstel + Houder</h3>
                        <p class="text-gray-600 mb-4">Duurzame houder gemaakt van 100% natuurlijk bamboe.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-green-600 font-bold">€24,95</span>
                            <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors">
                                In winkelwagen
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="relative">
                        <img src="assets/img/product2.png" alt="Organisch T-shirt" class="w-full h-64 object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Bamboo bestek-set</h3>
                        <p class="text-gray-600 mb-4">100% organisch katoen, eerlijk geproduceerd.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-green-600 font-bold">€29,95</span>
                            <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors">
                                In winkelwagen
                            </button>
                        </div>
                    </div>
                </div>

                <!-- More product cards here... -->
            </div>

            <!-- Pagination -->
            <div class="flex justify-center space-x-2 mb-12">
                <button class="px-4 py-2 border border-green-500 text-green-500 rounded-lg hover:bg-green-500 hover:text-white transition-colors">
                    Vorige
                </button>
                <button class="px-4 py-2 bg-green-500 text-white rounded-lg">1</button>
                <button class="px-4 py-2 border border-green-500 text-green-500 rounded-lg hover:bg-green-500 hover:text-white transition-colors">
                    2
                </button>
                <button class="px-4 py-2 border border-green-500 text-green-500 rounded-lg hover:bg-green-500 hover:text-white transition-colors">
                    Volgende
                </button>
            </div>
        </div>
    </div>

    <script>
        // Add to cart animation
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', function() {
                if (this.textContent.trim() === 'In winkelwagen') {
                    this.classList.add('animate__animated', 'animate__pulse');
                    setTimeout(() => {
                        this.classList.remove('animate__animated', 'animate__pulse');
                    }, 1000);
                }
            });
        });
    </script>

<?php
require_once 'includes/footer.php';
?>