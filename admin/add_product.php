<?php
session_start();
if(!isset($_SESSION['login_user'])){
    header("location: login.php");
    die();
}

include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $image_url = $_POST['image_url'];

    $sql = "INSERT INTO products (name, description, price, category_id, image_url) VALUES ('$name', '$description', '$price', '$category_id', '$image_url')";
    
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
    <title>Add Product</title>
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
            <h1>Add Product</h1>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" step="0.01" id="price" name="price" required>
                </div>
                <div class="form-group">
                    <label for="category_id">Category:</label>
                    <select id="category_id" name="category_id" required>
                        <?php
                        $categories = $conn->query("SELECT * FROM categories");
                        while ($category = $categories->fetch_assoc()) {
                            echo "<option value='" . $category['id'] . "'>" . $category['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image_url">Image URL:</label>
                    <input type="text" id="image_url" name="image_url" required>
                </div>
                <button type="submit">Add Product</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 SimplicityTech. All rights reserved.</p>
    </footer>
</body>
</html>
