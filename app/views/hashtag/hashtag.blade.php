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
                     

                   <img id="editar_avatar" src="/{{Auth::user()->getAvatar()}}" alt="@henryjason" width="100" height="100" class="img-circle">

                    </div>


                    <div class="panel-heading text-rigth"><strong>{{Auth::user()->getNickName();}}</strong></div>

                  
                </div>

          </div>

  </div>

  <div class="col-xs-12 col-sm-8 col-md-9">

          
          <br>

        <div class="row">


            <div class="col-xs-12 col-sm-11 col-md-10">

               <div class="comentario" >

                <h2>Resultados para  #{{$hash}}</h2>
                
               </div>

            </div>
            
        </div>

      <br>
      
           <div id="hums">



  <?php


  if(!empty($hashtag)){



  foreach ($hashtag as $value) {

    //son las etiquetas que se van a buascar en el array
             $etiqueta  = "@";
             $hashtag = "#";

             $hash_hums = preg_split("/[\s,]+/", $value->mensaje);
              
             $final_mensaje = "";
                
              //recorremos el array 
            foreach ($hash_hums as $key => $hash) {

          
            
                // si la palabra actual considen con un @ procede
            if (strpos($hash,$etiqueta) === 0) {
         
            $final_mensaje = $final_mensaje."<a href='" . url('user/' .substr( $hash , 1 )) ."'>".$hash."</a>". " ";

             } elseif (strpos($hash,$hashtag) === 0) {

               

              $final_mensaje = $final_mensaje."<a href='" . url('hashtag/' .substr( $hash , 1 )) ."'>".$hash."</a>". " ";

            }else{

              $final_mensaje = $final_mensaje.$hash." ";

            }

          }



  
  echo '<div class="row">'.
    '<div class="col-xs-12 col-sm-11 col-md-10">'.

              '<div class="comentario">' .
                 '<strong>'. $value->nombre . " " . "<a href='" . url('user/' .substr( $value->nickname , 1 )) ."'>".$value->nickname."</a>" .
                 '</strong>'. '<h5>' . $value->created_at . '</h5>'.
                   '<p>' . $final_mensaje . '</p>'.
              ' </div>'.

            '</div> </div><br> ';

  }

  }else{

    echo '<div class="row">'.
    '<div class="col-xs-12 col-sm-11 col-md-10">'.

              '<div class="comentario">' .
                 '<strong>'. "hashtag sin Resultadose" .
              ' </div>'.

            '</div> </div><br> ';

  }

  ?>

           </div>
            

  </div>
 
</div>

</body>

</html>
