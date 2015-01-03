<?php

class Booking extends Eloquent {
	protected $table = 'booking';
	protected $guarded = array();
	protected $softDelete = true;
	public static $rules = array();

	public function customer()
	{
		return $this->belongsTo('Customer');
	}

	public function lapangan()
	{
		return $this->belongsTo('Lapangan');
	}

	public function jam()
	{
		return $this->belongsTo('Jam');
	}
}
