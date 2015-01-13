<?php

class PeriodeGaji extends Eloquent
{
    protected $table = 'periode_gaji';
	protected $guarded = array();
	protected $fillable = array(
        'bulan',
        'tahun'
    );
	public static $rules = array();
}
