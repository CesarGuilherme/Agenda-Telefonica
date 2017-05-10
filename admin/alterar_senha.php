<?php
include('../config/class.database.php');

//Criar objeto de DB
$db = new Database();

//Executar query de atualização
$db->query("UPDATE Usuarios SET senha = :senha WHERE ID = :id");

  //Vincular valores
  $db->bind(':senha' , $db->make_hash($_POST['senha']));
  $db->bind(':id' , $_POST['id']);

  //Executar
  if($db->execute()){
    echo "Atualizado!";
  } else {
    echo "Não atualizado!";
  }

 ?>
