<?php
class InventoryManager {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    

    public function getAllItems() {
        $query = "SELECT * FROM items";
        $result = $this->connection->query($query);
        $items = [];
        
        while($row = $result->fetch_object())
        {
            $items[]=$row;
        }
        
        $result->close();
        return  $items;

    }
    public function purchase($id,$quantity){
        $query= "UPDATE items SET quantity = quantity + ? WHERE id = ?";
        $stmt=$this->connection->prepare($query);
        $stmt->bind_param("ii",$quantity,$id);
        $result = $stmt->execute();
        $stmt->close();
    }


    public function sell($id,$quantity){
        $query= "UPDATE items SET quantity = quantity - ? WHERE id = ?";
        $stmt=$this->connection->prepare($query);
        $stmt->bind_param("ii",$quantity,$id);
        $result = $stmt->execute();
        $stmt->close();
    }

    public function getItem($id)
    {
        $query="SELECT * FROM items WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result = $stmt->get_result();
        $item = $result->fetch_object();
        $stmt->close();
        return $item;
    }



    public function update($id, $name, $category, $quantity, $price)
    {
        $query= "UPDATE items SET name = ?, category = ?, quantity = ?, price = ? WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("ssidi", $name, $category, $quantity, $price, $id);
        $stmt->execute();
        $stmt->close();
    }

        public function addItem($name, $category, $quantity, $price) 
        {
            $query = "INSERT INTO items (name, quantity, category, price) VALUES (?, ?, ?, ?)";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("sisd", $name, $quantity, $category, $price);
            $result = $stmt->execute();
            $stmt->close();
            return $result;
        }

        public function searchItem($searchTerm) {
            $query = "SELECT * FROM items WHERE name LIKE ?";
            $stmt = $this->connection->prepare($query);
            $searchTerm = "%" . $searchTerm . "%"; // Wildcard search
            $stmt->bind_param("s", $searchTerm);
            $stmt->execute();
            $result = $stmt->get_result();
            
            $items = [];
            while ($row = $result->fetch_object()) {
                $items[] = $row;
            }
            $stmt->close();
        
            return $items;
        }
        

}
?>
