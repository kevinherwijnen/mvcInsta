<?php
class Database {

	 private $host;
  private $user;
  private $pass;
  private $db;
  protected $mysqli;

  public function __construct() {
    $this->db_connect();
  }

  private function db_connect(){
    $this->host = 'localhost';
    $this->user = 'root';
    $this->pass = 'Lollig1';
    $this->db = 'mvc';

    $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);
    return $this->mysqli;

    if(mysqli_connect_errno()) {
        echo "Error: Could not connect to database.";
              exit;
      }
  }

 
 


	}
  
?>