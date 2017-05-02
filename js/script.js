$(document).ready(function(){
  //Mostrar carregando
  $('#loaderImage').show();

  //Mostrando os conatatos
  showContacts();

  //Adicionar contatos
  $(document).on('submit','#addContact', function(){
    //Mostrar carregando
      $('#loaderImage').show();

    //Inserir contato
    $.post("add_contato.php", $(this).serialize())
      .done(function(data){
        console.log(data);
        $('#addModal').foundation('close');
        showContacts();
    });
    return false;
  });
});

//Função mostrando conatatos
function showContacts(){
  console.log('Mostrando contatos...');
  setTimeout("$('#pageContent').load('contatos.php',function(){$('loaderImage').hide();})",1000);
}
