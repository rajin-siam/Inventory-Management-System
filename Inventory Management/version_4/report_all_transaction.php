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

    $REPORT = new report($connection);
    $histories=$REPORT->fetch_all_transaction();
?>

<!DOCTYPE html>
    <html>
    <head>
        <title>Report</title>
    </head>
    <link rel="stylesheet" href='./css/report_table_styling.css'>
    <body>



    <div class="container">
            <div class="back">
                <p>
                <a href="./report.php">Go back</a>
                </p>
            </div>
    </div>
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
?>
        </table>
    </body>
</html>

