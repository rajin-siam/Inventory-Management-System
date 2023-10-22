
<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php"); 
    exit();
}

require_once 'includes/db_connection.php';
require_once 'classes/InventoryManager.php';
      $id= $_GET["_id"];
      $inventoryManager = new InventoryManager($connection);
    $item= $inventoryManager->getItem($id);
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Item</title>
</head>
<link rel="stylesheet" href='./css/update.css'>
<div class="container">
                <header class="heading"><h1>Update Item</h1></header>
        <section class="form-section">
            <form action= "" method= "POST">
                <div class="inline-form">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" name="_name" 
                        id="Name" value="<?php echo $item->name ;?>"
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
                            <input type="number" name="_quantity" id="Quantity" value="<?php echo $item->quantity ;?>"required>
                    </div>
                    <div class="form-group">
                        <label for="Price">Price</label>
                        <input 
                        type="number" name="_price"
                        id="Price" value="<?php echo $item->price ;?>"required>
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

<?php


    if($_SERVER["REQUEST_METHOD"]== "POST")
    {
            $name=$_POST['_name'];
            $category=$_POST['_category'];
            $quantity=$_POST['_quantity'];
            $price=$_POST['_price'];

            $inventoryManager = new InventoryManager($connection);
            $inventoryManager->update($id, $name, $category, $quantity, $price);
        
        
            echo "<script>alert('Updated Successfully')</script>";
        
            echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/finalproject/version_4/action.php">';

    }
    
?>
