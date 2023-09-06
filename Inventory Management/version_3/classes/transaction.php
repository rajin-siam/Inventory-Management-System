<?php
class transaction {

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    
    private $item,$quantity,$date;
    public function transaction_for_purchase($id, $quantity, $date) 
    {
        $stat="purchased";
        $query = "INSERT INTO transaction_table (product_id, stat, quantity, date) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("isis", $id, $stat, $quantity, $date);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }


    public function transaction_for_sell($id, $quantity, $date) 
    {
        $stat="sold";
        $query = "INSERT INTO transaction_table (product_id, stat, quantity, date) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("isis", $id, $stat, $quantity, $date);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function last_row()
    {
        $query = "select *from items ORDER BY id DESC LIMIT 1";

        $result = $this->connection->query($query);
        $items = [];
        while($row = $result->fetch_object())
        {
            $items[]=$row;
        }
        
        $result->close();
        return  $items;
    }
    
}
?>
