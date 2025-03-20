<?php
session_start();
include 'shopconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['id'];
    $quantity = $_POST['quantity'];
    $session_id = session_id();

    $sql = "INSERT INTO cart (id, quantity, session_id) VALUES ('$product_id', '$quantity', '$session_id')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: shop.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
