$(document).ready(function() {


$("#seguir").on('click', function () {

    $.ajax({
    url: '/seguir',
    type: 'POST',
    data: {id_user:id_user, id_seguir:id_seguir},
  })
  .done(function(response) {

console.log(response);

  if(response[0].exists){
     $("#seguir").html('Siguiendo'); 
   }else{
     $("#seguir").html('Seguir');
   }




  })
  .fail(function(response) {
      console.log(response);
  });


	
}); //fin #seguir


if(id_user != 0){


$.ajax({
    url: '/estado_seguir',
    type: 'POST',
    data: {id_user:id_user, id_seguir:id_seguir},
  })
  .done(function(response) {

console.log(response);

  if(response[0].exists){
     $("#seguir").html('Siguiendo'); 
   }else{
     $("#seguir").html('Seguir');
   }




  })
  .fail(function(response) {
      console.log(response);
  });

} // fin if


});
