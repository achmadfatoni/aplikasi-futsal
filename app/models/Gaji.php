<?php

class Gaji extends Eloquent {
	protected $table = 'gaji';

	protected $guarded = array();

	public static $rules = array();

	public function karyawan()
	{
		return $this->belongsTo('Karyawan');
	}
}
