<?php

class Hashtag extends Eloquent
{
    protected $table      = 'hashtag';
    protected $fillable   = array('mensaje_id', 'hashtag', 'created_at');
    protected $guarded    = array('id');
    public    $timestamps = false;

 public static function ejemplo()
    {
        return DB::select("select * from music");
    }


    

}
