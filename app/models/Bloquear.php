<?php

class Bloquear extends Eloquent
{
    protected $table      = 'bloquear';
    protected $fillable   = array('usuario_id', 'usuario_id_bloqueo');
    protected $guarded    = array('id');
    public    $timestamps = false;

 public static function ejemplo()
    {
        return DB::select("select * from music");
    }


    

}

