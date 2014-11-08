<?php
/**
 * Created by PhpStorm.
 * User: Achmad Fatoni
 * Date: 11/8/2014
 * Time: 8:16 PM
 */

class AboutController extends BaseController{

    public function getIndex(){
        if(Auth::check()){
            return $this->admin();
        }else{
            return $this->guest();
        }
    }

    public function admin(){
        return View::make('about.admin');
    }

    public function guest(){

    }

} 