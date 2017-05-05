<?php
include('config/class.database.php');

//Criar objeto de DB
$db = new Database();

//Executar query de atualização
$db->query("UPDATE Contatos SET
  Campus = :campus,
  Setor = :setor,
  Funcao = :funcao,
  Nome = :nome,
  Telefone = :telefone,
  Observacao = :observacao
  WHERE ID = :id");

  //Vincular valores
  $db->bind(':campus' , $_POST['campus']);
  $db->bind(':setor' , $_POST['setor']);
  $db->bind(':funcao' , $_POST['funcao']);
  $db->bind(':nome' , $_POST['nome']);
  $db->bind(':telefone' , $_POST['telefone']);
  $db->bind(':observacao' , $_POST['observacao']);
  $db->bind(':id' , $_POST['id']);

  //Executar
  if($db->execute()){
    echo "Atualizado!";
  } else {
    echo "Não atualizado!";
  }

 ?>
