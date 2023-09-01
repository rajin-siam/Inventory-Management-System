<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php"); 
    exit();
}


echo "Welcome, " . $_SESSION["username"] . "! This is your dashboard.";


?>
<ul>
    <li><a href="action.php">Buy Or Sell Or Update Items</a></li>
    <li><a href="view_items.php">View Items</a></li>
   
</ul>
<a href="logout.php">Logout</a>
