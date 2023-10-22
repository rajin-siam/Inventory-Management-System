<?php
class report {
    private $connection;
    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function fetch_all_transaction() {
        $query = "select transaction_table.transaction_id, transaction_table.product_id, items.name, transaction_table.stat,transaction_table.quantity, items.category, transaction_table.date from items inner join transaction_table on items.id=transaction_table.product_id";
        $result = $this->connection->query($query);
        $items = [];
        while($row = $result->fetch_object())
        {
            $items[]=$row;
        }
        
        $result->close();
        return  $items;
    }




    public function fetch_report_by_date($start_date, $end_date)
    {
    $query = "select transaction_table.transaction_id, transaction_table.product_id, items.name, transaction_table.stat, transaction_table.quantity, items.category, transaction_table.date from items inner join transaction_table on items.id=transaction_table.product_id where transaction_table.date between ? AND ?";
    $stmt = $this->connection->prepare($query);

if ($stmt) {
    $stmt->bind_param("ss", $start_date, $end_date);
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    $items = [];
        while($row = $result->fetch_object())
        {
            $items[]=$row;
        }
        
        $result->close();
        return  $items;


    }
}

    public function fetch_report_by_category($category)
    {
        $query = "select transaction_table.transaction_id, transaction_table.product_id, items.name, transaction_table.stat, transaction_table.quantity, items.category, transaction_table.date from items inner join transaction_table on items.id=transaction_table.product_id where items.category = ?";
        
        $stmt = $this->connection->prepare($query);
        if ($stmt) {
            $stmt->bind_param("s",$category);
            $stmt->execute();
            $result = $stmt->get_result();
            $items = [];
                while($row = $result->fetch_object())
                {
                    $items[]=$row;
                }
                
                $result->close();
                return  $items;
            }
            else echo "unsuccessful";
    }

}