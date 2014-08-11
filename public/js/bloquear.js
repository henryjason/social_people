$(document).ready(function() {


$("#bloquear").on('click', function () {

    $.ajax({
    url: '/bloquear',
    type: 'POST',
    data: {id_user:id_user, id_bloquear:id_seguir},
  })
  .done(function(response) {

console.log(response);

  if(response[0].exists){
     $("#bloquear").html('Bloqueado');
     $("#seguir").html('Seguir'); 
      $("#solicitud").html('Enviar Solicitud'); 
     $("#seguir").hide();
     $("#solicitud").hide();
   }else{
     $("#bloquear").html('Desbloqueado');
      $("#seguir").show();
      $("#solicitud").show();
   }




  })
  .fail(function(response) {
      console.log(response);
  });


	
}); //fin #seguir


if(id_user != 0){


$.ajax({
    url: '/estado_bloqueo',
    type: 'POST',
    data: {id_user:id_user, id_bloquear:id_seguir},
  })
  .done(function(response) {

console.log(response);

  if(response[0].exists){
     $("#bloquear").html('Bloqueado'); 
     $("#seguir").html('Seguir');
     $("#solicitud").html('Enviar Solicitud');
      $("#seguir").hide();
      $("#solicitud").hide();
   }else{
     $("#bloquear").html('Desbloqueado');
     $("#seguir").show();
     $("#solicitud").show();
   }




  })
  .fail(function(response) {
      console.log(response);
  });

} // fin if


});
