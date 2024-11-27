<?php
class Confige {
    private $host = 'localhost'; 
    private $user = 'root';      
    private $password = '';     
    private $dbname = 'super13'; 
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }


    public function removeStudent($id) {
        $query = "DELETE FROM school WHERE id=$id";
        return $this->conn->query($query);
    }
    
}
?>
