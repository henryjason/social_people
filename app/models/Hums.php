<?php

class Hums extends Eloquent
{
    protected $table      = 'hums';
    protected $fillable   = array('usuario_id', 'mensaje', 'created_at', 'estado' );
    protected $guarded    = array('id');
    public    $timestamps = false;

 public static function myHums1($id)
    {

    	//return DB::table('hums')->where('usuario_id', $id)->pluck('id');

    	//return DB::table('hums')->select('usuario_id', 'id')->get();

      //  var_dump($user->name);
return DB::select("select h.id, h.mensaje, h.created_at
from menciones m 
     INNER join hums h on(h.usuario_id = m.usuario_id and h.usuario_id = 2 and m.mensaje_id = h.id)
   order by h.id DESC");

  return DB::select("select h.id, h.mensaje, h.created_at
from hums h 
  INNER join users u on(h.usuario_id = u.id and h.usuario_id = 2)
   INNER join menciones m on(h.usuario_id = m.usuario_id)
   order by h.id DESC");


    }

public static function myHums($id)
    {

  return DB::select("select h.id, h.mensaje, h.created_at, u.nombre, u.nickname
from menciones m 
     INNER join hums h on(m.usuario_id = ".$id." and m.mensaje_id = h.id)
     INNER join users u on(h.usuario_id = u.id)

     order by h.id DESC");



}


}



