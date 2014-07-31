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
	protected $fillable   = array('avatar','nombre','apellido','email','nickname','telefono','dirección','','password');
  	protected $guarded    = array('id');
  	public    $timestamps = false;

public function getId()
{
  return $this->id;
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


}
