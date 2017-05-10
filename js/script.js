$(document).ready(function(){
  //Mostrar carregando
  $('#loaderImage').show();

  //Mostrar carregando Editar
  $('#loaderImageEdit').show();

  //Mostrando os conatatos
  showContacts();

  //Mostrando os usuários
  showUsers();

  //Adicionar contatos
  $(document).on('submit','#addContact', function(){
    //Mostrar carregando
    $('#loaderImage').show();

    //Inserir contato
    $.post("add_contato.php", $(this).serialize())
    .done(function(data){
      console.log(data);
      $('#addContact').foundation('resetForm');
      $('#addModal').foundation('close');
      showContacts();
    });
    return false;
  });

  //Editar contatos
  $(document).on('submit','#editContact', function(){
    //Mostrar carregando
    $('#loaderImage').show();

    //Editar contato
    $.post("edit_contato.php", $(this).serialize())
    .done(function(data){
      console.log(data);
      $('.editModal').foundation('close');
      showContacts();
    });
    return false;
  });

  //Apagar contatos
  $(document).on('submit','#deleteContact', function(){
    //Mostrar carregando
    $('#loaderImage').show();

    //Apagar contato
    $.post("delete_contato.php", $(this).serialize())
    .done(function(data){
      console.log(data);
      showContacts();
    });
    return false;
  });

  //Adicionar usuário
  $(document).on('submit','#addUser', function(){
    //Mostrar carregando
    $('#loaderImage').show();

    //Inserir usuário
    $.post("add_user.php", $(this).serialize())
    .done(function(data){
      console.log(data);
      $('#addUser').foundation('resetForm');
      $('#userAddModal').foundation('close');
      showContacts();
    });
    return false;
  });

  //Editar usuário
  $(document).on('submit','#editUser', function(){
    //Mostrar carregando
    $('#loaderImage').show();

    //Editar usuário
    $.post("edit_usuario.php", $(this).serialize())
    .done(function(data){
      console.log(data);
      $('.editUserModal').foundation('close');
      showContacts();
    });
    return false;
  });

  //Apagar usuário
  $(document).on('submit','#deleteContact', function(){
    //Mostrar carregando
    $('#loaderImage').show();

    //Apagar usuário
    $.post("delete_contato.php", $(this).serialize())
    .done(function(data){
      console.log(data);
      showContacts();
    });
    return false;
  });

  // Alterar senha do usuário logado
  //Editar senha usuário logado
  $(document).on('submit','#editPassUser', function(){
    //Mostrar carregando
    $('#loaderImage').show();

    //Inserir contato
    $.post("alterar_senha.php", $(this).serialize())
    .done(function(data){
      console.log(data);
      $('.passEditModal').foundation('close');
      showContacts();
    });
    return false;
  });


});

//Função mostrando conatatos
function showContacts(){
  console.log('Mostrando contatos...');
  setTimeout("$('#pageContent').load('contatos.php',function(){$('#loaderImage').hide();})",500);
}

//Função mostrando usuários
function showUsers(){
  console.log('Mostrando usuários...');
  setTimeout("$('#pageUserContent').load('usuarios.php',function(){$('#loaderImageEdit').hide();})",500);
}

// Verificar se senhas são iguais na pág Admin Conatato
function checkEditPass()
{
  //Guardar os campos das senhas em variaveis
  var senha1 = document.getElementById('senha1');
  var senha2 = document.getElementById('senha2');
  //Guardar a mensagem de confirmação
  var message = document.getElementById('confirmMessage');
  //Cores que usaremos
  var goodColor = "#66cc66";
  var badColor = "#ff6666";
  //Comparar as variaveis da senha e campo de confirmação
  if(senha1.value == senha2.value){
    //Os campos são iguais
    senha2.style.backgroundColor = goodColor;
    message.style.color = goodColor;
    message.innerHTML = "Senhas iguais!"
  }else{
    //As senhas não são iguais
    senha2.style.backgroundColor = badColor;
    message.style.color = badColor;
    message.innerHTML = "As senhas não são iguais!"
  }
}

// Verificar se senhas são iguais na pá Admin Usuários
function checkPass()
{
  //Guardar os campos das senhas em variaveis
  var senha1 = document.getElementById('senha1');
  var senha2 = document.getElementById('senha2');
  //Guardar a mensagem de confirmação
  var message = document.getElementById('confirmMessage');
  //Cores que usaremos
  var goodColor = "#66cc66";
  var badColor = "#ff6666";
  //Comparar as variaveis da senha e campo de confirmação
  if(senha1.value == senha2.value){
    //Os campos são iguais
    senha2.style.backgroundColor = goodColor;
    message.style.color = goodColor;
    message.innerHTML = "Senhas iguais!"
  }else{
    //As senhas não são iguais
    senha2.style.backgroundColor = badColor;
    message.style.color = badColor;
    message.innerHTML = "As senhas não são iguais!"
  }
}

function checkPassEdit1()
{
  //Guardar os campos das senhas em variaveis
  var senha1 = document.getElementById('senhaEd1');
  var senha2 = document.getElementById('senhaEd2');
  //Guardar a mensagem de confirmação
  var message = document.getElementById('confirmEdMessage');
  //Cores que usaremos
  var goodColor = "#66cc66";
  var badColor = "#ff6666";
  //Comparar as variaveis da senha e campo de confirmação
  if(senha1.value == senhaEd2.value){
    //Os campos são iguais
    senha2.style.backgroundColor = goodColor;
    message.style.color = goodColor;
    message.innerHTML = "Senhas iguais!"
  }else{
    //As senhas não são iguais
    senha2.style.backgroundColor = badColor;
    message.style.color = badColor;
    message.innerHTML = "As senhas não são iguais!"
  }
}
