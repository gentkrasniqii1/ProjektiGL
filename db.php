<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "menagjimi_lojtareve";

// Create connection
$conn = new mysqli( "localhost", "root", "", "menagjimi_lojtareve");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
