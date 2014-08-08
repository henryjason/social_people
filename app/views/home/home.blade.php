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
    <input type="text" class="buscar" id="serch" placeholder="Search #hash, @user" required>

<button type="button" id="buscar" class="buscar">Search</button>


                </div>


                  

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
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

  <div class="col-xs-12 col-sm-4 col-md-3">

           <div class="row">
              <div class="col-md-12">

                    <div class="panel-heading text-rigth">
                     
                    <img src="{{Auth::user()->getAvatar()}}" alt="@henryjason" width="100" height="100" class="img-circle">

                    </div>


                    <div class="panel-heading text-rigth"><strong>{{Auth::user()->getNickName();}}</strong></div>

                    <div class="panel-heading text-rigth"><strong>Seguir</strong>
                     
                      <button type="button" class="btn btn-default btn-lg btn-block">@henryjason</button>
                      <button type="button" class="btn btn-default btn-lg btn-block">@viviana</button>
                      <button type="button" class="btn btn-default btn-lg btn-block">@carlos</button>
                    </div>
                      

                    

                </div>

          </div>

  </div>

  <div class="col-xs-12 col-sm-8 col-md-9">

          
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
   
   GetHums();


  $('#hums_click').click(function() {

 
    if ($("#mensaje").val() !== "") {

        var id = "<?php echo Auth::user()->getId(); ?>" ;
         var nickname = "{{Auth::user()->getNickName();}}" ;
        var mensaje = $("#mensaje").val();
        var estado = $("#estado").val();

        var Data = {id:id,nickname:nickname,mensaje:mensaje,estado:estado}; //Array 

 
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


//recorremos resultados de ajax
for (var i = 0; i < response.length; i++) {

  var final_mensaje = "";

//dividimos el mensaje en palabras separada por espacio
var elem = response[i].mensaje.split(" ");

   //recorremos el array de palabras 
for (var a = 0; a < elem.length; a++) {
    
    //veerficamos si la palabra empieza por #
  
   if(elem[a].substring(0, 1) == "#")
   {
    
    final_mensaje = final_mensaje + "<a href='"  + 'hashtag/'  + elem[a].split("#")[1]  + "'>" + elem[a] + "</a>" +  " ";     

   }else if (elem[a].substring(0, 1) == "@"){

     final_mensaje = final_mensaje + "<a href='"  + 'user/'  + elem[a].split("@")[1]  + "'>" + elem[a] + "</a>" +  " "; 

   }else{

    final_mensaje = final_mensaje + elem[a] + " ";
   }


};

   var $div = $('<div class="row">'+
    '<div class="col-xs-12 col-sm-11 col-md-10">'+

              '<div class="comentario">' +
                 '<strong>'+ response[i].nombre + " " + "<a href='"  + 'user/'  + response[i].nickname.split("@")[1]   + "'>" + response[i].nickname + "</a>" +
                 '</strong>'+ '<h5>' + response[i].created_at + '</h5>'+
                   '<p>' + final_mensaje +'</p>'+
              ' </div>'+

            '</div> </div><br> ');


$("#hums").append($div);


      
    };

  })
  .fail(function(response) {
      console.log(response);
  });
  
}// final de crear hums


function GetHums(){

  var id = "<?php echo Auth::user()->getId(); ?>" ;
  var Data = {id:id};

  $.ajax({
    url: '/getHums',
    type: 'POST',
    data: Data,
  })
  .done(function(response) {

$("#hums").empty();

//recorremos resultados de ajax
for (var i = 0; i < response.length; i++) {

  var final_mensaje = "";

//dividimos el mensaje en palabras separada por espacio
var elem = response[i].mensaje.split(" ");

   //recorremos el array de palabras 
for (var a = 0; a < elem.length; a++) {
    
    //veerficamos si la palabra empieza por #
  
   if(elem[a].substring(0, 1) == "#")
   {
    
    final_mensaje = final_mensaje + "<a href='"  + 'hashtag/'  + elem[a].split("#")[1]  + "'>" + elem[a] + "</a>" +  " ";     

   }else if (elem[a].substring(0, 1) == "@"){

     final_mensaje = final_mensaje + "<a href='"  + 'user/'  + elem[a].split("@")[1]  + "'>" + elem[a] + "</a>" +  " "; 

   }else{

    final_mensaje = final_mensaje + elem[a] + " ";
   }


};

   
   var $div = $('<div class="row">'+
    '<div class="col-xs-12 col-sm-11 col-md-10">'+

              '<div class="comentario">' +
                 '<strong>'+ response[i].nombre + " " + "<a href='"  + 'user/'  + response[i].nickname.split("@")[1]   + "'>" + response[i].nickname + "</a>" +
                 '</strong>'+ '<h5>' + response[i].created_at + '</h5>'+
                   '<p>' + final_mensaje +'</p>'+
              ' </div>'+

            '</div> </div><br> ');


$("#hums").append($div);


      
    };

  })
  .fail(function(response) {
      console.log(response);
  });
  
}



});

</script>


</body>

</html>
