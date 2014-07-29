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
                        {{HTML::link('/', 'Notificaciones')}}
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

                    <div class="panel-heading text-rigth"><strong>Perfil</strong>
                       <ul>
                    	 <li>Henry Jason</li>
                     	 <li>Henry Jason2</li>
                    	 <li>Henry Jason3</li>
                     	 <li>Henry Jason4</li>
                      </ul>

                    </div>

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

                    

                </div>

          </div>

  </div>

  <div class="col-xs-8 col-sm-9">

   <div class="row">


            <div class="col-md-6">
              <button class="btn btn-primary btn-lg btn-block" id="local_click">Pantalla principal</button>
            </div>


            <div class="col-md-6">
              <button class="btn btn-default btn-lg btn-block" id="local_clear">Pantalla principal</button>
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
