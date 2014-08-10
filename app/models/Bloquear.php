<?php

class Bloquear extends Eloquent
{
    protected $table      = 'bloquear';
    protected $fillable   = array('usuario_id', 'usuario_id_bloqueo');
    protected $guarded    = array('id');
    public    $timestamps = false;


public static function getbloquear($id_user, $id_bloquear) {



  return DB::select("select b.id from bloquear b where b.usuario_id = $id_user and b.usuario_id_bloqueo = $id_bloquear");

}


public static function estado_bloqueo($id_user, $id_bloquear) {

 return DB::select("select exists (select true from bloquear b where b.usuario_id = $id_user and b.usuario_id_bloqueo = $id_bloquear)");


}


}

