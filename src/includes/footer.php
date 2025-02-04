<footer class="bg-gray-50 mt-auto">
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex flex-wrap justify-between items-center">
            <div class="text-gray-600 text-sm">© 2025 EcoVibe</div>
            <div class="flex space-x-8">
                <a href="/about" class="text-gray-600 hover:text-emerald-600 text-sm">Over ons</a>
                <a href="/products" class="text-gray-600 hover:text-emerald-600 text-sm">Producten</a>
                <a href="/contact" class="text-gray-600 hover:text-emerald-600 text-sm">Contact</a>
            </div>
        </div>
    </div>
</footer>

<script>
    function addToCart(productId) {
        // Implement cart functionality
        console.log(`Product ${productId} added to cart`);
    }
</script>
</body>
</html>

<?php
unset($_SESSION['error']);
unset($_SESSION['success']);
?>