<?php

session_start();

require '../config/class.database.php';

$db = new Database();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">

        <title>Agenda UniCEUB</title>
    </head>

    <body>

        <h1>Login Agenda UniCEUB</h1>

        <?php if ($db->isLoggedIn()): ?>
            <p>Olá, <?php echo $_SESSION['user_name']; ?>. <a href="panel.php">Painel</a> | <a href="logout.php">Sair</a></p>
        <?php else: ?>
          <h1> Login</h1>

          <form action="login.php" method="post">
              <label for="email">Email: </label>
              <br>
              <input type="text" name="email" id="email">

              <br><br>

              <label for="password">Senha: </label>
              <br>
              <input type="password" name="password" id="password">

              <br><br>

              <input type="submit" value="Entrar">
          </form>
        <?php endif; ?>

    </body>
</html>
