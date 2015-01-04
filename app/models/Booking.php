<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Booking extends Eloquent {

	use SoftDeletingTrait;
	protected $table = 'booking';
	protected $guarded = array();
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
