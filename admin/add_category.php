<?php
session_start();
if(!isset($_SESSION['login_user'])){
    header("location: login.php");
    die();
}

include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];

    $sql = "INSERT INTO categories (name) VALUES ('$name')";
    
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
    <title>Add Category</title>
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
            <h1>Add Category</h1>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <button type="submit">Add Category</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 SimplicityTech. All rights reserved.</p>
    </footer>
</body>
</html>
