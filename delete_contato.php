<?php
include('config/class.database.php');

//Criar objeto de DB
$db = new Database();

//Executar query
$db->query("DELETE FROM Contatos WHERE ID = :id");

// Vincular Valores
$db->bind(':id', $_POST['id']);

if($db->execute()){
  echo "Deletado!";
} else {
  echo "Não foi deletado!";
}

 ?>
