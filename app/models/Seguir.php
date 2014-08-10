<?php

class Seguir extends Eloquent
{
    protected $table      = 'seguir';
    protected $fillable   = array('usuario_id', 'usuario_id_seguir');
    protected $guarded    = array('id');
    public    $timestamps = false;




public static function getSeguir($id_user, $id_seguir) {



  return DB::select("select s.id from seguir s where s.usuario_id = $id_user and s.usuario_id_seguir = $id_seguir");

}


public static function estado_seguir($id_user, $id_seguir) {

 return DB::select("select exists (select true from seguir s where s.usuario_id = $id_user and s.usuario_id_seguir = $id_seguir)");


}

public static function usuario_me_siguen($id_user) {

 return DB::select("select *
from seguir s where s.usuario_id_seguir = $id_user order by s.id DESC");


}



}

