<?php
/**
 * Created by PhpStorm.
 * User: Achmad Fatoni
 * Date: 11/12/2014
 * Time: 12:39 AM
 */

class CustomerController extends BaseController{
    public function getIndex(){
        $data = array(
            'createUrl' => URL::to('customer/create'),
            'list' => Customer::all(),
        );
        return View::make('customer.index', $data);
    }

    public function getCreate(){
        $data = array(
          'actionUrl' => URL::to('customer/save'),
        );
        return View::make('customer.create_edit', $data);
    }

    public function getEdit(){

    }

    public function postSave(){
        $customers = new Customer();
        $customers->username = Input::get('username');
        $customers->nama = Input::get('nama');
        $customers->password = Input::get('password');
        $customers->alamat = Input::get('alamat');
        $customers->no_telp = Input::get('no_telp');
        $customers->team = Input::get('team');
        $customers->jenis_customer = Input::get('jenis_customer');

        if($customers->save()){
            return Redirect::to('customer')->with('success', 'Customer berhasil dibuat');
        }else{
            return Redirect::to('customer')->with('error', 'Customer Gagal dibuat');
        }

    }

    public function getDelete(){

    }
} 