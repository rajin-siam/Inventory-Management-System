<?php

require_once 'includes/db_connection.php';

require_once 'classes/InventoryManager.php';

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php"); 
    exit();
}

$inventoryManager = new InventoryManager($connection);
$items = $inventoryManager->getAllItems();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Action</title>
</head>
<link rel="stylesheet" href='./css/action.css'>
<body>
    <div class="group">
        <div class="report"><p><a href="./report.php" style="text-decoration: none;">Report</a></p></div>  
        
        
        <div class="logout"><p><a href="./logout.php" style="text-decoration: none;">Log Out</a></p></div> 
    </div>

    

    <div class="container">
        
            <div class="group">
                <div class="refresh">
                <p><a href="./action.php" style="text-decoration: none;">Refresh</a></p></div>
                
                <div class="searhing">
                    <form action="" method="POST">
                    <input type="text" name="_name" id="Name" class="search_bar"> 
                    <button class="btn btn-submit"type="submit" name="search-button">Search</button>   
                    </form> 

                </div> 
            </div>
    <div class="contain">

            <div class="add">
                <p><a href="addItem.php" style="text-decoration: none;">Add Item</a></p></div>
    </div>       

    </div>

<div class="container">
<table class="table">
    <caption>Item Table</caption>
    <thead>
        <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Quantity</th>
        <th>Price</th>
        <th colspan=3>Action</th>
        </tr>
    </thead>
        <tbody>
            <?php
            if(isset($_POST['search-button']))
            {
                $name=$_POST['_name'];
                
                $items=$inventoryManager->searchItem($name);
                if(empty($items))
                {
                    echo "<script>alert('Item Not Found')</script>";
                
                
                    echo '<META HTTP-EQUIV="Refresh" CONTENT="1; URL=http://localhost/finalproject/version_4/action.php">';
                }
            }
            
                foreach($items as $item)
                {
    
    
                    echo '
                            <tr>
                            <td>'.$item->id .'</td>
                            <td>'.$item->name .'</td>
                            <td>'.$item->category .'</td>
                            <td>'.$item->quantity . '</td>
                            <td>'.$item->price . '</td><td class="purchase"><a href = purchase.php?_id='. $item->id .' style="text-decoration: none;">Purchase</a></td>
                            <td class="sell"><a href=sell.php?_id='. $item->id .' style="text-decoration: none;">Sell</a></td><td class="update"><a href=update.php?_id=' . $item->id . ' style="text-decoration: none;">Update</a></td>
                            </tr> ';
                }
           
            ?>
        </tbody>
        </table>
</div>
</html>