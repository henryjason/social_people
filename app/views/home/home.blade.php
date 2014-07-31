<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="navbar-brand">

                {{HTML::link('/', 'Inicio')}}
                 <!-- <input type="text" >
                  <button type="button">Buscar</button> -->
      
                </div>


            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        {{HTML::link('/', 'Solicitudes')}}
                    </li>
                    <li>
                        {{HTML::link('/', 'Mensajes')}}
                    </li>
                    <li>
                     <a href="/">
                       <span class="badge pull-right">2</span>
                       Notificaciones</a>
      
                    </li>

                    <li>
                       {{HTML::link('/', 'Perfil')}}
                    </li>

                    <li>
        
                 @if (Auth::check())

  {{HTML::link('logout', 'Logout')}}

@else
  {{HTML::link('login', 'Login')}}

@endif
      </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>

        <!-- /.container -->


    </nav>


<div class="row1">

  <div class="col-xs-4 col-sm-3">

           <div class="row">
              <div class="col-md-12">

                    <div class="panel-heading text-rigth">
                     

                    <img src="img/avatar.jpg" alt="@henryjason" width="100" height="100" class="img-circle">

                    </div>


                    <div class="panel-heading text-rigth"><strong>{{Auth::user()->getNickName();}}</strong></div>

                    <div class="panel-heading text-rigth"><strong>Amigos</strong>
                       <ul>
                    	 <li>Henry Jason</li>
                     	 <li>Henry Jason2</li>
                    	 <li>Henry Jason3</li>
                     	 <li>Henry Jason4</li>
                      </ul>

                    </div>

                     <div class="panel-heading text-rigth"><strong>Sugeridos</strong>
                       <ul>
                    	 <li>Henry Jason</li>
                     	 <li>Henry Jason2</li>
                    	 <li>Henry Jason3</li>
                     	 <li>Henry Jason4</li>
                      </ul>

                    </div>

                    

                </div>}

          </div>

  </div>

  <div class="col-xs-8 col-sm-9">

          
          <br>

        <div class="row">
            <div class="col-xs-12 col-sm-11 col-md-10">

               <div class="comentario">
                <strong>Que estas Pensando?</strong>
                
                <textarea id="mensaje" class="form-control" rows="3"></textarea>
                    
                    <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-2">
                    <select id="estado" class="form-control">
                      <option value="0">Pùblico</option>
                      <option value="1">Privado</option>
                      <option value="2">Solo Yo</option>

                      </select>

                     </div>

                     <div class="col-xs-12 col-sm-3 col-md-3">
        
                      <button type="button" id="hums_click" class="btn btn-default">Publicar</button>
                     
                     </div>

                     </div>

               </div>

            </div>
            
        </div>

<br>
      
           <div id="hums">
             

           </div>
            

  </div>
 
</div>


<script type="text/javascript">
  
  $(document).ready(function() {


  $('#hums_click').click(function() {

 
    if ($("#mensaje").val() !== "") {

        var id = "<?php echo Auth::user()->getId(); ?>" ;
        var mensaje = $("#mensaje").val();
        var estado = $("#estado").val();

        var Data = {id:id,mensaje:mensaje,estado:estado}; //Array 

 
StoreHums(Data);
    }else{
      alert("CAMPOS REQUERIDO");
    }

    
  });


function StoreHums(data){
  $.ajax({
    url: '/hums',
    type: 'POST',
    data: data,
  })
  .done(function(response) {

$("#hums").empty();

var nombre = "{{Auth::user()->getNombre();}}";
var apellido = "{{Auth::user()->getApellido();}}";
var usuario = "{{Auth::user()->getNickName();}}";

for (var i = 0; i < response.length; i++) {
   
   var $div = $('<div class="row">'+
    '<div class="col-xs-12 col-sm-11 col-md-10">'+

              '<div class="comentario">' +
                 '<strong>'+ nombre+ " " + usuario +
                 '</strong>'+
                   '<p>' + response[i].mensaje +'</p>'+
              ' </div>'+

            '</div> </div><br> ');


$("#hums").append($div);


      
    };




/*
    var data = [];
    for (var i = 0; i < response.length; i++) {
      data.push(
        [
          response[i].nombre,
          parseFloat(response[i].votos_candidato)
        ]
      );
    };
  */

  })
  .fail(function(response) {
      console.log(response);
  });
  
}



});

</script>



</body>

</html>
