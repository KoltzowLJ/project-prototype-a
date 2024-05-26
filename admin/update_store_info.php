<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    die();
}

include('../includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $logo_url = $_POST['logo_url'];

    $sql = "UPDATE store_info SET logo_url='$logo_url' WHERE id=1";
    
    if ($conn->query($sql) === TRUE) {
        header("location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
