<?php
class transaction {

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    
    private $item,$quantity;
    public function transaction_for_purchase($id, $quantity) 
    {
        $stat="purchased";
        $query = "INSERT INTO transaction_table (product_id, stat, quantity) VALUES (?, ?, ?)";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("isi", $id, $stat, $quantity);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }


    public function transaction_for_sell($id, $quantity) 
    {
        $stat="sold";
        $query = "INSERT INTO transaction_table (product_id, stat, quantity) VALUES (?, ?, ?)";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("isi", $id, $stat, $quantity);
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
