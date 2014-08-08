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
                     

                    <img src="img/avatar.jpg" alt="@henryjason" width="100" height="100" class="img-circle">

                    </div>


                    <div class="panel-heading text-rigth"><strong>{{Auth::user()->getNickName();}}</strong></div>

                  
                </div>

          </div>

  </div>

  <div class="col-xs-12 col-sm-8 col-md-9">

          
          <br>

        <div class="row">

            <div class="col-xs-12 col-sm-5 col-md-6">

               <div class="comentario" >

                <div class="panel-heading text-rigth">
                     

                    <img src="http://www.lapatilla.com/site/wp-content/uploads/2014/02/shakira.jpg" alt="@henryjason" width="100" height="100" class="img-circle">
                    <h2>{{$user}}</h2>

                    </div>

                
                
               </div>

            </div>


            <div class="col-xs-12 col-sm-6 col-md-4">

               <div class="comentario" >

                <div class="panel-heading text-rigth">
                     

                 <button type="button" class="btn btn-default btn-lg btn-block">Seguiendo</button>

                    </div>
                
               </div>

               <div class="comentario" >

                <div class="panel-heading text-rigth">
                     

                  <button type="button" class="btn btn-default btn-lg btn-block">Bloquead@</button>

                    </div>
                
               </div>

            </div>
            
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


}


 
 
  ?>

           </div>
            

  </div>
 
</div>

</body>

</html>
