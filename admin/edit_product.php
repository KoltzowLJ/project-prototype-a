<?php
session_start();
if(!isset($_SESSION['login_user'])){
    header("location: login.php");
    die();
}

include('db.php');

$id = $_GET['id'];

$product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $image_url = $_POST['image_url'];

    $sql = "UPDATE products SET name='$name', description='$description', price='$price', category_id='$category_id', image_url='$image_url' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("location: admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo">Admin Dashboard</div>
        <nav>
            <ul>
                <li><a href="admin.php">Dashboard</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="admin-section">
            <h1>Edit Product</h1>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" required><?php echo $product['description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" step="0.01" id="price" name="price" value="<?php echo $product['price']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="category_id">Category:</label>
                    <select id="category_id" name="category_id" required>
                        <?php
                        $categories = $conn->query("SELECT * FROM categories");
                        while ($category = $categories->fetch_assoc()) {
                            $selected = $category['id'] == $product['category_id'] ? 'selected' : '';
                            echo "<option value='" . $category['id'] . "' $selected>" . $category['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image_url">Image URL:</label>
                    <input type="text" id="image_url" name="image_url" value="<?php echo $product['image_url']; ?>" required>
                </div>
                <button type="submit">Update Product</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 SimplicityTech. All rights reserved.</p>
</footer>
</body>
</html>
