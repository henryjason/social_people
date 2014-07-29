
<?php

class Solicitud extends Eloquent
{
    protected $table      = 'hums';
    protected $fillable   = array('usuario_id', 'mensaje', 'created_at', 'estado');
    protected $guarded    = array('id');
    public    $timestamps = false;

 public static function ejemplo()
    {
        return DB::select("select * from music");
    }


    

}



