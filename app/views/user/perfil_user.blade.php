<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<body>
{{HTML::script('js/seguir.js');}}
{{HTML::script('js/bloquear.js');}}
{{HTML::script('js/solicitud.js');}}

{{HTML::script('js/aceptar_rechachar_solicitud.js');}}

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
                   
                    <li id="numSolicitud">
               
      
                    </li>

                    <li>
                       {{HTML::link('/editar_perfil', 'Perfil')}}
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
                     

                     <img id="editar_avatar" src="/{{Auth::user()->getAvatar()}}" alt="@henryjason" width="100" height="100" class="img-circle">
                    

                    </div>


                    <div class="panel-heading text-rigth"><a href="/editar_perfil">{{Auth::user()->getNickName();}}</a></div>

                  
                </div>

          </div>

  </div>

  <div class="col-xs-12 col-sm-8 col-md-9">

          
          <br>



        <div class="row">

        <?php

if(!empty($userArray)){

echo '<div class="col-xs-12 col-sm-5 col-md-6">'.

               '<div class="comentario" >'.

                '<div class="panel-heading text-rigth">'.
                  
                    '<img src="/'.$userArray[0]->avatar.'" alt="@henryjason" width="100" height="100" class="img-circle">'.
                    '<h2>'.$user.'</h2>'.

                    '</div>'.

                
                
               '</div>'.

            '</div>';


              if($userArray[0]->id != Auth::user()->getId()){

            echo '<div class="col-xs-12 col-sm-6 col-md-4">'.

               '<div  class="comentario" >'.

                '<div class="panel-heading text-rigth">'.
                     

                '<button type="button" id="seguir" class="btn btn-default btn-lg btn-block"></button>'.
                '<button type="button" id="solicitud" class="btn btn-default btn-lg btn-block">Solicitud</button>'.
                '<button type="button" id="bloquear" class="btn btn-default btn-lg btn-block"></button>'.

                    '</div>'.
                
               '</div>'.

            '</div>';
            }

}


          ?>

            
        </div>

      <br>
      
           <div id="hums">

  <?php

if(!empty($userArray)){

 foreach ($userArray as $value) {
  
  echo '<div class="row">'.
    '<div class="col-xs-12 col-sm-11 col-md-10">'.

              '<div class="comentario">' .
                 '<h3>'. 'Nombre: ' .  $value->nombre ." ". $value->apellido .'</h3>'.
                 '<h3>'. 'NickName: ' . $value->nickname .'</h3>'.
                 '<h3>'. 'Telefono: ' . $value->telefono .'</h3>'.
                 '<h3>'. 'Direccion: ' . $value->direccion .'</h3>'.
                 '<h3>'. 'Bibliografia: ' . $value->bibliografia .'</h3>'.
              ' </div>'.

            '</div> </div><br> ';


  }

}else{

	echo '<div class="row">'.
    '<div class="col-xs-12 col-sm-11 col-md-10">'.

              '<div class="comentario">' .
                 '<h3>'. 'Alias: ' . $user . " No Existe" .'</h3>'.
              ' </div>'.

            '</div> </div><br> ';


}


 
 
  ?>

           </div>
            

  </div>
 
</div>

</body>



<?php 

if(!empty($userArray)){

echo "<script> var id_user = ".Auth::user()->getId()." </script>";
echo "<script> var id_seguir = ".$userArray[0]->id." </script>";

}else {

echo '<script> var id_user = 0 </script>';
echo '<script> var id_seguir = 0 </script>';

}


 ?>

</html>
