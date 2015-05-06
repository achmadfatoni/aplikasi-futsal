<?php
/**
 * Created by PhpStorm.
 * User: m
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

        $data = array(
//            'contents' => $page->contents,
            'page' => Page::find(PAGE_ABOUT),
        );
        return View::make('about.guest', $data);
    }

    public function postSave(){
        $contents = Input::get('contents');
        $type = PAGE_ABOUT;
        $page = Page::find(PAGE_ABOUT);
        $page->contents = $contents;
        $page->type = $type;
        if(Input::hasFile('gambar1')){
            $destinationPath = public_path('page');
            $extension = Input::file('gambar1')->getClientOriginalExtension();
            $name = \Carbon\Carbon::now()->timestamp;
            $fileName = $name .'.'. $extension;
            $upload = Input::file('gambar1')->move($destinationPath, $fileName);
            if($upload){
                $page->gambar1 = $fileName;
            }
        }
        if(Input::hasFile('gambar2')){
            $destinationPath = public_path('page');
            $extension = Input::file('gambar2')->getClientOriginalExtension();
            $name = \Carbon\Carbon::now()->timestamp;
            $fileName = $name .'.'. $extension;
            $upload = Input::file('gambar2')->move($destinationPath, $fileName);
            if($upload){
                $page->gambar2 = $fileName;
            }
        }
        if(Input::hasFile('gambar3')){
            $destinationPath = public_path('page');
            $extension = Input::file('gambar3')->getClientOriginalExtension();
            $name = \Carbon\Carbon::now()->timestamp;
            $fileName = $name .'.'. $extension;
            $upload = Input::file('gambar3')->move($destinationPath, $fileName);
            if($upload){
                $page->gambar3 = $fileName;
            }
        }
        if($page->save()){
            return Redirect::to('about')->with('success', 'Berhasil di perbarui');
        }else{
            return Redirect::to('about')->with('error', 'Gagal di perbarui');
        }
    }

} 