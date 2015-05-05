<?php

/**
 * Created by PhpStorm.
 * User: m
 * Date: 1/11/15
 * Time: 19:02
 * Location : app/controllers/PasswordController.php
 */
class PasswordController extends BaseController
{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getIndex()
    {
        $data = array(
            'action' => URL::to('password/update')
        );
        return View::make('password.index', $data);
    }

    public function postUpdate()
    {
        $oldPassword = Input::get('passwordLama');
        $currentPassword = Auth::user()->password;
        $newPassword = Hash::make(Input::get('passwordBaru'));
        $check = Hash::check($oldPassword, $currentPassword);
        if($check){
            $user = User::findOrFail(Auth::user()->id);
            $update = $user->update(array(
                'password' => $newPassword,
            ));
            if($update){
                return Redirect::back()->with('success', 'Password berhasil diperbarui');
            }else{
                return Redirect::back()->with('error', 'Password gagal diperbarui');
            }
        }else{
            return Redirect::back()->with('error', 'Password lama salah');
        }

    }

}
