$(document).ready(function(){
  //Mostrar carregando
  $('#loaderImage').show();

  //Mostrando os conatatos
  showContacts();

});

//Função mostrando conatatos
function showContacts(){
  console.log('Mostrando contatos...');
  setTimeout("$('#pageContent').load('contatos.php',function(){$('loaderImage').hide();})",1000);
}
