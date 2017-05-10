<?php
include('../config/class.database.php');

//Criar objeto de DB
$db = new Database();

if (empty($_POST['senha'])) {
  //Executar query de atualização
  $db->query("UPDATE Usuarios SET
    nome = :nome,
    email = :email,
    tipo = :tipo,
    nomeusuario = :nomeusuario
    WHERE ID = :id");

    //Vincular valores
    $db->bind(':nome' , $_POST['nome']);
    $db->bind(':email' , $_POST['email']);
    $db->bind(':tipo' , $_POST['tipo_usuario']);
    $db->bind(':nomeusuario' , $_POST['nomeusuario']);
    $db->bind(':id' , $_POST['id']);

    //Executar
    if($db->execute()){
      echo "Atualizado!";
    } else {
      echo "Não atualizado!";
    }
}else{
  //Executar query de atualização
  $db->query("UPDATE Usuarios SET
    nome = :nome,
    email = :email,
    senha = :senha,
    tipo = :tipo,
    nomeusuario = :nomeusuario
    WHERE ID = :id");

    //Vincular valores
    $db->bind(':nome' , $_POST['nome']);
    $db->bind(':email' , $_POST['email']);
    $db->bind(':senha' , $db->make_hash($_POST['senha']));
    $db->bind(':tipo' , $_POST['tipo_usuario']);
    $db->bind(':nomeusuario' , $_POST['nomeusuario']);
    $db->bind(':id' , $_POST['id']);

    //Executar
    if($db->execute()){
      echo "Atualizado!";
    } else {
      echo "Não atualizado!";
    }
}

 ?>
