<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 11/8/2014
 * Time: 12:05 AM
 */

class AdminController extends BaseController{
    public function __construct()
    {
        $this->beforeFilter('auth');
        $this->beforeFilter('admin');
    }

    public function getIndex(){
        return View::make('admin.index');
    }

} 