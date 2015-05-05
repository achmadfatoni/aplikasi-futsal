<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 1/11/15
 * Time: 20:18
 * Location : 
 */

class HistoryController extends BaseController{

    private $booking;
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }
    public function getIndex()
    {
        $customerId = Auth::user()->user_identity;
        $list = $this->booking
            ->with('lapangan')
            ->with('jam')
            ->where('customer_id', '=', $customerId)
            ->get();
        $data = array(
            'list' => $list,
        );
        return View::make('history.index', $data);
    }
}