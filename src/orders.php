<?php
require_once 'includes/header.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Get orders with pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

try {
    $db = Database::getInstance()->getConnection();

    // Get total orders count
    $stmt = $db->prepare('SELECT COUNT(*) FROM orders WHERE user_id = ?');
    $stmt->execute([$_SESSION['user_id']]);
    $total_orders = $stmt->fetchColumn();
    $total_pages = ceil($total_orders / $limit);

    // Get orders for current page
    $stmt = $db->prepare('SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC LIMIT ? OFFSET ?');
    $stmt->execute([$_SESSION['user_id'], $limit, $offset]);
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $error = 'Er is een fout opgetreden bij het ophalen van je bestellingen.';
}
?>

    <div class="animate__animated animate__fadeIn">
        <!-- Hero Section -->
        <div class="bg-green-900 text-white py-12 mb-8">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl font-bold mb-4">Mijn Bestellingen</h1>
                <p class="text-green-200">Bekijk je bestelgeschiedenis</p>
            </div>
        </div>

        <div class="container mx-auto px-4 mb-12">
            <?php if (isset($error)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-8" role="alert">
                    <span class="block sm:inline"><?php echo htmlspecialchars($error); ?></span>
                </div>
            <?php endif; ?>

            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <?php if (empty($orders)): ?>
                    <div class="p-6 text-center">
                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                        <h2 class="text-2xl font-bold text-gray-700 mb-4">Geen bestellingen gevonden</h2>
                        <p class="text-gray-500 mb-8">Je hebt nog geen bestellingen geplaatst.</p>
                        <a href="producten.php"
                           class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors">
                            Begin met winkelen
                        </a>
                    </div>
                <?php else: ?>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                            <tr class="bg-gray-50 border-b">
                                <th class="text-left py-4 px-6">Bestelnummer</th>
                                <th class="text-left py-4 px-6">Datum</th>
                                <th class="text-left py-4 px-6">Status</th>
                                <th class="text-right py-4 px-6">Totaal</th>
                                <th class="text-right py-4 px-6">Actie</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($orders as $order): ?>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-4 px-6">#<?php echo $order['id']; ?></td>
                                    <td class="py-4 px-6">
                                        <?php echo date('d-m-Y', strtotime($order['created_at'])); ?>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="inline-block px-2 py-1 rounded-full text-sm
                                            <?php
                                        switch($order['status']) {
                                            case 'completed':
                                                echo 'bg-green-100 text-green-800';
                                                break;
                                            case 'processing':
                                                echo 'bg-yellow-100 text-yellow-800';
                                                break;
                                            case 'cancelled':
                                                echo 'bg-red-100 text-red-800';
                                                break;
                                            default:
                                                echo 'bg-gray-100 text-gray-800';
                                        }
                                        ?>">
                                            <?php
                                            switch($order['status']) {
                                                case 'completed':
                                                    echo 'Voltooid';
                                                    break;
                                                case 'processing':
                                                    echo 'In behandeling';
                                                    break;
                                                case 'cancelled':
                                                    echo 'Geannuleerd';
                                                    break;
                                                default:
                                                    echo ucfirst($order['status']);
                                            }
                                            ?>
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        €<?php echo number_format($order['total'], 2); ?>
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <a href="order.php?id=<?php echo $order['id']; ?>"
                                           class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                                            Details
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <?php if ($total_pages > 1): ?>
                        <div class="px-6 py-4 border-t">
                            <div class="flex justify-center space-x-2">
                                <?php if ($page > 1): ?>
                                    <a href="?page=<?php echo $page - 1; ?>"
                                       class="px-4 py-2 border border-green-500 text-green-500 rounded-lg hover:bg-green-500 hover:text-white transition-colors">
                                        Vorige
                                    </a>
                                <?php endif; ?>

                                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                    <a href="?page=<?php echo $i; ?>"
                                       class="px-4 py-2 <?php echo $i === $page ? 'bg-green-500 text-white' : 'border border-green-500 text-green-500 hover:bg-green-500 hover:text-white'; ?> rounded-lg transition-colors">
                                        <?php echo $i; ?>
                                    </a>
                                <?php endfor; ?>

                                <?php if ($page < $total_pages): ?>
                                    <a href="?page=<?php echo $page + 1; ?>"
                                       class="px-4 py-2 border border-green-500 text-green-500 rounded-lg hover:bg-green-500 hover:text-white transition-colors">
                                        Volgende
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php require_once 'includes/footer.php'; ?>