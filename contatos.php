<?php include('config/class.select.php'); ?>
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
          <th width="240px">Observações</th>
          <th width="160px">Ação</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($contatos as $contato) :  ?>
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
              <a class="warning button tiny" data-open="editModal<?php echo $contact->ID; ?>" data-contact-id="<?php echo $contact->ID; ?>">Editar</a>
                <!-- Modal Edit -->
              <div id="editModal<?php echo $contact->ID; ?>" data-cid = "<?php echo $contact->ID; ?>" class="reveal" data-reveal>
          				<button class="close-button" data-close aria-label="Close modal" type="button">
          					<span aria-hidden="true">&times;</span>
          				</button>
          				<h1>Editar Contato</h1>
          				<form id="editContact" action="#" method="post">
          					<div class="row">
          						<div class="large-6 columns">
          							<lable>Campus<input name="campus" type="text" placeholder="Campus" value="<?php echo $contact->Campus; ?>"></lable>
          						</div>
          						<div class="large-6 columns">
          							<lable>Setor<input name="setor" type="text" placeholder="Setor" value="<?php echo $contact->Setor; ?>"></lable>
          						</div>
          					</div>
          					<div class="row">
          						<div class="large-6 columns">
          							<lable>Função<input name="funcao" type="text" placeholder="Função" value="<?php echo $contact->Funcao; ?>"></lable>
          						</div>
          						<div class="large-6 columns">
          							<lable>Nome<input name="nome" type="text" placeholder="Nome" value="<?php echo $contact->Nome; ?>"></lable>
          						</div>
          					</div>
          					<div class="row">
          						<div class="large-6 columns">
          							<lable>Telefone
          								<input name="telefone" type="tel" placeholder="Telefone" value="<?php echo $contact->Telefone; ?>">
          							</lable>
          						</div>
          						<div class="large-6 columns">
          							<lable>Observação
          								<textarea name="observacao" placeholder="Observação"><?php echo $contact->Observacao; ?></textarea>
          							</lable>
          						</div>
                      <input type="hidden" name="id" value="<?php echo $contact->ID; ?>">
          						<input name="submit" type="submit" class="add-btn button right small" value="Editar">
          					</form>
          				</div>
              </div>
              <!-- End Modal Edit -->
            </li>
            <li>
              <a href="#" class="alert button tiny" data-open="myModal">Apagar</a>
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
    order: [[2, 'asc']],
    "displayLength": 25,
    rowGroup: {
        dataSrc: 0
    }
} );
</script>
