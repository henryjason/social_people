<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	protected $fillable   = array('avatar','nombre','apellido','email','nickname','telefono','direccion','bibliografia','password','type');
  	protected $guarded    = array('id');
  	public    $timestamps = false;

    public static function id_user($username)
    {
        return DB::select("select id from users where nickname LIKE %".$username."%");
    }


  public static function getUser($user)
    {

    return DB::select("select DISTINCT u.id, u.nombre, u.avatar,  u.apellido, u.nickname, u.telefono,  u.direccion,  u.bibliografia
    from users u where u.nickname like '%".$user."' ORDER BY u.nickname
    limit 1");



}


    public static function Serch_User($user)
    {

    return DB::select("select DISTINCT u.nickname
    from users u where u.nickname like '%".$user."%' ORDER BY u.nickname
    limit 10");



}
  	

public function getId()
{
  return $this->id;
}

public function getEmail()
{
  return $this->email;
}

public function getPass()
{


  return $this->password;
 
}

public function getNickName()
{
  return $this->nickname;
}

public function getNombre()
{
  return $this->nombre;
}

public function getApellido()
{
  return $this->apellido;
}

public function getAvatar()
{
  return $this->avatar;
}

public function getTelefono()
{
  return $this->telefono;
}

public function getDireccion()
{
  return $this->direccion;
}

public function getBibliografia()
{
  return $this->bibliografia;
}

public function getType()
{
  return $this->type;
}

}
