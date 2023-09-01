<?php
session_start();
require_once 'includes/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform user authentication (replace with your own logic)
    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $_SESSION["username"] = $username;
        header("Location: action.php"); // Redirect to the dashboard
    } else {
        $login_error = "Invalid username or password";
    }
}
?>

<!-- HTML form for user login -->
<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
</head>
<link rel="stylesheet" href='./css/login.css'>
<body>

<div class="container">
    <div class="title"><h1>Log In</h1></div><br>
    <div class="form-group">
<form method="post" action="">
    <lable for="USER">Enter UserName</lable>
    <br>
    <input 
    type="text" 
    name="username" 
    id="USER"
    placeholder="Username" 
    class="form-control"
    required>
    </div>
    <div class="form-group">
    <lable for="PASS">Enter Password</lable>
    <br>
    <input type="password" 
    name="password"
    id="PASS" 
    placeholder="Password"
    class="form-control" 
    required>
    <br>
    <button type="submit" class="submit-btn">Login</button>
    <?php if (isset($login_error)) echo "<p>$login_error</p>"; ?>
</div>
</div>
</form>
</body>
</html>
