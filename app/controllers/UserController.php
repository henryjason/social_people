<?php

class UserController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($nick)
    {

        $nick = "@".$nick;
        $array_user = User::getUser($nick);
        $this->layout->titulo = $nick;
        $this->layout->nest('content', 'user.perfil_user', array('userArray' => $array_user, 'user' => $nick));
    }


	private function validationRules()
    {
        // validate the info, create rules for the inputs
        return array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3', // password can only be alphanumeric and has to be greater than 3 characters
           
        );
    }

    public function login()
    {
    	$rules = $this->validationRules();
    	$validator = Validator::make(Input::all(), $rules);

    	if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        }

        $userdata = array(
            'email'     => Input::get('email'),
            'password'  => Input::get('password')
        );

		if (Auth::attempt($userdata)) {
                return Redirect::to('/');
        }

        return Redirect::to('login')->withErrors(array('invalid_credentials' => 'No existe usuario')); 
    }


    public function register()
    {
        $rules = $this->validationRules();
        $rules['password'] = 'required|alphaNum|min:3|Confirmed';
        $rules['password_confirmation'] = 'required|alphaNum|min:3';
         $rules['email'] = 'required|email|unique:users,email';

        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('register')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        }

        $email = Input::get('email');
        $password = Input::get('password');
        $nombre = Input::get('nombre');
        $apellido = Input::get('apellido');
        $nickname = '@'.Input::get('nickname');
        $type = 1;


        $user = new User;

        $user->email = $email;
        $user->password = Hash::make($password);
        $user->nombre = $nombre;
        $user->apellido = $apellido;
        $user->nickname = $nickname;
        $user->avatar = "img/avatar.jpg";
        $user->telefono = "Ø";
        $user->direccion = "Ø";
        $user->bibliografia = "Ø";
        $user->type = $type;
        $user->save();

        Auth::attempt(array('email' => $email, 'password' => $password, 'nombre' => $nombre, 'apellido' => $apellido, 'nickname' => $nickname, 'type' => $type));
        return Redirect::to('/');
    }

    public function isLogged()
    {
        if (Auth::guest()) {
            return Redirect::to('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('login');
    }

    public function serchuser()
    {


      if (Request::ajax())
        {
    
         $user = Input::get('user');

         //array del registro registrado
         $array_user = User::Serch_User($user);
            
            return Response::json($array_user);

        }

    return Redirect::to('/');

    }


       public function fblogin()
    {

         if (Request::ajax())
        {
    
        
        $rules = $this->validationRules();
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            // o si es fail
            return Response::json(0);
        }

        $userdata = array(
            'email'     => Input::get('email'),
            'password'  => Input::get('password')
        );

        if (Auth::attempt($userdata)) {
                 // 1 si se loguea
                 return Response::json(1);

           // si el usuario no esta registrado     
        }else{

        $email = Input::get('email');
        $password = Input::get('password');
        $nombre = Input::get('nombre');
        $apellido = Input::get('apellido');
        $nickname = '@'.Input::get('nickname');
        $type = Input::get('type');


        $user = new User;

        $user->email = $email;
        $user->password = Hash::make($password);
        $user->nombre = $nombre;
        $user->apellido = $apellido;
        $user->nickname = $nickname;
        $user->avatar = "img/avatar.jpg";
        $user->telefono = "Ø";
        $user->direccion = "Ø";
        $user->bibliografia = "Ø";
        $user->type = 2;
        $user->save();
 

  Auth::attempt(array('email' => $email, 'password' => $password, 'nombre' => $nombre, 'apellido' => $apellido, 'nickname' => $nickname, 'type' => $type));
       
        return Response::json(1);

        }



        }

    return Redirect::to('/');


    }


        public function editar_perfil()
    {

$type =  Auth::user()->getType();
  
           if($type==1){

        $rules = $this->validationRules();
        $rules['password'] = 'required|alphaNum|min:3|Confirmed';
        $rules['password_confirmation'] = 'required|alphaNum|min:3';

        $validator = Validator::make(Input::all(), $rules);

     // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('/editar_perfil')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        }

        $email = Input::get('email');
        $password = Input::get('password');
        $nombre = Input::get('nombre');
        $apellido = Input::get('apellido');
        $telefono = Input::get('telefono');
        $direccion = Input::get('direccion');
        $bibliografia = Input::get('bibliografia');
        $nickname = '@'.Input::get('nickname');
        


        $user = User::findOrFail(Auth::user()->getId());

        $user->email = $email;
        $user->password = Hash::make($password);
        $user->nombre = $nombre;
        $user->apellido = $apellido;
        $user->nickname = $nickname;
        $user->telefono = $telefono;
        $user->direccion = $direccion;
        $user->bibliografia = $bibliografia;
        $user->type =$type;
        $user->save();


   
  Auth::attempt(array('email' => $email, 'password' => $password, 'nombre' => $nombre, 'apellido' => $apellido, 'nickname' => $nickname, 'type' => $type));
   
}else{

        $nombre = Input::get('nombre');
        $apellido = Input::get('apellido');
        $telefono = Input::get('telefono');
        $direccion = Input::get('direccion');
        $bibliografia = Input::get('bibliografia');
        $nickname = '@'.Input::get('nickname');
        


        $user = User::findOrFail(Auth::user()->getId());

        $user->email = Auth::user()->getEmail();
        $user->password = Auth::user()->getPass();
        $user->nombre = $nombre;
        $user->apellido = $apellido;
        $user->nickname = $nickname;
        $user->telefono = $telefono;
        $user->direccion = $direccion;
        $user->bibliografia = $bibliografia;
        $user->type =$type;
        $user->save();


   
  Auth::attempt(array('email' => Auth::user()->getEmail(), 'password' => Auth::user()->getPass(), 'nombre' => $nombre, 'apellido' => $apellido, 'nickname' => $nickname, 'type' => $type));
   


}
       return Redirect::to('/editar_perfil');

    }




}