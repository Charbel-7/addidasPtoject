let cart = JSON.parse(localStorage.getItem('cart')) || [];

function purchaseItem(id, name, price, image) {
    const existingItem = cart.find(item => item.id === id);

    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({
            id,
            name,
            price,
            image,
            quantity: 1
        });
    }

    localStorage.setItem('cart', JSON.stringify(cart));

    updateCartCount();

    alert(`${name} added to cart!`);
}

function updateCartCount() {
    const count = cart.reduce((total, item) => total + item.quantity, 0);
    document.querySelectorAll('.cart-count').forEach(el => {
        el.textContent = count;
        el.style.display = count > 0 ? 'inlineblock' : 'none';
    });
}

document.addEventListener('DOMContentLoaded', updateCartCount);
function checkout() {
    if (cart.length === 0) {
        alert('Your cart is empty!');
        return;
    }

    alert(`Order confirmed! Total: $${calculateTotal()}`);
    cart = [];
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
    window.location.href = 'index.php';
}

function calculateTotal() {
    const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    const shipping = 5.00;
    return (subtotal + shipping).toFixed(2);
}
