<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "practice";

// Create a database connection
$mysqli = new mysqli($host, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve form data
$product_name = $_POST['product_name'];
$purchase_date = $_POST['purchase_date'];

// Insert purchase data into the database
$sql = "INSERT INTO history (product_name, purchase_date) VALUES (?, ?)";
$stmt = $mysqli->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ss", $product_name, $purchase_date);
    $stmt->execute();
    $stmt->close();
    
    echo "Purchase successful!";
} else {
    echo "Error: " . $mysqli->error;
}

// Close database connection
$mysqli->close();
?>
