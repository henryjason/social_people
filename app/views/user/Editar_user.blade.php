<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->


{{HTML::script('js/aceptar_rechachar_solicitud.js');}}


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

  <div class="col-xs-12 col-sm-3 col-md-3">

           <div class="row">
              <div class="col-md-12">

                    <div class="panel-heading text-rigth">
                     

                     <img id="editar_avatar" src="/{{Auth::user()->getAvatar()}}" alt="@henryjason" width="100" height="100" class="img-circle">
                    

                    </div>


                    <div class="panel-heading text-rigth"><a href="/editar_perfil">{{Auth::user()->getNickName();}}</a></div>

                  
                </div>

          </div>

  </div>

  <div class="col-xs-12 col-sm-9 col-md-9">

    <div class="col-md-9">
    <br>

  <div align="center"><h2>Editar Perfil</h2></div>
      <br>

      @if ($errors->has())
    <div class="alert-danger text-center" role="alert">
        <small>{{ $errors->first('email') }}</small>
        <small>{{ $errors->first('password') }}</small>
        <small>{{ $errors->first('invalid_credentials') }}</small>
    </div>
@endif

<form role="form" method="post" action="editarperfil" >


   <div class="row">   <!-- /.row  usuario-->


       <div class="col-xs-12 col-sm-6">  <!-- /.nombre_registro-->

       <div class="form-group">
           <label for="nombre_registro">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{Auth::user()->getNombre()}}" 
           placeholder="Nombre">
        </div>

    </div>

    <div class="col-xs-12 col-sm-6">  <!-- /.apellido_registro-->

      <div class="form-group">
         <label for="apellido_registro">Apellido</label>
        <input type="text" class="form-control" name="apellido" value="{{Auth::user()->getApellido()}}" 
          placeholder="Apellido">
      </div>

  </div>

  <div class="col-xs-12 col-sm-12"> <!-- /.nickname_registro-->

      <div class="form-group">
         <label for="nickname_registro">nickname</label>
        <input type="text" class="form-control" name="nickname" value="{{substr(Auth::user()->getNickName(), 1 )}}" 
          placeholder="nickname">
      </div>

  </div>

    
    <?php 

    if(Auth::user()->getType() == 1){

  echo  '<div class="col-xs-12 col-sm-12"> <!-- /.email_registro-->'.

      '<div class="form-group">'.
         '<label for="apellido_registro">Correo Electronico</label>'.
        '<input type="email" class="form-control" name="email" value="'.Auth::user()->getEmail().'"'.
          'placeholder="Correo Electronico">'.
      '</div>'.

  '</div>';

    }


   ?>

   <div class="col-xs-12 col-sm-12"> <!-- /.email_registro-->

      <div class="form-group">
         <label  for="telefono_registro">Telefono</label>
        <input type="text" class="form-control" name="telefono" value="{{Auth::user()->getTelefono()}}" 
          placeholder="Telefono">
      </div>

  </div>

   <div class="col-xs-12 col-sm-12"> <!-- /.email_registro-->

      <div class="form-group">
         <label for="telefono_registro">Direcciòn</label>
        <input type="text" class="form-control" name="direccion" value="{{Auth::user()->getDireccion()}}" 
          placeholder="Direcciòn">
      </div>

  </div>

   <div class="col-xs-12 col-sm-12"> <!-- /.email_registro-->

      <div class="form-group">
         <label for="telefono_registro">Bibliografìa</label>
        <input type="text" class="form-control" name="bibliografia" value="{{Auth::user()->getBibliografia()}}" 
          placeholder="Bibliagrafìa">
      </div>

  </div>


  <?php 

    if(Auth::user()->getType() == 1){

  echo  '<div class="col-xs-12 col-sm-12"><!-- /.password_registro-->'.
      '<div class="form-group">'.
         '<label for="password_registro">Contraseña</label>'.
        '<input type="password" class="form-control" name="password"'. 
          'placeholder="Contraseña">'.
      '</div>'.
  '</div>'.
   '<div class="col-xs-12 col-sm-12"><!-- /.password_registro-->'.

      '<div class="form-group">'.
         '<label for="password_again_registro">Repita la Contraseña</label>'.
        '<input type="password" class="form-control" name="password_confirmation"'.
          'placeholder="Repita la Contraseña">'.
      '</div>'.
  '</div>';

      }


   ?>


<div class="col-md-12">


   <button type="submit" class="btn btn-default">Actualizar</button>
   <button type="clear" class="btn btn-default">Limpiar</button>

</div>



  </div>  <!-- /.fin row usuario -->

  </form>

</div><!-- fin registro  usuario -->      

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
