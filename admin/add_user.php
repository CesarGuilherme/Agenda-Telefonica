<?php
include('../config/class.database.php');

//Criar objeto de DB
$db = new Database();

//Executar query de inserir novo contato
$db->query("INSERT INTO Usuarios (nome, email, senha, tipo, nomeusuario) VALUE (:nome, :email, :senha, :tipo, :nomeusuario)");

//Vincular valores
$db->bind(':nome' , $_POST['nome']);
$db->bind(':email' , $_POST['email']);
$db->bind(':senha' , $db->make_hash($_POST['senha']));
$db->bind(':tipo' , $_POST['tipo_usuario']);
$db->bind(':nomeusuario' , $_POST['nomeusuario']);

//Executar
if($db->execute()){
  echo "Adicionado!";
} else {
  echo "Não adicionado!";
}

 ?>
