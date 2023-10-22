<?php   

require_once 'includes/db_connection.php';
require_once 'classes/InventoryManager.php';
require_once 'classes/transaction.php';
require_once 'classes/report.php';


session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php"); 
    exit();
}

?>

<!DOCTYPE html>
    <html>
    <head>
        <title>Report</title>
    </head>
    <link rel="stylesheet" href="./css/report_table_styling.css">
    <body>
    <div class="container">
            <div class="back">
                <p>
                <a href="./report.php">Go back</a>
                </p>
            </div>
   

    <h1>View Purchases</h1>
    <div class="form-group">

        <form action="" method="post">
                        <label for="Category">Category</label>
                            <select name="_category" id="Category">
                                <?php
                            
                                $query = "SELECT category FROM categories";
                                $result = $connection->query($query);

                                while ($row = $result->fetch_object()) {
                                    $categoryValue = $row->category;
                                    $selected = ($categoryValue == $_POST['_category']) ? 'selected="selected"' : '';
                                    echo '<option value="' . $categoryValue . '" ' . $selected . '>' . $categoryValue . '</option>';
                                }
                                        
                                        $result->close();
                                ?>
                            </select>
                            <button type="submit" name="submit">View Purchases</button>
                    </div>
        </form>
        </div>


<?php


if($_SERVER['REQUEST_METHOD']=='POST')
{
    $category=$_POST['_category'];
    $REPORT = new report($connection);
    $histories=$REPORT->fetch_report_by_category($category);
}

?>




    <div class="container">
    <table class="table">
    <caption>Report</caption>
    <tr>
        <th>transaction ID</th>
        <th>Product ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Stat</th>
        <th>Date</th>
        <th>Quantity</th>
    </tr>

<?php

     if(isset($_POST['submit']))
     {
        foreach($histories as $history)
        {
                echo '
                        <tr>
                        <td>'.$history->transaction_id .'</td>
                        <td>'.$history->product_id .'</td>
                        <td>'.$history->name .'</td>
                        <td>'.$history->category .'</td>
                        <td>'.$history->stat .'</td>
                        <td>'.$history->date . '</td>
                        <td>'.$history->quantity . '</td>
                        </tr> ';       
        }
     }
        
     
?>
</table>
</body>
</html>