<?php
session_start();
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoVibe - Duurzaam leven, stijlvol genieten!</title>
<!--    <link rel="stylesheet" href="../assets/css/style.css"/>-->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>


        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #4ade80;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gray-50">
<nav class="bg-green-900 text-white shadow-lg">
    <div class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
            <div class="text-2xl font-bold animate__animated animate__fadeIn">
                <a href="index.php" class="flex items-center space-x-2">
                    <span class="text-green-400">Eco</span>Vibe
                </a>
            </div>
            <div class="hidden md:flex space-x-8">
                <a href="index.php" class="nav-link hover:text-green-400 transition-colors">Home</a>
                <a href="over-ons.php" class="nav-link hover:text-green-400 transition-colors">Over Ons</a>
                <a href="producten.php" class="nav-link hover:text-green-400 transition-colors">Producten</a>
                <a href="contact.php" class="nav-link hover:text-green-400 transition-colors">Contact</a>
            </div>
            <button class="md:hidden focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
</nav>

<div class="mobile-menu hidden md:hidden bg-green-800 text-white animate__animated animate__fadeIn">
    <a href="index.php" class="block px-4 py-3 hover:bg-green-700 transition-colors">Home</a>
    <a href="over-ons.php" class="block px-4 py-3 hover:bg-green-700 transition-colors">Over Ons</a>
    <a href="producten.php" class="block px-4 py-3 hover:bg-green-700 transition-colors">Producten</a>
    <a href="contact.php" class="block px-4 py-3 hover:bg-green-700 transition-colors">Contact</a>
</div>

<main class="container mx-auto px-4 py-8 fade-in min-h-screen">