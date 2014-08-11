$(document).ready(function() {


$("#solicitud").on('click', function () {

    $.ajax({
    url: '/solicitud',
    type: 'POST',
    data: {id_user:id_user, id_solicitud:id_seguir},
  })
  .done(function(response) {

console.log(response);

  if(response[0].exists){
     $("#solicitud").html('Solicitud enviada');
    
   }else{
     $("#solicitud").html('enviar solicitud'); 
    
   }




  })
  .fail(function(response) {
      console.log(response);
  });


	
}); //fin #seguir


if(id_user != 0){


$.ajax({
    url: '/estado_solicitud',
    type: 'POST',
    data: {id_user:id_user, id_solicitud:id_seguir},
  })
  .done(function(response) {

console.log(response);

  if(response[0].exists){
     $("#solicitud").html('Solicitud enviada');
    
   }else{
     $("#solicitud").html('enviar solicitud'); 
    
   }





  })
  .fail(function(response) {
      console.log(response);
  });

} // fin if


});
