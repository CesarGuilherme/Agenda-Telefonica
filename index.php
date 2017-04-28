<?php include('config/class.database.php'); ?>
<html class="no-js" lang="pt_br" dir="ltr">
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


	<div class="row">
	  <div class="large-12 columns">
	    <table id="contato" class="display">
	      <thead>
	        <tr>
						<th width="150px">Campus</th>
	          <th width="150px">Setor</th>
	          <th width="150px">Função</th>
	          <th width="200px">Nome</th>
	          <th width="130px">Telefone</th>
	          <th width="250px">Observações</th>
	        </tr>
	      </thead>
	      <tbody>
	        <?php
						$db = new Database();

						$db->query("SELECT * FROM Contatos");

		        $contatos = $db->selectMutiple();

						foreach ($contatos as $contato) :
					?>
	        <tr>
	          <td><?php echo $contato->Campus ?> </td>
	          <td><?php echo $contato->Setor; ?></td>
	          <td><?php echo $contato->Funcao; ?></td>
	          <td><?php echo $contato->Nome; ?></td>
	          <td><?php echo $contato->Telefone; ?></td>
	          <td><?php echo $contato->Observacao; ?></td>
	        </tr>
	      <?php endforeach; ?>
	      </tbody>
	    </table>
	  </div>
	</div>

	<script src="js/jquery.js"></script>
  <script src="js/script-min.js"></script>
	<script src="js/vendor/what-input.js"></script>
  <script src="js/vendor/foundation.js"></script>
	<script src="js/jquery.dataTables.js"></script>
	<script src="js/dataTables.rowGroup.js"></script>
	<script src="js/dataTables.foundation.js"></script>
	<script src="js/app.js"></script>
	<script>
	$('#contato').dataTable( {
		"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json"},
	  "columnDefs": [
	           { "visible": false, "targets": 0 }
	       ],
	    order: [[2, 'asc']],
	    "displayLength": 25,
	    rowGroup: {
	        dataSrc: 0
	    }
	} );
	</script>
	</div>
	</body>

	</html>
