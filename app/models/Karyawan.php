<?php

class Karyawan extends Eloquent {
    protected $table = 'karyawan';
    protected $guarded = array();
    public static $rules = array();
    
    public function pangkat(){
        return $this->belongsTo('Pangkat', 'pangkat_id');
    }

}
