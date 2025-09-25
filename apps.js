document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.add-to-cart-btn');
    buttons.forEach(btn => {
        btn.addEventListener('click', function () {
            const name = this.dataset.name;
            const price = this.dataset.price;
            const image = this.dataset.image;

            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            cart.push({ name, price, image });
            localStorage.setItem('cart', JSON.stringify(cart));

            alert(`${name} sepete eklendi!`);
            updateMiniCart();
        });
    });

    // Sepet aç kapat
    const toggleBtn = document.getElementById('toggle-cart-btn');
    const cartBox = document.getElementById('mini-cart');
    if (toggleBtn && cartBox) {
        toggleBtn.addEventListener('click', function () {
            cartBox.style.display = (cartBox.style.display === 'none') ? 'block' : 'none';
        });
    }

    updateMiniCart();
});

// Mini sepeti güncelle
function updateMiniCart() {
    const container = document.querySelector('.mini-cart-content');
    if (!container) return;

    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    container.innerHTML = '';

    if (cart.length === 0) {
        container.innerHTML = "<p style = 'color:black'>Sepet boş.</p>";
    } else {
        cart.forEach((item, index) => {
            const div = document.createElement('div');
            div.className = 'mini-cart-item';
            div.innerHTML = `
                <img src="${item.image}" />
                <div class="cart-info">
                    <p>${item.name}</p><br>
                    <b>${item.price}₺</b>
                </div>
                <button class="remove-from-cart" data-index="${index}">Ürünü Kaldır</button>
            `;
            container.appendChild(div);
        });

        // Kaldırma işlemi
        document.querySelectorAll('.remove-from-cart').forEach(btn => {
            btn.addEventListener('click', function () {
                const index = parseInt(this.dataset.index);
                let cart = JSON.parse(localStorage.getItem('cart')) || [];
                cart.splice(index, 1);
                localStorage.setItem('cart', JSON.stringify(cart));
                updateMiniCart();
            });
        });
    }
}
