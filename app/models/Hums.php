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
from hums h where h.usuario_id =".$id. " order by h.id DESC");
    }

public static function myHums($id)
    {

    	//return DB::table('hums')->where('usuario_id', $id)->pluck('id');

    	//return DB::table('hums')->select('usuario_id', 'id')->get();

      //  var_dump($user->name);
 return DB::select("select h.id, h.mensaje, h.created_at
from hums h join users u on(h.usuario_id = u.id) where h.usuario_id =".$id. " order by h.id DESC");


    }

    

}



