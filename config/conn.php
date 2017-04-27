<?php
// Define a configuração
// Pode ser incluido no arquivo de configuração do DB
  try {
    $pdo = new PDO("mysql:host=localhost;dbname=agendaDB","root","mysql");
    $pdo->exec("SET NAMES 'utf8';");
  }catch(PDOException $e) {
    echo $e->getMessage();
  }
?>
