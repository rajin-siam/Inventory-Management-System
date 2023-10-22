<?php
include './includes/db_connection.php';
require_once './classes/InventoryManager.php';
require_once './classes/transaction.php';


    if($_SERVER["REQUEST_METHOD"]== "POST")
    {
            $name=$_POST['_name'];
            $category=$_POST['_category'];
            $quantity=$_POST['_quantity'];
            $price=$_POST['_price'];
            $date=$_POST['date'];

            $inventoryManager = new InventoryManager($connection);
            $item=$inventoryManager->searchItem($name);
            if(empty($item))
            {
                $inventoryManager->addItem($name, $category, $quantity, $price);
                $Transaction= new transaction($connection);
                $item= $Transaction->last_row();
                $Transaction->transaction_for_purchase($item[0]->id, $quantity, $date);
                
                echo "<script>alert('Item Purchased Successfully')</script>";
                
                
                echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=http://localhost/finalproject/version_4/action.php">';

            }
            
            else {
                echo "<script>alert('Item Already Exists')</script>";

                echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=http://localhost/finalproject/version_4/action.php">';

            }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
</head>
<link rel="stylesheet" href='./css/addItem.css'>
<body>
    <div class="container">
                <header class="heading"><h1>Add an Item</h1></header>
        <section class="form-section">
            <form action= "" method= "POST">
                <div class="inline-form">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" name="_name" 
                        id="Name" 
                        required>
                    </div>
                    <div class="form-group">
                        <label for="Category">Category</label>
                            <select name="_category" id="Category">
                                <?php
                                $query = "SELECT category FROM categories";
                                $result = $connection->query($query);
                                
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value='. $row['category'] .'>' . $row['category'] . '</option>' ;
                                }
                                ?>
                            </select>
                    </div>
                </div>
                <div class="inline-form">
                    <div class="form-group">
                        <label for="Quantity">Quantity</label>
                            <input type="number" name="_quantity" id="Quantity" required>
                    </div>
                    <div class="form-group">
                        <label for="Price">Price</label>
                        <input 
                        type="number" name="_price"
                        id="Price" required>
                    </div>
                </div>
            <div class="inline-form">
                <div class="form-group">
                        <label for = "date">Date</label>
                        <input type="date" name="date" id="date" required>

                
                    </div>
            </div>
            <div class="form-group">
                <button class="btn btn-reset"type="reset">Reset</button>
                <button class="btn btn-submit"type="submit">Submit</button>    
            </div>
            </form>
        </section>
    </div>
</body>
</html>
