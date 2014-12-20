<?php

class Lapangan extends Eloquent {
    protected $table = 'lapangan';
    protected $guarded = array();
    public static $rules = array();

    public function jam()
    {
        return $this->belongsToMany('Jam','lapangan_jam');
    }

}
