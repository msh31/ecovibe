<?php
require_once 'includes/header.php';
?>

    <div class="animate__animated animate__fadeIn">
        <!-- Hero Section -->
        <div class="bg-green-900 text-white py-16 mb-12">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 animate__animated animate__fadeInUp">Over EcoVibe</h1>
                <p class="text-xl text-green-200 animate__animated animate__fadeInUp animate__delay-1s">
                    Ontdek het verhaal achter ons duurzame merk
                </p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto px-4">
            <!-- Our Story -->
            <div class="max-w-4xl mx-auto mb-16">
                <h2 class="text-3xl font-bold mb-6 text-green-900">Ons Verhaal</h2>
                <div class="prose lg:prose-xl text-gray-700">
                    <p class="mb-4">
                        EcoVibe ontstond uit een passie voor duurzaamheid en een liefde voor design.
                        We merkten dat er een kloof bestond tussen eco-vriendelijke producten en stijlvol design.
                        Daarom besloten we in 2023 om deze twee werelden samen te brengen.
                    </p>
                    <p class="mb-4">
                        Onze missie is simpel: het aanbieden van duurzame producten die niet alleen goed zijn voor het milieu,
                        maar ook passen bij een moderne, stijlvolle levensstijl. We geloven dat kleine veranderingen in onze
                        dagelijkse gewoonten een groot verschil kunnen maken voor onze planeet.
                    </p>
                </div>
            </div>

            <!-- Our Values -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <div class="bg-white p-8 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">
                    <div class="text-green-600 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Duurzaamheid</h3>
                    <p class="text-gray-600">
                        Al onze producten worden geproduceerd met respect voor het milieu,
                        gebruik makend van duurzame materialen en productieprocessen.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">
                    <div class="text-green-600 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Kwaliteit</h3>
                    <p class="text-gray-600">
                        We streven naar de hoogste kwaliteit in al onze producten,
                        zodat ze niet alleen duurzaam zijn, maar ook lang meegaan.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">
                    <div class="text-green-600 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Innovatie</h3>
                    <p class="text-gray-600">
                        We zijn constant op zoek naar nieuwe manieren om duurzame producten
                        te ontwikkelen die passen bij een moderne levensstijl.
                    </p>
                </div>
            </div>

            <!-- Team Section -->
            <div class="max-w-4xl mx-auto mb-16">
                <h2 class="text-3xl font-bold mb-8 text-center text-green-900">Ons Team</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="text-center">
                        <div class="w-48 h-48 mx-auto mb-4 rounded-full overflow-hidden">
                            <img src="assets/images/team1.jpg" alt="Team member" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold mb-2">Sarah de Vries</h3>
                        <p class="text-gray-600">Oprichter & Creative Director</p>
                    </div>
                    <div class="text-center">
                        <div class="w-48 h-48 mx-auto mb-4 rounded-full overflow-hidden">
                            <img src="assets/images/team2.jpg" alt="Team member" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-bold mb-2">Mark Janssen</h3>
                        <p class="text-gray-600">Sustainability Manager</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
require_once 'includes/footer.php';
?>