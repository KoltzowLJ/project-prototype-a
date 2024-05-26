<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    die();
}

include('../includes/db.php');

$products = $conn->query("SELECT * FROM products");
$categories = $conn->query("SELECT * FROM categories");
$orders = $conn->query("SELECT * FROM orders");
$storeInfo = $conn->query("SELECT * FROM store_info")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <main>
        <section class="admin-section">
            <h1>Products</h1>
            <a href="add_product.php">Add New Product</a>
            <ul>
                <?php while($product = $products->fetch_assoc()): ?>
                    <li><?php echo $product['name']; ?> - $<?php echo $product['price']; ?> <a href="edit_product.php?id=<?php echo $product['id']; ?>">Edit</a> <a href="delete_product.php?id=<?php echo $product['id']; ?>">Delete</a></li>
                <?php endwhile; ?>
            </ul>
        </section>

        <section class="admin-section">
            <h1>Categories</h1>
            <a href="add_category.php">Add New Category</a>
            <ul>
                <?php while($category = $categories->fetch_assoc()): ?>
                    <li><?php echo $category['name']; ?> <a href="edit_category.php?id=<?php echo $category['id']; ?>">Edit</a> <a href="delete_category.php?id=<?php echo $category['id']; ?>">Delete</a></li>
                <?php endwhile; ?>
            </ul>
        </section>

        <section class="admin-section">
            <h1>Orders</h1>
            <ul>
                <?php while($order = $orders->fetch_assoc()): ?>
                    <li><?php echo $order['customer_name']; ?> - $<?php echo $order['total_price']; ?></li>
                <?php endwhile; ?>
            </ul>
        </section>

        <section class="admin-section">
            <h1>Store Info</h1>
            <form action="update_store_info.php" method="post">
                <div class="form-group">
                    <label for="logo_url">Logo URL:</label>
                    <input type="text" id="logo_url" name="logo_url" value="<?php echo $storeInfo['logo_url']; ?>">
                </div>
                <button type="submit">Update</button>
            </form>
        </section>
    </main>
    <?php include('../includes/footer.php'); ?>
</body>
</html>
