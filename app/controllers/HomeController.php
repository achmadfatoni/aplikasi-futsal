<?php

class HomeController extends BaseController
{
    public function getIndex(){
        $promo = Page::find(PAGE_PROMO);
        $data = array(
            'promo' => $promo->contents,
        );
        return View::make('home.index', $data);
    }
}