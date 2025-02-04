class Cart {
    constructor() {
        this.items = JSON.parse(localStorage.getItem('cart')) || [];
        this.badge = document.getElementById('cartBadge');
        this.updateBadge();
    }

    addItem(product) {
        const existingItem = this.items.find(item => item.id === product.id);
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            this.items.push({ ...product, quantity: 1 });
        }
        this.saveCart();
        this.updateBadge();
        this.showNotification('Product toegevoegd aan winkelwagen');
    }

    showNotification(message) {
        const notification = document.createElement('div');
        notification.className = 'fixed bottom-4 right-4 bg-emerald-600 text-white px-6 py-3 rounded-lg shadow-lg transform transition-transform duration-300 translate-y-0';
        notification.textContent = message;
        document.body.appendChild(notification);

        setTimeout(() => {
            notification.classList.add('translate-y-full');
            setTimeout(() => notification.remove(), 300);
        }, 2000);
    }

    updateBadge() {
        const totalItems = this.items.reduce((sum, item) => sum + item.quantity, 0);
        this.badge.textContent = totalItems;
        this.badge.style.display = totalItems > 0 ? 'flex' : 'none';
    }

    getTotal() {
        return this.items.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    }

    saveCart() {
        localStorage.setItem('cart', JSON.stringify(this.items));
    }
}

// Initialize cart
const cart = new Cart();