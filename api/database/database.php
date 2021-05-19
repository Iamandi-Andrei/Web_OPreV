<?php
class Database{
  
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "tw";
    private $username = "admin234";
    private $password = "admin432";
    public $conn;
  
    // get the database connection
    public function getConnection(){
  
        $this->conn = null;
  
      
            $mysql = new mysqli (
        $this->host, // locatia serverului (aici, masina locala)
        $this->username,       // numele de cont
        $this->password,    // parola (atentie, in clar!)
        $this->db_name   // baza de date
        );
        
		
	$conn=$mysql;
  
        return $mysql;
    }
}
?>