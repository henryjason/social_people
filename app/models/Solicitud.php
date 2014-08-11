
<?php

class Solicitud extends Eloquent
{
    protected $table      = 'solicitud';
    protected $fillable   = array('usuario_id', 'usuario_id_solicitud', 'estado');
    protected $guarded    = array('id');
    public    $timestamps = false;


public static function getSolicitud($id_user, $id_solicitud) {



  return DB::select("select s.id from solicitud s where s.usuario_id = $id_user and s.usuario_id_solicitud = $id_solicitud");

}



public static function estado_solicitud($id_user, $id_solicitud) {

 return DB::select("select exists (select true from solicitud s where s.usuario_id = $id_user and s.usuario_id_solicitud = $id_solicitud)");


}

public static function usuario_con_solicitud($id_user) {

 return DB::select("select *
from solicitud s where s.usuario_id_solicitud = $id_user and s.estado = 1 order by s.id DESC");


}



//traemos los usuarios

public static function get_solicitudes($id_user) {

 return DB::select("select s.id, u.nickname
from solicitud s 
INNER join users u on(s.usuario_id = u.id and s.usuario_id_solicitud = $id_user and s.estado = 0)");


}



    

}



