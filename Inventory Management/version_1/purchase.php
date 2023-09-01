<p>
    How Many Items you want to buy?
</p>
<form method="POST" action="">
    <input type="number" name="quantity" min="1" required>
    <button type="submit">Submit</button>

</form>
<?php
require_once 'includes/db_connection.php';
require_once 'classes/InventoryManager.php';
require_once 'classes/transaction.php';
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}

$id = $_GET["_id"];
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $quantity=$_POST["quantity"];
    $inventoryManager = new InventoryManager($connection);
    $inventoryManager->purchase($id,$quantity);

    $Transaction= new transaction($connection);
    $Transaction->transaction_for_purchase($id,$quantity);


    echo "<script>alert('Purchased Successfully')</script>";

    echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/finalproject/action.php">';
}

?>