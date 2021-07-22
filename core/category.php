<?php
class Category{
    
    private $conn;
    private $table = 'categories';

    
    public $id;
    public $name;
    
   
    
    public function __construct($db){
        $this->con = $db;
    }
   
   public function read (){
      
       $query = 'SELECT
       *
       FROM
       ' .$this ->table;

          
            $stmt = $this-> conn ->prepare($query);
           
            $stmt ->execute();

            return $stmt;

   }
       public function read_single(){
        $query = 'SELECT
        c.name as category_name,
        p.id,
        p.category_id,
        p.title,
        p.price,
        p.description
        FROM
        ' .$this ->table . 'p
        LEFT JOIN
             categories c ON p.category_id = c.id
             WHERE p.id = ? LIMIT 1';

        $stmt = $this ->conn->prepare($query);
        $stmt -> bindParam(1, $this->id);
        $stmt ->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->title = $row['title'];
        $this->category_id = $row['category_id'];
        $this->price = $row['price'];
        $this->description = $row['description'];
        $this->category_name = $row['category_name'];
       } 
    public function update(){
        $query = 'UPDATE' .$this ->table .'SET title = :title, category_id = :category_id, price = :price, description = :description, category_name = :category_name
        WHERE id = :id';
        $stmt = $this->conn->prepare($query);

        $this->title = htmlspecialchars((strip_tags($this->title)));
        $this->category_id = htmlspecialchars((strip_tags($this->category_id)));
        $this->price = htmlspecialchars((strip_tags($this->price)));
        $this->description = htmlspecialchars((strip_tags($this->description)));
        $this->id = htmlspecialchars((strip_tags($this->id)));

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':id', $this->id);
        

        if($stmt->execute()){
            return true;

            printf("Error %s. \n", $stmt->error);
            return false;
        }
    }
    public function create(){
        $query = 'UPDATE' .$this ->table .'SET title = :title, category_id = :category_id, price = :price, description = :description, category_name = :category_name
        WHERE id = :id';
        $stmt = $this->conn->prepare($query);

        $this->title = htmlspecialchars((strip_tags($this->title)));
        $this->category_id = htmlspecialchars((strip_tags($this->category_id)));
        $this->price = htmlspecialchars((strip_tags($this->price)));
        $this->description = htmlspecialchars((strip_tags($this->description)));
        $this->id = htmlspecialchars((strip_tags($this->id)));

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':id', $this->id);
        

        if($stmt->execute()){
            return true;

            printf("Error %s. \n", $stmt->error);
            return false;
        }
    }

    public function delete(){
        $query = 'DELETE FROM' .$this->table . 'WHERE id = id';
        $stmt = $this-> conn-> prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->binParam('id', $this->id);
        if($stmt->execute()){
            return true;
        }
        printf("Error %s. \n", $stmt->error);
        return false;
    }
}


?>
