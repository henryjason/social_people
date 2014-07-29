<?php

class Seguir extends Eloquent
{
    protected $table      = 'seguir';
    protected $fillable   = array('usuario_id', 'usuario_id_seguir');
    protected $guarded    = array('id');
    public    $timestamps = false;

 public static function ejemplo()
    {
        return DB::select("select * from music");
    }


    

}


