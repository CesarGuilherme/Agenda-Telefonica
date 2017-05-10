<?php include('../config/class.database.php'); ?>
<div class="row">
  <div class="large-12 columns table-scroll">
    <table id="usuario">
      <thead>
        <tr>
          <th width="150px">Nome</th>
          <th width="150px">E-mail</th>
          <th width="150px">Tipo</th>
          <th width="200px">Nome Usuário</th>
          <th width="160px">Ação</th>
        </tr>
      </thead>
      <tbody>
        <?php
        //Criar objeto DB
        $db = new Database();
        // Executar a query
        $db->query("SELECT * FROM Usuarios");
        //Atribuir valores
        $usuarios = $db->selectMutiple();
        //Loop para carregar contatos
        foreach ($usuarios as $usuario) :
          ?>
          <tr>
            <td><?php echo $usuario->nome; ?></td>
            <td><?php echo $usuario->email; ?></td>
            <td><?php echo $usuario->tipo; ?></td>
            <td><?php echo $usuario->nomeusuario; ?></td>
            <td>
              <ul class="button-group">
                <li>
                  <a href="#" class="warning button tiny" data-user-id="<?php echo $usuario->id; ?>" data-open="editUserModal<?php echo $usuario->id; ?>">Editar</a>
                  <!-- Modal Edit -->
                  <div id="editUserModal<?php echo $usuario->id; ?>" data-cid="<?php echo $usuario->id; ?>" class="editUserModal reveal" data-reveal>
                    <button class="close-button" data-close aria-label="Close modal" type="button">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h1>Editar Usuário</h1>
                    <form id="editUser" action="#" method="post" data-abide novalidate>
                      <div class="row">
                        <div class="large-6 columns">
                          <lable>Nome<input name="nome" type="text" placeholder="Nome" value="<?php echo $usuario->nome; ?>"></lable>
                        </div>
                        <div class="large-6 columns">
                          <lable>E-mail<input name="email" type="text" placeholder="E-mail" value="<?php echo $usuario->email; ?>"></lable>
                        </div>
                      </div>
                      <div class="row">
                        <div class="large-6 columns">
                          <lable>Nova senha<input name="senha" id="password" type="password" placeholder="Nova senha"></lable>
                        </div>
                        <div class="large-6 columns">
                          <lable>Confirmar nova senha<input name="senha2" type="password" placeholder="Confirmar nova senha" data-equalto="password"></lable>
                          <span class="form-error">
                            Ei, as senhas devem ser iguais!
                          </span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="large-6 columns">
                          <lable>Tipo usuário
                            <select name="tipo_usuario">
                              <option value="Administrador" <?php if ($usuario->tipo == 'Administrador') { echo 'selected';} ?> >Administrador</option>
                              <option value="Editor" <?php if ($usuario->tipo == 'Editor') { echo 'selected';} ?> >Editor</option>
                            </select>
                          </lable>
                        </div>
                        <div class="large-6 columns">
                          <lable>Nome usuário
                            <lable>Nome<input name="nomeusuario" type="text" placeholder="Nome usuário" value="<?php echo $usuario->nomeusuario; ?>"></lable>
                          </lable>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $usuario->id; ?>">
                        <input name="submit" type="submit" class="add-btn button right small" value="Editar">
                      </form>
                    </div>
                  </div>
                  <!-- End Modal Edit -->
                </li>
                <li>
                  <!-- Deletar -->
                  <form id="deleteUser" action="#" method="post">
                    <input type="hidden" name="id" value="<?php echo $usuario->id; ?>" />
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
$('#usuario').DataTable( {
  "language": {
    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json"},
    "columnDefs": [
      { "visible": false, "targets": 2 }
    ],
    order: [[3, 'asc']],
    "displayLength": 25,
    rowGroup: {
      dataSrc: 2
    }
  } );

  $(document).foundation();
  </script>
