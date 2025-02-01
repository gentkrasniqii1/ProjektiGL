




<?php
require 'config.php';
session_start();



// Set session timeout duration (in seconds)
$timeout_duration = 1800;

// Check if the session is timed out
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
    session_unset();
    session_destroy();
    header('Location: loginandregister.php?timeout=true');
    exit();
}




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $phone_number = $_POST['phone-number'];
    $birth_date = $_POST['birth-date'];

    $sql = "INSERT INTO users (first_name, last_name, email, password, phone_number, birth_date) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $first_name, $last_name, $email, $password, $phone_number, $birth_date);

    
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if email already exists
    $check_sql = "SELECT id FROM users WHERE email = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        echo 'Error: Email already exists.';
        exit();
    }

    // Input validation
    if (strlen($_POST['password']) < 6) {
        echo 'Error: Password must be at least 6 characters long.';
        exit();
    }

    // Proceed with registration
    $stmt->bind_param("ssssss", $first_name, $last_name, $email, $password, $phone_number, $birth_date);
    if ($stmt->execute()) {
        header('Location: loginandregister.php');
    } else {
        echo 'Error: ' . $stmt->error;
    }
}

?>


