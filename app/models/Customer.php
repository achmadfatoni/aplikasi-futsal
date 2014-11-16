<?php

class Customer extends Eloquent {

    protected $table = 'customers';
    protected $fillable = array(
        'nama',
        'alamat',
        'no_telp',
        'team',
        'jenis_customer',
    );

}
