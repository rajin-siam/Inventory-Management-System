<?php
class report {
    private $connection;
    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function fetch_all_transaction() {
        $query = "select transaction_table.transaction_id, transaction_table.product_id, items.name, transaction_table.stat,transaction_table.quantity, items.category from items inner join transaction_table on items.id=transaction_table.product_id";
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