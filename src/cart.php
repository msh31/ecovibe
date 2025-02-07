<?php
require_once 'includes/header.php';

// Initialize cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Example products (in real application, these would come from database)
$products = [
    1 => ['name' => 'Bamboe Waterfles', 'price' => 24.95, 'image' => 'assets/img/product1.png'],
    2 => ['name' => 'Organisch Katoenen T-shirt', 'price' => 29.95, 'image' => 'assets/img/product2.png'],
    3 => ['name' => 'Bamboe Tandenborstel Set', 'price' => 12.95, 'image' => 'assets/img/product3.png']
];

// Handle cart actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'update':
                $product_id = $_POST['product_id'];
                $quantity = max(0, intval($_POST['quantity']));
                if ($quantity === 0) {
                    unset($_SESSION['cart'][$product_id]);
                } else {
                    $_SESSION['cart'][$product_id] = $quantity;
                }
                break;
            case 'remove':
                $product_id = $_POST['product_id'];
                unset($_SESSION['cart'][$product_id]);
                break;
        }
        // Redirect to prevent form resubmission
        header('Location: cart.php');
        exit();
    }
}

// Calculate totals
$subtotal = 0;
$shipping = 4.95; // Example shipping cost
?>

    <div class="animate__animated animate__fadeIn">
        <div class="bg-green-900 text-white py-12 mb-8">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl font-bold mb-4">Winkelwagen</h1>
                <p class="text-green-200">Bekijk en wijzig je bestelling</p>
            </div>
        </div>

        <div class="container mx-auto px-4 mb-12">
            <?php if (empty($_SESSION['cart'])): ?>
                <div class="text-center py-12">
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                        <h2 class="text-2xl font-bold text-gray-700 mb-4">Je winkelwagen is leeg</h2>
                        <p class="text-gray-500 mb-8">Bekijk onze producten en voeg iets toe aan je winkelwagen.</p>
                        <a href="producten.php"
                           class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors">
                            Bekijk producten
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Cart Items -->
                    <div class="lg:w-2/3">
                        <div class="bg-white rounded-lg shadow-lg p-6">
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead>
                                    <tr class="border-b">
                                        <th class="text-left py-4">Product</th>
                                        <th class="text-center py-4">Aantal</th>
                                        <th class="text-right py-4">Prijs</th>
                                        <th class="text-right py-4">Totaal</th>
                                        <th class="py-4"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($_SESSION['cart'] as $product_id => $quantity):
                                        if (!isset($products[$product_id])) continue;
                                        $product = $products[$product_id];
                                        $total = $product['price'] * $quantity;
                                        $subtotal += $total;
                                        ?>
                                        <tr class="border-b">
                                            <td class="py-4">
                                                <div class="flex items-center">
                                                    <img src="<?php echo htmlspecialchars($product['image']); ?>"
                                                         alt="<?php echo htmlspecialchars($product['name']); ?>"
                                                         class="w-16 h-16 object-cover rounded">
                                                    <span class="ml-4"><?php echo htmlspecialchars($product['name']); ?></span>
                                                </div>
                                            </td>
                                            <td class="py-4">
                                                <form method="POST" class="flex justify-center items-center">
                                                    <input type="hidden" name="action" value="update">
                                                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                                    <input type="number" name="quantity" value="<?php echo $quantity; ?>"
                                                           min="1" max="99"
                                                           class="w-16 text-center border rounded-lg px-2 py-1">
                                                    <button type="submit" class="ml-2 text-green-600 hover:text-green-700">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                  d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="text-right py-4">€<?php echo number_format($product['price'], 2); ?></td>
                                            <td class="text-right py-4">€<?php echo number_format($total, 2); ?></td>
                                            <td class="py-4">
                                                <form method="POST" class="text-right">
                                                    <input type="hidden" name="action" value="remove">
                                                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                                    <button type="submit" class="text-red-600 hover:text-red-700">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="lg:w-1/3">
                        <div class="bg-white rounded-lg shadow-lg p-6">
                            <h2 class="text-2xl font-bold mb-6">Bestelling overzicht</h2>
                            <div class="space-y-4">
                                <div class="flex justify-between">
                                    <span>Subtotaal</span>
                                    <span>€<?php echo number_format($subtotal, 2); ?></span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Verzendkosten</span>
                                    <span>€<?php echo number_format($shipping, 2); ?></span>
                                </div>
                                <div class="border-t pt-4">
                                    <div class="flex justify-between font-bold">
                                        <span>Totaal</span>
                                        <span>€<?php echo number_format($subtotal + $shipping, 2); ?></span>
                                    </div>
                                </div>
                                <a href="checkout.php"
                                   class="block w-full bg-green-600 text-white text-center px-6 py-3 rounded-lg hover:bg-green-700 transition-colors mt-6">
                                    Afrekenen
                                </a>
                                <a href="producten.php"
                                   class="block w-full text-center text-green-600 hover:text-green-700 mt-4">
                                    Verder winkelen
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php require_once 'includes/footer.php'; ?>