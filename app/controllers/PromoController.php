<?php

class PromoController extends BaseController{
    public function getIndex(){
        return $this->admin();
    }

    public function admin(){
        $page = Page::find(PAGE_PROMO);
        $data = array(
            'action' => URL::to('promo/save'),
            'contents' => $page->contents,
        );
        return View::make('promo.admin', $data);
    }

    public function postSave(){
        $contents = Input::get('contents');
        $type = PAGE_PROMO;
        $page = Page::find(PAGE_PROMO);
        $page->contents = $contents;
        $page->type = $type;
        if($page->save()){
            return Redirect::to('promo')->with('success', 'Berhasil di perbarui');
        }else{
            return Redirect::to('promo')->with('error', 'Gagal di perbarui');
        }
    }
}