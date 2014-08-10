<?php

class Menciones extends Eloquent
{
    protected $table      = 'menciones';
    protected $fillable   = array('mensaje_id', 'usuario_id', 'created_at', 'estado');
    protected $guarded    = array('id');
    public    $timestamps = false;

public static function mencion_existe($id_msg, $id_user) {

return DB::select("select m.id from menciones m where m.mensaje_id = $id_msg and m.usuario_id = $id_user");
}
    

}
