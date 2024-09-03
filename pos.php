<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            width: 100%;
            min-height: 100vh;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar {
            width: 250px;
            background-color: #fff;
            padding: 20px;
            border-right: 1px solid #eee;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;          
            transition: transform 0.3s;
            z-index: 10;
        }

        .sidebar.active {
            transform: translateX(-100%);
        }

        .sidebar h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #333;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar a {
            display: block;
            padding: 10px;
            border-radius: 5px;
            color: #333;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #f0f0f0;
        }

        .main {
            flex: 1;
            padding: 20px;
            margin-left: 250px;
            transition: margin-left 0.3s;
        }

        .main.active {
            margin-left: 0;
        }

        .main h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #333;
        }

        .main .products {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .product {
            width: 200px;
            margin-bottom: 20px;
            background-color: #fff;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .product h3 {
            font-size: 1.2rem;
            margin-bottom: 5px;
            color: #333;
        }

        .product p {
            font-size: 1rem;
            margin-bottom: 5px;
            color: #555;
        }

        .product button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .product button:hover {
            background-color: #0056b3;
        }

        .hamburger.active .bar {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .hamburger.active .bar:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active .bar:nth-child(3) {
            transform: rotate(-45deg) translate(-5px, -5px);
        }

        .hamburger .bar {
            display: block;
            width: 25px;
            height: 3px;
            margin: 5px auto;
            background-color: #333;
            transition: transform 0.3s;
        }

        @media (max-width: 769px) {
            .hamburger {
                display:block;
            }

            .sidebar {
                width: 80%;
            }

            .main {
                margin-left: 0;
            }
        }

        /* Style for Cart Sidebar */
        .cart-sidebar {
            width: 300px;
            background-color: #f8f9fa;
            padding: 20px;
            border-left: 1px solid #eee;
            position: fixed;
            top: 0;
            right: 0;
            height: 100vh;
            transform: translateX(100%);
            transition: transform 0.3s;
            z-index: 15;
        }

        .cart-sidebar.active {
            transform: translateX(0);
        }

        .cart-sidebar h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #333;
        }

        .cart-sidebar .cart-items {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .cart-sidebar .cart-item {
            margin-bottom: 10px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        .cart-sidebar .cart-item h4 {
            font-size: 1.2rem;
            margin: 0;
            color: #333;
        }

        .cart-sidebar .cart-item p {
            font-size: 1rem;
            margin: 5px 0;
            color: #555;
        }

        .cart-sidebar .cart-total {
            font-weight: bold;
            margin-top: 20px;
        }

        /* Cart Button */
        .cart-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            z-index: 20;
        }

        .cart-btn:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar active">
            <div class="hamburger" onclick="toggleSidebar()">
            </div>
            <h2>Menu</h2>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Customers</a></li>
                <li><a href="#">Stock</a></li>
                <li><a href="#">Purchases</a></li>
            </ul>
        </div>
        <div class="main active">
            <span class="toggle-sidebar-btn" onclick="toggleSidebar()">&#9776;</span>
            <h1>Products</h1>
            <div class="products">
                <?php
                    $products = [
                        ['id' => 1, 'image' => 'https://dummyimage.com/200x150/007bff/fff', 'name' => 'Product A', 'price' => '250'],
                        ['id' => 2, 'image' => 'https://dummyimage.com/200x150/0056b3/fff', 'name' => 'Product B', 'price' => '300'],
                        ['id' => 3, 'image' => 'https://dummyimage.com/200x150/0099ff/fff', 'name' => 'Product C', 'price' => '250'],
                        ['id' => 4, 'image' => 'https://dummyimage.com/200x150/00ccff/fff', 'name' => 'Product D', 'price' => '300'],
                        ['id' => 5, 'image' => 'https://dummyimage.com/200x150/00e6ff/fff', 'name' => 'Product E', 'price' => '250'],
                        ['id' => 6, 'image' => 'https://dummyimage.com/200x150/00ffff/fff', 'name' => 'Product F', 'price' => '300'],
                    ];

                    foreach ($products as $product) {
                        echo '<div class="product">';
                        echo '<img src="' . $product['image'] . '" alt="' . $product['name'] . '">';
                        echo '<h3>' . $product['name'] . '</h3>';
                        echo '<p>$' . $product['price'] . '</p>';
                        echo '<input type="number" value="1" class="quantity" data-product-id="' . $product['id'] . '" data-product-name="' . $product['name'] . '" data-product-price="' . $product['price'] . '">';
                        echo '<button type="button" class="submit" onclick="addToCart(' . $product['id'] . ')">Add to Cart</button>';
                        echo '</div>';
                    }
                ?>
            </div>
        </div>

        <!-- Cart Sidebar -->
        <div class="cart-sidebar" id="cart-sidebar">
            <h2>Your Cart</h2>
            <ul class="cart-items">
                <!-- Cart items will be dynamically added here -->
            </ul>
            <p class="cart-total">Total: $0</p>
        </div>

        <!-- Cart Button -->
        <div class="cart-btn" onclick="toggleCart()">Cart</div>
    </div>

    <script>
        let cart = [];

        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const main = document.querySelector('.main');
            const hamburger = document.querySelector('.hamburger');
            const toggleSidebarBtn = document.querySelector('.toggle-sidebar-btn');

            sidebar.classList.toggle('active');
            main.classList.toggle('active');
            hamburger.classList.toggle('active');
            toggleSidebarBtn.classList.toggle('active');

            if (hamburger.classList.contains('active')) {
                toggleSidebarBtn.innerHTML = '&#9776;';
            } else {
                toggleSidebarBtn.innerHTML = '&#9776;';
            }
        }

        function toggleCart() {
            const cartSidebar = document.getElementById('cart-sidebar');
            cartSidebar.classList.toggle('active');
        }

        function addToCart(productId) {
            const quantityInput = document.querySelector(`input[data-product-id="${productId}"]`);
            const productName = quantityInput.getAttribute('data-product-name');
            const productPrice = parseFloat(quantityInput.getAttribute('data-product-price'));
            const quantity = parseInt(quantityInput.value);

            const existingProduct = cart.find(item => item.id === productId);

            if (existingProduct) {
                existingProduct.quantity += quantity;
            } else {
                cart.push({
                    id: productId,
                    name: productName,
                    price: productPrice,
                    quantity: quantity
                });
            }

            updateCart();
        }

        function updateCart() {
            const cartItemsContainer = document.querySelector('.cart-items');
            cartItemsContainer.innerHTML = '';

            let total = 0;

            cart.forEach(item => {
                const cartItem = document.createElement('li');
                cartItem.classList.add('cart-item');
                cartItem.innerHTML = `
                    <h4>${item.name}</h4>
                    <p>Quantity: ${item.quantity}</p>
                    <p>Price: $${(item.price * item.quantity).toFixed(2)}</p>
                `;
                cartItemsContainer.appendChild(cartItem);

                total += item.price * item.quantity;
            });

            document.querySelector('.cart-total').textContent = `Total: $${total.toFixed(2)}`;
        }
    </script>
</body>
</html>