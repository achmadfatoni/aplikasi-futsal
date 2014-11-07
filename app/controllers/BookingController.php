<?php

class BookingController extends BaseController
{
    public function getIndex(){
        return View::make('booking.index');
    }
}