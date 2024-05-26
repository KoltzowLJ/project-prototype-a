<?php
session_start();
if(!isset($_SESSION['login_user'])){
    header("location: login.php");
    die();
}

include('db.php');

$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    header("location: admin.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
