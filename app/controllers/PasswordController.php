<?php

/**
 * Created by PhpStorm.
 * User: achmadfatoni
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

    public function getUpdate()
    {
        return Input::all();
    }

}