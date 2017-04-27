<?php
include("conn.php");

$buscarcontatos = $pdo->prepare("SELECT * FROM Contatos");
$buscarcontatos->execute();
$contatos = $buscarcontatos->fetchAll(PDO::FETCH_OBJ);

?>
