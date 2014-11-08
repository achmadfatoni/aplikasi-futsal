<?php
/**
 * Created by PhpStorm.
 * User: Achmad Fatoni
 * Date: 11/8/2014
 * Time: 8:16 PM
 */

class HelpController extends BaseController{

    public function getIndex(){
        if(Auth::check()){
            return $this->admin();
        }else{
            return $this->guest();
        }
    }

    public function admin(){
        return View::make('help.admin');
    }

    public function guest(){

    }

}