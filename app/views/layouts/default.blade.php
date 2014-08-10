<!DOCTYPE html>
<html>
<head>


	<title>{{ $titulo }}</title>
     {{HTML::script('js/jquery.js');}}
     {{HTML::script('js/jquery-ui.js');}}
      {{HTML::script('js/bootstrap.min.js');}}
      {{HTML::script('js/serch.js');}}
      {{HTML::script('js/hums.js');}}
       {{HTML::script('js/avatar.js');}}

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/full.css" rel="stylesheet">

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">

</head>
<body>
	{{ $content }}

  <div id="dialog_editar" title="Edicion Avatar">
 

  <div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">


     {{ Form::open(array(
     'url'=>'editarAvatar/', 
     'method' => 'post',
     'class' => 'pure-form',
     'enctype'=>'multipart/form-data'
     ) )}}


     {{ Form::file('archivo')}}
     <br>



   </div>

   <div class="col-xs-6 col-sm-6 col-md-6">

    {{ Form::submit('Subir', array('class' => "btn btn-default")) }}

    {{ Form::close()}} 

  </div>


  <div class="col-xs-6 col-sm-6 col-md-6">


    {{ Form::open(array('url' => 'deleteAvatar', 'role' => 'form')) }} 
    {{ Form::submit('Delete', array('id' => 'submit', 'class' => "btn btn-default"))}}
    {{ Form::close() }}

  </div>


</div>

</div>
</body>
</html>