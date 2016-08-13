<?php
include 'conn.php';

class Book implements JsonSerializable {
    
    private $id;
    private $name;
    private $author;
    private $description;
    
    public function getId() {
        return $this->id;
    }
 
    public function getName() {
        return $this->name;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getDescription() {
        return $this->description;
    }

    private function setId($id){
        $this->id = $id;
    }
    
    public function setName($name) {
        $this->name = $name;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function __construct(){
        $this->setId(-1);
        $this->setName(null);
        $this->setAuthor(null);
        $this->setDescription(null);
    }
    
    public function jsonSerialize(){
        return [
                'id' => $this->getId(),
                'name' => $this->getName(),
                'author' => $this->getAuthor(),
                'description' => $this->getDescription()
        ];
    }
    
    public function loadFromDB($conn, $id){
        $sql = "SELECT `id`, `name`, `author`, `description` FROM `Books` WHERE `id` = $id";
        $result = $conn->query($sql);
        if (!$result){
            echo "Connection failure.";
            return false;
        } else {
            foreach($result as $row){
                $this->setId($row['id']);
                $this->setName($row['name']);
                $this->setAuthor($row['author']);
                $this->setDescription($row['description']);
            }
            return true;
        }
    }
    
    public function create($conn, $name, $author, $description){
        
        $sql = "INSERT INTO `Books` (`name`, `author`, `description`) VALUES ('$name', '$author', '$description')";
        $result = $conn->query($sql);
        if (!$result){
            echo "Connection failure.";
            return false;
        } else {
            $this->setName($name);
            $this->setAuthor($author);
            $this->setDescription($description);
            return true;
        }
    }
    
    public function update($conn, $id, $name, $author, $description){
        
        $this->loadFromDB($conn, $id);

        $sql = "UPDATE `Books` SET `name` = '$name', `author` = '$author', `description` = '$description' WHERE id = $id";
        $result = $conn->query($sql);
        if (!$result){
            echo "Connection failure.";
            return false;
        } else {        
            $this->setName($name);
            $this->setAuthor($author);
            $this->setDescription($description);
            return true;
        }
    }
    
    public function deleteFromDB($conn){
        $sql = "DELETE FROM `Books` WHERE id= " . $this->getId();
        $result = $conn->query($sql);
        if (!$result){
            echo "Connection failure.";
            return false;
        } else {
            return true;
        }
    }
}
