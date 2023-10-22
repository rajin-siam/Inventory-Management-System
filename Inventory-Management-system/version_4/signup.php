<?php
session_start();
require_once 'includes/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $re_password = $_POST["re-password"];
    if($password == $re_password)
    {
            $query = "SELECT * FROM users WHERE username = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows == 1) {
                echo "<script>alert('User Name already exists')</script>";
                
                echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/finalproject/version_4/signup.php">';
            } else {
                        $query = "INSERT INTO users (username, password) VALUES (?, ?)";
                        $stmt = $connection->prepare($query);
                        $stmt->bind_param("ss", $username, $password);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $_SESSION["username"] = $username;
                        header("Location: action.php"); 
            }            
    }
    else 
    {
                echo "<script>alert('Password do not match')</script>";
                echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/finalproject/version_4/signup.php">';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<link rel="stylesheet" href='./css/login.css'>
<body>

<div class="container">
    <div class="title">
        <h1>Sign Up</h1>
    </div>
    
        <form method="post" action="">
            <div class="form-group">
                    <label for="USER">Enter UserName</label>
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
                    <label for="PASS">Enter Password</label>
                    <br>
                    <input type="password" 
                    name="password"
                    id="PASS" 
                    placeholder="Password"
                    class="form-control" 
                    required>
                    
            </div>

            <div class="form-group">
                    <label for="PASS">Re Enter Password</label>
                    <br>
                    <input type="password" 
                    name="re-password"
                    id="PASS" 
                    placeholder="Re-enter your Password"
                    class="form-control" 
                    required>
                    <br>
                    <button type="submit" class="submit-btn">Sign Up</button>
                    <?php if (isset($login_error)) echo "<p>$login_error</p>"; ?>
            </div>
        </form>
        
</div>

</body>
</html>