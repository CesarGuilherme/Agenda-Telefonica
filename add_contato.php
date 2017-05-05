<?php
include('config/class.database.php');

//Criar objeto de DB
$db = new Database();

//Executar query de inserir novo contato
$db->query("INSERT INTO Contatos (Campus, Setor, Funcao, Nome, Telefone, Observacao) VALUE (:campus, :setor, :funcao, :nome, :telefone, :observacao)");

//Vincular valores
$db->bind(':campus' , $_POST['campus']);
$db->bind(':setor' , $_POST['setor']);
$db->bind(':funcao' , $_POST['funcao']);
$db->bind(':nome' , $_POST['nome']);
$db->bind(':telefone' , $_POST['telefone']);
$db->bind(':observacao' , $_POST['observacao']);

//Executar
if($db->execute()){
  echo "Adicionado!";
} else {
  echo "Não adicionado!";
}

 ?>
