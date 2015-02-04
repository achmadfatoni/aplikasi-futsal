<?php

class LoginController extends BaseController{
    public function postSignIn() {
        $username = Input::get('username');
        $password = Input::get('password');
        if(Auth::attempt(array('username'=> $username,'password'=>$password))){
            return Redirect::to('booking');
        }else{
            return Redirect::to('booking')->with('error', 'Kombinasi Username dan password salah');
        }
    }

    public function getSignOut(){
        Auth::logout();
        return Redirect::to('/');
    }
} 