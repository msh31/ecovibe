<?php
require_once 'includes/config.php';
require_once 'includes/header.php';

$products = [
    [
        'id' => 1,
        'name' => 'Bamboe Waterfles',
        'price' => 24.99,
        'description' => 'Duurzame waterfles gemaakt van bamboe met RVS binnenkant',
        'image' => '/demos/ecovibe/img/products/fles.jpg'
    ],
    [
        'id' => 2,
        'name' => 'Organic Katoenen T-shirt',
        'price' => 29.99,
        'description' => 'Fair trade biologisch katoenen t-shirt in naturel tinten',
        'image' => '/demos/ecovibe/img/products/shirt.jpg'
    ],
    [
        'id' => 3,
        'name' => 'Herbruikbare Boodschappentas',
        'price' => 12.99,
        'description' => 'Stijlvolle tas van gerecycled materiaal',
        'image' => '/demos/ecovibe/img/products/tas.jpg'
    ]
];

$featured_categories = [
    ['name' => 'Duurzaam Huishouden', 'icon' => 'home'],
    ['name' => 'Eco Fashion', 'icon' => 'shirt'],
    ['name' => 'Zero Waste', 'icon' => 'leaf'],
];
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="img/logo.ico">
        <title>My Website</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@4.0.0/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body class="bg-gray-100">
    <?php include 'header.php'; ?>

    <div class="bg-gradient-to-br from-emerald-50 to-white">
        <div class="max-w-7xl mx-auto px-4 py-24">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <h1 class="text-5xl font-bold text-emerald-600 mb-6">Duurzaam leven, stijlvol genieten</h1>
                    <p class="text-gray-600 text-lg mb-8">Ontdek onze collectie eco-vriendelijke producten die stijl
                        combineren met duurzaamheid.</p>
                    <div class="flex gap-4">
                        <a href="#products" class="bg-emerald-600 text-white px-6 py-3 rounded-lg hover:bg-emerald-700">Bekijk
                            collectie</a>
                        <a href="/about"
                           class="border border-emerald-600 text-emerald-600 px-6 py-3 rounded-lg hover:bg-emerald-50">Over
                            ons</a>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <img src="img/hero-image.jpg" alt="Duurzame producten" class="rounded-lg shadow-xl">
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Ontdek onze categorieën</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Van duurzaam huishouden tot eco-fashion, wij bieden alles wat
                    je nodig hebt voor een duurzame levensstijl.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <?php foreach ($featured_categories as $category): ?>
                    <div class="bg-emerald-50 p-8 rounded-lg text-center hover:bg-emerald-100 transition-colors">
                        <div class="text-emerald-600 mb-4">[Icon Placeholder]</div>
                        <h3 class="text-xl font-semibold mb-2"><?= htmlspecialchars($category['name']) ?></h3>
                        <a href="#" class="text-emerald-600 hover:text-emerald-700">Bekijk producten →</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div id="products" class="max-w-7xl mx-auto px-4 py-16">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Uitgelichte producten</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Onze meest populaire duurzame producten, zorgvuldig geselecteerd
                voor jou.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($products as $product): ?>
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                    <img src="<?= htmlspecialchars($product['image']) ?>"
                         alt="<?= htmlspecialchars($product['name']) ?>"
                         class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2"><?= htmlspecialchars($product['name']) ?></h3>
                        <p class="text-gray-600 mb-4"><?= htmlspecialchars($product['description']) ?></p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-emerald-600">€<?= number_format($product['price'], 2) ?></span>
                            <button onclick="addToCart(<?= htmlspecialchars(json_encode($product['id'])) ?>)"
                                    class="bg-emerald-600 text-white px-6 py-2 rounded-lg hover:bg-emerald-700 transition-colors">
                                In winkelwagen
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="bg-emerald-50 py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Schrijf je in voor onze nieuwsbrief</h2>
            <form class="max-w-md mx-auto flex gap-4">
                <input type="email" placeholder="Je emailadres"
                       class="flex-1 px-4 py-3 rounded-lg border-gray-300 focus:border-emerald-500 focus:ring-emerald-500">
                <button type="submit" class="bg-emerald-600 text-white px-8 py-3 rounded-lg hover:bg-emerald-700">
                    Inschrijven
                </button>
            </form>
        </div>
    </div>
    </body>
    </html>


<?php require_once 'footer.php'; ?>