<?php

class LoginController extends BaseController{
    public function postSignIn() {
        $username = Input::get('username');
        $password = Input::get('password');
        if(Auth::attempt(array('username'=> $username,'password'=>$password))){
            if(Auth::user()->role_id == USER_SILVER){
                Auth::logout();
                return Redirect::to('booking')->with('error', 'Anda terdaftar sebagai Customer SILVER silahkan upgrade ke GOLD agar bisa booking secara online');
            }
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