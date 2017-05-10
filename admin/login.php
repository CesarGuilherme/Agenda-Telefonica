<?php

// inclui o arquivo de inicialização
require '../config/class.database.php';

$db = new Database();

// check Login request
if (!empty($_POST['btnLogin'])) {

   $username = trim($_POST['username']);
   $password = trim($_POST['password']);

   if ($username == "") {
     session_start();
     $login_error_message = 'Campo usuário em branco!';
     $_SESSION['msgError'] = $login_error_message;
     header("Location: index.php");
   } else if ($password == "") {
     session_start();
     $login_error_message = 'Campo de senha em branco!';
     $_SESSION['msgError'] = $login_error_message;
       header("Location: index.php");
   } else {
     // cria o hash da senha
     $password = $db->make_hash($password);

    // Query
     $db->query("SELECT id, nome, tipo FROM Usuarios WHERE (nomeusuario = :username OR email = :username) AND senha = :password");

     // //Vincular valores
     $db->bind(':username' , $username);
     $db->bind(':password' , $password);

     $db->execute();

     $usuario = $db->selectMutiple();


     if (!empty($usuario)){
       // pega o primeiro usuário
       $usuario = $usuario[0];

       session_start();
       $_SESSION['logged_in'] = true;
       $_SESSION['user_id'] = $usuario->id;
       $_SESSION['user_type'] = $usuario->tipo;
       $_SESSION['user_name'] = $usuario->nome;
       //
       header('Location: index.php');
     } else {
       session_start();
       $login_error_message = 'Login ou senha invalidos!';
       $_SESSION['msgError'] = $login_error_message;
       header('Location: index.php');
     }

   }
}
