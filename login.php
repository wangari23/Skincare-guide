<?php
session_start();

// Database connection
$host = 'localhost';
$username = 'Winnie_Mungai';
$password = '152649';
$database = 'selfcare guide';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login successful
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // Redirect to dashboard or any other page
    } else {
        // Login failed
        echo "Invalid username or password";
    }
}

$conn->close();
?>
