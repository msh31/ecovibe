<?php
require_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoVibe</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!--    <link rel="stylesheet" href="../css/style.css">-->
</head>
<body class="bg-white min-h-screen flex flex-col">
<nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center h-16"> <!-- Added items-center -->
            <a href="/" class="flex items-center text-2xl font-bold text-emerald-600">EcoVibe</a>
            <div class="flex items-center"> <!-- Ensures vertical centering -->
                <a href="../auth/login.php"
                   class="bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-emerald-700 flex items-center justify-center">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                              d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                              clip-rule="evenodd"/>
                    </svg>
                    Inloggen
                </a>
            </div>
        </div>
    </div>
</nav>
