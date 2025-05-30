document.addEventListener('DOMContentLoaded', function() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartItemsContainer = document.getElementById('cartItems');
    const subtotalElement = document.getElementById('subtotal');
    const totalElement = document.getElementById('total');
    const shippingElement = document.getElementById('shipping');

    function updateCartCount() {
        const count = cart.reduce((total, item) => total + item.quantity, 0);
        document.querySelectorAll('.cartcount').forEach(el => {
            el.textContent = count;
            el.style.display = count > 0 ? 'inlineblock' : 'none';
        });
    }

    function renderCart() {
        if (cart.length === 0) {
            cartItemsContainer.innerHTML = '<div class="emptycart">Your cart is empty</div>';
            subtotalElement.textContent = '$0.00';
            totalElement.textContent = '$5.00';
            return;
        }

        let subtotal = 0;
        cartItemsContainer.innerHTML = '';

        cart.forEach(item => {
            subtotal += item.price * item.quantity;

            const itemElement = document.createElement('div');
            itemElement.className = 'cartitem';
            itemElement.innerHTML = `
                <img src="${item.image}" alt="${item.name}">
                <div class="itemdetails">
                    <h3>${item.name}</h3>
                    <p>$${item.price.toFixed(2)}</p>
                    <div class="quantitycontrols">
                        <button onclick="changeQuantity('${item.id}', -1)">-</button>
                        <span>${item.quantity}</span>
                        <button onclick="changeQuantity('${item.id}', 1)">+</button>
                    </div>
                </div>
                <button class="removebtn" onclick="removeItem('${item.id}')">Remove</button>
            `;

            cartItemsContainer.appendChild(itemElement);
        });

        const shipping = 5.00;
        const total = subtotal + shipping;

        subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
        totalElement.textContent = `$${total.toFixed(2)}`;
    }

    window.changeQuantity = function(id, change) {
        const itemIndex = cart.findIndex(item => item.id === id);
        if (itemIndex !== -1) {
            cart[itemIndex].quantity += change;

            if (cart[itemIndex].quantity <= 0) {
                cart.splice(itemIndex, 1);
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();
            renderCart();
        }
    };

    window.removeItem = function(id) {
        cart = cart.filter(item => item.id !== id);
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartCount();
        renderCart();
    };

    renderCart();
});