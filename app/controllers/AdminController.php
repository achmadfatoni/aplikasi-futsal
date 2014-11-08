<?php
/**
 * Created by PhpStorm.
 * User: Achmad Fatoni
 * Date: 11/8/2014
 * Time: 12:05 AM
 */

class AdminController extends BaseController{
    public function getIndex(){
        return View::make('admin.index');
    }



} 