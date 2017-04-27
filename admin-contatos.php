<!DOCTYPE html>
<html class="no-js" lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Agenda UniCEUB</title>

	<link rel="stylesheet" href="css/foundation.min.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/app.css">
	<link rel="stylesheet" href="css/dataTables.foundation.css">
	<link rel="stylesheet" href="css/rowGroup.foundation.css">


</head>
<body>
	<div class="row">
		<div class="large-6 columns">
			<h1>Agenda UniCEUB</h1>
		</div>
		<div class="large-6 columns">
			<a class="add-btn secondary button right small" data-open="addModal">Adicionar Contato</a>
			<div id="addModal" class="reveal" data-reveal>
				<button class="close-button" data-close aria-label="Close modal" type="button">
					<span aria-hidden="true">&times;</span>
				</button>
				<h1>Adicionar Contato</h1>
				<form id="addContact" method="post">
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
      <img src="images/ajax-loader.gif">
    </div>

    <!-- Conteudo principal -->
		<div id="pageContent"></div>

		<!-- Fim Conteúdo principal -->

		<script src="js/jquery.js"></script>
    <script src="js/script-min.js"></script>
		<script src="js/vendor/what-input.js"></script>
		<script src="js/vendor/foundation.js"></script>
		<script src="js/jquery.dataTables.js"></script>
		<script src="js/dataTables.rowGroup.js"></script>
		<script src="js/dataTables.foundation.js"></script>
		<script src="js/app.js"></script>
	</body>
	</html>
