<?php

class BookingController extends BaseController
{
    public function getIndex(){
        $data = array(
            'actionLogin' => URL::to('login/sign-in'),
        );
        return View::make('booking.index', $data);
    }
}