<?php

class Hashtag extends Eloquent
{
    protected $table      = 'hashtag';
    protected $fillable   = array('mensaje_id', 'hashtag', 'created_at');
    protected $guarded    = array('id');
    public    $timestamps = false;


public static function getHashtag($hashtag)
    {

  return DB::select("select h.id, h.mensaje, h.created_at, u.nombre, u.nickname, ha.hashtag
from hashtag ha 
     INNER join hums h on(h.id = ha.mensaje_id and ha.hashtag like '%".$hashtag."')
     INNER join users u on(h.usuario_id = u.id)
     order by h.id DESC");



}



}

