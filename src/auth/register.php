<?php
require_once '../includes/header.php';

// Check if user is already logged in
if (isset($_SESSION['user_id'])) {
    header('Location: account.php');
    exit();
}

// Handle registration form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';

    $errors = [];

    // Validate input
    if (strlen($firstname) < 2) {
        $errors[] = 'Voornaam moet minimaal 2 karakters bevatten';
    }
    if (strlen($lastname) < 2) {
        $errors[] = 'Achternaam moet minimaal 2 karakters bevatten';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Ongeldig email adres';
    }
    if (strlen($password) < 8) {
        $errors[] = 'Wachtwoord moet minimaal 8 karakters bevatten';
    }
    if ($password !== $password_confirm) {
        $errors[] = 'Wachtwoorden komen niet overeen';
    }

    if (empty($errors)) {
        try {
            $db = Database::getInstance()->getConnection();

            // Check if email already exists
            $stmt = $db->prepare('SELECT id FROM users WHERE email = ?');
            $stmt->execute([$email]);
            if ($stmt->fetch()) {
                $errors[] = 'Dit email adres is al in gebruik';
            } else {
                // Create new user
                $stmt = $db->prepare('INSERT INTO users (firstname, lastname, email, password, created_at) VALUES (?, ?, ?, ?, NOW())');
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $stmt->execute([$firstname, $lastname, $email, $hashed_password]);

                // Log the user in
                $_SESSION['user_id'] = $db->lastInsertId();
                header('Location: account.php');
                exit();
            }
        } catch (Exception $e) {
            $errors[] = 'Er is een fout opgetreden. Probeer het later opnieuw.';
        }
    }
}
?>

    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Maak een account aan
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Of
                    <a href="login.php" class="font-medium text-green-600 hover:text-green-500">
                        log in met je bestaande account
                    </a>
                </p>
            </div>

            <?php if (!empty($errors)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <ul class="list-disc list-inside">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form class="mt-8 space-y-6" action="register.php" method="POST">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="firstname" class="sr-only">Voornaam</label>
                            <input id="firstname" name="firstname" type="text" required
                                   class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm"
                                   placeholder="Voornaam"
                                   value="<?php echo htmlspecialchars($firstname ?? ''); ?>">
                        </div>
                        <div>
                            <label for="lastname" class="sr-only">Achternaam</label>
                            <input id="lastname" name="lastname" type="text" required
                                   class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm"
                                   placeholder="Achternaam"
                                   value="<?php echo htmlspecialchars($lastname ?? ''); ?>">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="sr-only">Email adres</label>
                        <input id="email" name="email" type="email" required
                               class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm"
                               placeholder="Email adres"
                               value="<?php echo htmlspecialchars($email ?? ''); ?>">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="sr-only">Wachtwoord</label>
                        <input id="password" name="password" type="password" required
                               class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm"
                               placeholder="Wachtwoord">
                    </div>
                    <div>
                        <label for="password_confirm" class="sr-only">Bevestig wachtwoord</label>
                        <input id="password_confirm" name="password_confirm" type="password" required
                               class="appearance-none rounded-lg relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm"
                               placeholder="Bevestig wachtwoord">
                    </div>
                </div>

                <div>
                    <button type="submit"
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Account aanmaken
                    </button>
                </div>
            </form>
        </div>
    </div>

<?php require_once '../includes/footer.php'; ?>