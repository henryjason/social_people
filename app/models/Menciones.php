<?php

class Menciones extends Eloquent
{
    protected $table      = 'menciones';
    protected $fillable   = array('mensaje_id', 'usuario_id', 'created_at', 'estado');
    protected $guarded    = array('id');
    public    $timestamps = false;

 public static function ejemplo()
    {
        return DB::select("select * from music");
    }


    

}
