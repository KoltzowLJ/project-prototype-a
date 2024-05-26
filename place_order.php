<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $payment = $_POST['payment'];

    $cart = json_decode($_SESSION['cart'], true);
    foreach ($cart as $item) {
        $product_id = $item['id'];
        $quantity = $item['quantity'];
        $total_price = $item['price'] * $quantity;

        $sql = "INSERT INTO orders (product_id, quantity, total_price, customer_name, customer_address, customer_email) VALUES ('$product_id', '$quantity', '$total_price', '$name', '$address', '$email')";
        
        if ($conn->query($sql) === TRUE) {
            continue;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Clear the cart after order is placed
    unset($_SESSION['cart']);
    header("location: index.html");
}
?>
