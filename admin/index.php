 <?php

session_start();

require '../config/class.database.php';

$db = new Database();

$idUsuario = $_SESSION['user_id'];

$db->query("SELECT * FROM Usuarios WHERE '$idUsuario'");

$usuario = $db->selectSingle();

 ?>
<!DOCTYPE html>
<html class="no-js" lang="pt_br" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Administrar Agenda de telefones UniCEUB</title>

	<link rel="stylesheet" href="/css/foundation.min.css">
	<link rel="stylesheet" href="/css/custom.css">
	<link rel="stylesheet" href="/css/app.css">
	<link rel="stylesheet" href="/css/dataTables.foundation.css">
	<link rel="stylesheet" href="/css/rowGroup.foundation.css">


</head>
<body>
		<?php if ($db->isLoggedIn()): ?>
		<div class="row">
			<div class="large-6 columns">
				<h1>Administrar Agenda de telefones UniCEUB</h1>
				<p>Bem-vindo ao seu painel, <?php echo $_SESSION['user_name']; ?><?php if ($_SESSION['user_type'] == "Administrador") { echo ' | <a href="admin_usuario.php">Administrar usuário</a> '; } ?> | <a href="#" data-pass-id="<?php echo $pass; ?>" data-open="passEditModal<?php echo $usuario->id; ?>">Alterar minha senha</a> | <a href="logout.php">Sair</a></p>
			</div>
			<div class="large-6 columns">
				<a class="add-btn secondary button right small" data-open="addModal" data-overlay="false">Adicionar Contato</a>
        <!-- Modal Editar Senha -->
        <div id="passEditModal<?php echo $usuario->id; ?>" data-cid = "<?php echo $usuario->id; ?>" class="passEditModal reveal" data-reveal>
            <button class="close-button" data-close aria-label="Close modal" type="button">
              <span aria-hidden="true">&times;</span>
            </button>
            <h1>Alterar Senha</h1>
            <form id="editPassUser" action="#" method="post">
              <div class="row">
                <div class="large-6 columns">
                  <lable>Senha<input name="senha" id="senha1" type="password" placeholder="Senha"></lable>
                  <span id="confirmMessage" class="confirmMessage"></span>
                </div>
                <div class="large-6 columns">
                  <lable>Confirmar senha<input name="senha2" id="senha2" type="password" placeholder="Confirmar senha" onkeyup="checkPass(); return false;"></lable>
                </div>
                <input type="hidden" name="id" value="<?php echo $usuario->id; ?>">
                <input name="submit" type="submit" class="add-btn button right small alert" value="Alterar">
              </form>
            </div>
        </div>
        <!-- Modal Adicionar Contato -->
				<div id="addModal" class="reveal" data-reveal>
					<button class="close-button" data-close aria-label="Close modal" type="button">
						<span aria-hidden="true">&times;</span>
					</button>
					<h1>Adicionar Contato</h1>
					<form id="addContact" method="post" data-abide novalidate>
						<div class="row">
							<div class="large-6 columns">
								<lable>Campus<input name="campus" type="text" placeholder="Campus"></lable>
							</div>
							<div class="large-6 columns">
								<lable>Setor<input name="setor" type="text" placeholder="Setor"></lable>
							</div>
						</div>
						<div class="row">
							<div class="large-6 columns">
								<lable>Função<input name="funcao" type="text" placeholder="Função"></lable>
							</div>
							<div class="large-6 columns">
								<lable>Nome<input name="nome" type="text" placeholder="Nome"></lable>
							</div>
						</div>
						<div class="row">
							<div class="large-6 columns">
								<lable>Telefone
									<input name="telefone" type="tel" placeholder="Telefone">
								</lable>
							</div>
							<div class="large-6 columns">
								<lable>Observação
									<textarea name="observacao" placeholder="Observação"></textarea>
								</lable>
							</div>
							<input name="submit" type="submit" class="add-btn button right small" value="Adicionar">
						</form>
					</div>
				</div>
			</div>

			<!-- Imagem Carregando -->
			<div id="loaderImage">
				<img src="/images/ajax-loader.gif">
			</div>

			<!-- Conteudo principal -->
			<div id="pageContent"></div>

			<!-- Fim Conteúdo principal -->
	<?php else: ?>

	<div class="row column align-center medium-6 large-4 container-padded">
		<form id="loginAdmin" class="log-in-form" action="login.php" method="post">
			<h1 class="text-center">Login Agena de telefones UniCEUB</h1>
      <?php
            if ($_SESSION['msgError'] != "") {
                echo '<div class="callout alert" data-closable><strong>Error: </strong> ' . $_SESSION['msgError'] . '</div>';
            }
      ?>
			<input type="text" name="username" id="username" placeholder="Usuário/E-mail">
			<br>
			<input type="password" name="password" id="password" placeholder="Senha">
			<input name="btnLogin" class="button expanded alert" type="submit" value="Entrar">
		</form>
	</div>

	<?php endif; ?>



		<script src="/js/jquery.js"></script>
    <script src="/js/script-min.js"></script>
		<script src="/js/vendor/what-input.js"></script>
		<script src="/js/vendor/foundation.js"></script>
		<script src="/js/jquery.dataTables.js"></script>
		<script src="/js/dataTables.rowGroup.js"></script>
		<script src="/js/dataTables.foundation.js"></script>
	</body>
	</html>
