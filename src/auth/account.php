<?php
require_once 'includes/header.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Get user information
try {
    $db = Database::getInstance()->getConnection();
    $stmt = $db->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Get recent orders
    $stmt = $db->prepare('SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC LIMIT 5');
    $stmt->execute([$_SESSION['user_id']]);
    $recent_orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $error = 'Er is een fout opgetreden bij het ophalen van je gegevens.';
}
?>

<div class="animate__animated animate__fadeIn">
    <!-- Hero Section -->
    <div class="bg-green-900 text-white py-12 mb-8">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">Mijn Account</h1>
            <p class="text-green-200">Welkom terug, <?php echo htmlspecialchars($user['firstname']); ?>!</p>
        </div>
    </div>

    <div class="container mx-auto px-4 mb-12">
        <?php if (isset($error)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-8" role="alert">
                <span class="block sm:inline"><?php echo htmlspecialchars($error); ?></span>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Sidebar Navigation -->
            <div class="md:col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <nav class="space-y-2">
                        <a href="#overview" class="block px-4 py-2 rounded-lg text-green-600 bg-green-50 font-medium">
                            Dashboard
                        </a>
                        <a href="#orders" class="block px-4 py-2 rounded-lg hover:bg-gray-50 transition-colors">
                            Bestellingen
                        </a>
                        <a href="#profile" class="block px-4 py-2 rounded-lg hover:bg-gray-50 transition-colors">
                            Profiel
                        </a>
                        <a href="#addresses" class="block px-4 py-2 rounded-lg hover:bg-gray-50 transition-colors">
                            Adressen
                        </a>
                        <form action="logout.php" method="POST" class="mt-4 pt-4 border-t">
                            <button type="submit" class="w-full px-4 py-2 rounded-lg text-red-600 hover:bg-red-50 transition-colors text-left">
                                Uitloggen
                            </button>
                        </form>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div class="md:col-span-3 space-y-8">
                <!-- Overview Section -->
                <div id="overview" class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-bold mb-6">Dashboard</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-green-50 rounded-lg p-6">
                            <h3 class="font-bold mb-2">Bestellingen</h3>
                            <p class="text-3xl font-bold text-green-600">
                                <?php echo count($recent_orders); ?>
                            </p>
                            <p class="text-sm text-gray-600">Laatste 30 dagen</p>
                        </div>
                        <div class="bg-green-50 rounded-lg p-6">
                            <h3 class="font-bold mb-2">Punten</h3>
                            <p class="text-3xl font-bold text-green-600">150</p>
                            <p class="text-sm text-gray-600">Beschikbare punten</p>
                        </div>
                        <div class="bg-green-50 rounded-lg p-6">
                            <h3 class="font-bold mb-2">Korting</h3>
                            <p class="text-3xl font-bold text-green-600">€10</p>
                            <p class="text-sm text-gray-600">Beschikbaar</p>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders -->
                <div id="orders" class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-2xl font-bold mb-6">Recente Bestellingen</h2>
                    <?php if (empty($recent_orders)): ?>
                        <p class="text-gray-600">Je hebt nog geen bestellingen geplaatst.</p>
                    <?php else: ?>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                            <tr class="border-b">
                                <th class="text-left py-4">Bestelnummer</th>
                                <th class="text-left py-4">Datum</th>
                                <th class="text-right py-4">Totaal</th>
                                <th class="text-right py-4">Status</th>
                                <th class="text-right py-4"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($recent_orders as $order): ?>
                            <tr class="border-b">
                                <td class="py-4">#<?php echo $order['id']; ?></td>
                                <td class="py-4"><?php echo date('d-m-Y', strtotime($order['created_at'])); ?></td>
                                <td class="py-4 text-right">€<?php echo number_format($order['total'], 2); ?></td>
                                <td class="py-4 text-right">
                                                <span class="inline-block px-2 py-1 rounded-full text-sm
                                                    <?php echo $order['status'] === 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'; ?>">
                                                    <?php echo ucfirst($order['status']); ?>
                                                </span>
                                </td>
                                <td class="py-4 text-right">
                                    <a href="order.php?id=<?php echo $order['id']; ?>"
                                       class="text-green-600 hover:text-green-700">
                                        Details