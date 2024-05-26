<header>
    <div class="logo">
        <?php
        include('db.php');
        $storeInfo = $conn->query("SELECT * FROM store_info")->fetch_assoc();
        echo "<img src='" . $storeInfo['logo_url'] . "' alt='SimplicityTech'>";
        ?>
    </div>
    <nav>
        <ul>
            <li><a href="/index.html">Home</a></li>
            <li><a href="/cart.html">Cart</a></li>
            <li><a href="/checkout.html">Checkout</a></li>
            <li><a href="/categories.html">Categories</a></li>
            <?php if (isset($_SESSION['login_user'])): ?>
                <li><a href="/admin/logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="/user_login.php">Login</a></li>
                <li><a href="/register.php">Register</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
