<?php

class DB {
  private $dbHost       = "localhost";
  private $dbUser       = "db_admin";
  private $dbPassword   = "FTaQD3LcCCbxPF4e";
  private  $dbName      = "company_staff_record";
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
}


 ?>
