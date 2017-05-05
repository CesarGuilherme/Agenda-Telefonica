<?php include('../config/class.database.php'); ?>
<div class="row">
  <div class="large-12 columns table-scroll">
    <table id="contato">
      <thead>
        <tr>
          <th width="150px">Campus</th>
          <th width="150px">Setor</th>
          <th width="150px">Função</th>
          <th width="200px">Nome</th>
          <th width="130px">Telefone</th>
          <th width="240px">Observações</th>
          <th width="160px">Ação</th>
        </tr>
      </thead>
      <tbody>
        <?php
        //Criar objeto DB
        $db = new Database();
        // Executar a query
        $db->query("SELECT * FROM Contatos");
        //Atribuir valores
        $contatos = $db->selectMutiple();
        //Loop para carregar contatos
        foreach ($contatos as $contato) :
        ?>
        <tr>
          <td><?php echo $contato->Campus; ?></td>
          <td><?php echo $contato->Setor; ?></td>
          <td><?php echo $contato->Funcao; ?></td>
          <td><?php echo $contato->Nome; ?></td>
          <td><?php echo $contato->Telefone; ?></td>
          <td><?php echo $contato->Observacao; ?></td>
          <td>
            <ul class="button-group">
              <li>
              <a href="#" class="warning button tiny" data-contact-id="<?php echo $contato->ID; ?>" data-open="editModal<?php echo $contato->ID; ?>">Editar</a>
                <!-- Modal Edit -->
              <div id="editModal<?php echo $contato->ID; ?>" data-cid = "<?php echo $contato->ID; ?>" class="editModal reveal" data-reveal>
          				<button class="close-button" data-close aria-label="Close modal" type="button">
          					<span aria-hidden="true">&times;</span>
          				</button>
          				<h1>Editar Contato</h1>
          				<form id="editContact" action="#" method="post">
          					<div class="row">
          						<div class="large-6 columns">
          							<lable>Campus<input name="campus" type="text" placeholder="Campus" value="<?php echo $contato->Campus; ?>"></lable>
          						</div>
          						<div class="large-6 columns">
          							<lable>Setor<input name="setor" type="text" placeholder="Setor" value="<?php echo $contato->Setor; ?>"></lable>
          						</div>
          					</div>
          					<div class="row">
          						<div class="large-6 columns">
          							<lable>Função<input name="funcao" type="text" placeholder="Função" value="<?php echo $contato->Funcao; ?>"></lable>
          						</div>
          						<div class="large-6 columns">
          							<lable>Nome<input name="nome" type="text" placeholder="Nome" value="<?php echo $contato->Nome; ?>"></lable>
          						</div>
          					</div>
          					<div class="row">
          						<div class="large-6 columns">
          							<lable>Telefone
          								<input name="telefone" type="tel" placeholder="Telefone" value="<?php echo $contato->Telefone; ?>">
          							</lable>
          						</div>
          						<div class="large-6 columns">
          							<lable>Observação
          								<textarea name="observacao" placeholder="Observação"><?php echo $contato->Observacao; ?></textarea>
          							</lable>
          						</div>
                      <input type="hidden" name="id" value="<?php echo $contato->ID; ?>">
          						<input name="submit" type="submit" class="add-btn button right small" value="Editar">
          					</form>
          				</div>
              </div>
              <!-- End Modal Edit -->
            </li>
            <li>
              <!-- Deletar -->
              <form id="deleteContact" action="#" method="post">
                <input type="hidden" name="id" value="<?php echo $contato->ID; ?>" />
                <input type="submit" class="delete-btn alert button tiny" value="Apagar" />
              </form>
              <!-- End Deletar -->
            </li>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<script>
$('#contato').DataTable( {
  "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json"},
  "columnDefs": [
           { "visible": false, "targets": 0 }
       ],
    order: [[3, 'asc']],
    "displayLength": 25,
    rowGroup: {
        dataSrc: 0
    }
} );

$(document).foundation();
</script>
