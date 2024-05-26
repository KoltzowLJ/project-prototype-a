let cart = [];

document.addEventListener('DOMContentLoaded', () => {
    loadCart();
    displayCart();
});

function loadCart() {
    cart = JSON.parse(localStorage.getItem('cart')) || [];
}

function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

function displayCart() {
    const cartList = document.querySelector('.cart-list');
    const cartTotal = document.getElementById('cart-total');
    cartList.innerHTML = '';
    let total = 0;

    cart.forEach((item, index) => {
        const product = document.createElement('div');
        product.classList.add('cart-item');
        product.innerHTML = `
            <img src="${item.image_url}" alt="${item.name}">
            <div class="cart-item-details">
                <h2>${item.name}</h2>
                <p>Price: $${item.price}</p>
                <p>Quantity: ${item.quantity}</p>
                <button onclick="removeFromCart(${index})">Remove</button>
            </div>
        `;
        cartList.appendChild(product);
        total += item.price * item.quantity;
    });

    cartTotal.textContent = total.toFixed(2);
}

function addToCart(product) {
    const index = cart.findIndex(item => item.id === product.id);
    if (index !== -1) {
        cart[index].quantity++;
    } else {
        cart.push({ ...product, quantity: 1 });
    }
    saveCart();
    displayCart();
}

function removeFromCart(index) {
    cart.splice(index, 1);
    saveCart();
    displayCart();
}
