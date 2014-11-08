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
        $page = Page::find(PAGE_HELP);
        $data = array(
            'action' => URL::to('help/save'),
            'contents' => $page->contents,
        );
        return View::make('help.admin', $data);
    }

    public function guest(){

    }

    public function postSave(){
        $contents = Input::get('contents');
        $type = PAGE_HELP;
        $page = Page::find(PAGE_HELP);
        $page->contents = $contents;
        $page->type = $type;
        if($page->save()){
            return Redirect::to('help')->with('success', 'Berhasil di perbarui');
        }else{
            return Redirect::to('help')->with('error', 'Gagal di perbarui');
        }
    }

}