<?php

class Jam extends Eloquent {
	protected $table = 'jam';
	protected $guarded = array();

	public static $rules = array();

	public function lapangan()
	{
		return $this->belongsToMany('Lapangan', 'lapangan_jam')->withPivot('harga');
	}

	public function booking()
	{
		return $this->hasMany('Booking');
	}
}
