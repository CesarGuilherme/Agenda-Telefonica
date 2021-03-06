<?php

class Connection {
  //Conectar ao banco de dados
  public $isConn;
  protected $database;

  public function __construct($username = "root", $password = "mysql", $dbname = "agendaDB", $options = []){
    $this->isConn = TRUE;
    try {
      $this->database = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
      $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    } catch (PDOException $e) {
      throw new Exception($e->getMessage());
    }
  }
}
?>
