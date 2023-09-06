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
    </div>

    
    <div class="container">
        <h1>View Purchases</h1>
    <form action="" method="POST">
        <div class="input-form">
            <label for="start_date">Start Date:</label><br>
            <input type="date" name="start_date" required>
        </div>
    <div class="input-form">
        <label for="end_date">End Date:</label><br>
        <input type="date" name="end_date" required>
    </div>
    <div class="input-form">
        <button type="submit" name="submit" >View Purchases</button>
    </div>
    </form>
</div>
    
</div>
</div>


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
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $REPORT = new report($connection);
    $histories=$REPORT->fetch_report_by_date($start_date, $end_date);
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