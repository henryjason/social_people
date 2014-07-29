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

                  {{HTML::link('/', 'Social People')}}
				 <!-- <input type="text" >
              <button type="button">Buscar</button> -->



          </div>


      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
      <li>
          <a href="register">Registrar</a>
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

  
<div class="col-xs-12 col-sm-5">

<br>

 <form role="form" method="post" action="login">

  <div class="row">

     <div class="col-md-6">

      <div class="form-group">
          <label class="sr-only" for="ejemplo_email_2">Email</label>
          <input type="email" class="form-control" name="email"
          placeholder="Introduce tu email">
      </div>

  </div>

  <div class="col-md-6">

    <div class="form-group">
       <label class="sr-only" for="ejemplo_password_2">Contraseña</label>
       <input type="password" class="form-control" name="password" 
       placeholder="Contraseña">
   </div>

</div>


</div>



<div class="row">


 <div class="col-md-6">

  <div class="checkbox">
      <label>
        <input type="checkbox"> No cerrar sesión
    </label>

       
</div>
 
 <div>
     <label>
          <a href="#">Olvide la Contraseña</a>
       </label>
 </div>

</div>


<div class="col-md-6">


   <button type="submit" class="btn btn-default">Entrar</button>


</div>


</div>

</form>

@if ($errors->has())
    <div class="alert-danger text-center" role="alert">
        <small>{{ $errors->first('email') }}</small>
        <small>{{ $errors->first('password') }}</small>
        <small>{{ $errors->first('invalid_credentials') }}</small>
    </div>
@endif


<!-- Rwgistrar usuarios -->

<div class="col-md-12">

  <div class="panel-heading text-center"><strong>Registrate Gratis</strong></div>


<form role="form" method="post" action="register" >


   <div class="row">   <!-- /.row  usuario-->


       <div class="col-xs-12 col-sm-4">  <!-- /.nombre_registro-->

       <div class="form-group">
           <label class="sr-only" for="nombre_registro">Nombre</label>
            <input type="text" class="form-control" name="nombre" 
           placeholder="Nombre">
        </div>

    </div>

    <div class="col-xs-12 col-sm-4">  <!-- /.apellido_registro-->

      <div class="form-group">
         <label class="sr-only" for="apellido_registro">Apellido</label>
        <input type="text" class="form-control" name="apellido" 
          placeholder="Apellido">
      </div>

  </div>

  <div class="col-xs-12 col-sm-8"> <!-- /.nickname_registro-->

      <div class="form-group">
         <label class="sr-only" for="nickname_registro">nickname</label>
        <input type="text" class="form-control" name="nickname" 
          placeholder="nickname">
      </div>

  </div>

   <div class="col-xs-12 col-sm-8"> <!-- /.email_registro-->

      <div class="form-group">
         <label class="sr-only" for="apellido_registro">Correo Electronico</label>
        <input type="email" class="form-control" name="email" 
          placeholder="Correo Electronico">
      </div>

  </div>

   <div class="col-xs-12 col-sm-8"><!-- /.password_registro-->

      <div class="form-group">
         <label class="sr-only" for="password_registro">PassWord</label>
        <input type="password" class="form-control" name="password" 
          placeholder="Contraseña">
      </div>

  </div>

   <div class="col-xs-12 col-sm-8"><!-- /.password_registro-->

      <div class="form-group">
         <label class="sr-only" for="password_again_registro">Repita la PassWord</label>
        <input type="password" class="form-control" name="password_confirmation" 
          placeholder="Repita la Contraseña">
      </div>

  </div>


<div class="col-md-12">


   <button type="submit" class="btn btn-default">Registrar</button>
   <button type="clear" class="btn btn-default">Limpiar</button>

</div>



  </div>  <!-- /.fin row usuario -->

  </form>

</div><!-- fin registro  usuario -->



</div>

<div class="col-xs-12 col-sm-7">



   <div class="row">
       <div class="col-md-12">

       <div class="facebook">

           <div><strong>Conectar con facebook</strong></div>

</div>

     </div>



</div>




</div>




<!-- Put your page content here! -->

<!-- jQuery Version 1.11.0 -->
<script src="js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
