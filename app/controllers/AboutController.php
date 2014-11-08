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
        $page = Page::find(PAGE_ABOUT);
        $data = array(
            'action' => URL::to('about/save'),
            'contents' => $page->contents,
        );
        return View::make('about.admin', $data);
    }

    public function guest(){

    }

    public function postSave(){
        $contents = Input::get('contents');
        $type = PAGE_ABOUT;
        $page = Page::find(PAGE_ABOUT);
        $page->contents = $contents;
        $page->type = $type;
        if($page->save()){
            return Redirect::to('about')->with('success', 'Berhasil di perbarui');
        }else{
            return Redirect::to('about')->with('error', 'Gagal di perbarui');
        }
    }

} 