<!DOCTYPE html>
<html>
<head>


	<title>{{ $titulo }}</title>
     {{HTML::script('js/jquery.js');}}
      {{HTML::script('js/bootstrap.min.js');}}
      {{HTML::script('js/hums.js');}}

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/full.css" rel="stylesheet">


</head>
<body>
	{{ $content }}
</body>
</html>