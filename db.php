<?php

class DB {
  private $dbHost       = "localhost";
  private $dbUser       = "db_admin";
  private $dbPassword   = "FTaQD3LcCCbxPF4e";
  private $dbName       = "company_staff_record";
  private $conn;

  //constructor
  public function __construct() {
    try {
      //dsn = data source name
      $dsn = "mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName;
      $this->conn = new PDO($dsn, $this->dbUser, $this->dbPassword);
      } catch (PDOException $e) {
      die("DB connection failed: " . $e->getMessage());
    }
  }

  public function insertData($name, $position, $email, $startDate) {
    //sql command
    $sql = "INSERT INTO staff_db (name, position, email, startDate) VALUES (:name, :position, :email, :startDate)";
    //statement
    $stmt = $this->conn->prepare($sql);
    //execute the query
    $stmt->execute(['name' => $name, 'position' => $position, 'email' => $email, 'startDate' => $startDate]);
    echo "data inserted";
  }


}


 ?>
