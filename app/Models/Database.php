<?php
class Database {
  private $conn;

  public function __construct() {
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "wikis";

      try {
          $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //   echo "Connected successfully";
      } catch (PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
      }
  }

  public function getConnection() {
      return $this->conn;
  }
}


?>
