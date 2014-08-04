<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		$this->layout->titulo = 'Social People';
		return $this->layout->nest('content', 'home.home');
	}


    	  public function login()
    {
    	$this->layout->titulo = 'Login';
    	$this->layout->nest('content', 'user.register');
    }

    public function register()
    {
    	$this->layout->titulo = 'Register';
    	$this->layout->nest('content', 'user.register');
    }

    public function editarPerfil()
    {
    	$this->layout->nest('content', 'user.perfil');
    }

}
