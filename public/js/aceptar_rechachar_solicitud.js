$(document).ready(function() {



  getsolicitud();


function getsolicitud(){

$.ajax({
    url: '/getsolicitud',
    type: 'POST',
    data: {id_user:id_user},
  })
  .done(function(response) {

console.log(response);

var solicitud = '<a data-toggle="dropdown">' +
                       '<span class="badge pull-right">'+response.length+'</span>' +
  
                       'Solicitudes</a>' + 

                       '<ul id="getSolicitud" class="dropdown-menu" role="menu">';



for (var i = 0; i < response.length; i++) {


       solicitud = solicitud +  '<li>'+
                 '<div class="col-md-12">'+
     '<h5>'+response[i].nickname+'</h5>'+
    '<a href="putsolicitud/'+response[i].id+'/1">Aceptar</a>'   + " " +
   '<a href="putsolicitud/'+response[i].id+'/0">Rechazar</a>'   +
'</div>'+'<div>____________________</div>'

                 '</li>';

    };

    solicitud = solicitud +  '</ul>';

   
                     

  $("#numSolicitud").append(solicitud);


  })
  .fail(function(response) {
      console.log(response);
  });

}// fin metodo que solicitud



function aceptarsolicitud() {

 alert();

    };


});
