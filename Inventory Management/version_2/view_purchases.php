<?php
// Database connection details (same as before)
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
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

// Retrieve purchases within the specified time range
$sql = "SELECT * FROM history WHERE purchase_date BETWEEN ? AND ?";
$stmt = $mysqli->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ss", $start_date, $end_date);
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    // Display the results
    echo "<h2>Purchases within the specified time range:</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>Product: " . $row['product_name'] . " (Purchase Date: " . $row['purchase_date'] . ")</li>";
    }
    echo "</ul>";
    
    $stmt->close();
} else {
    echo "Error: " . $mysqli->error;
}

// Close database connection
$mysqli->close();
?>
