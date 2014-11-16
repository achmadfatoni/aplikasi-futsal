<?php

/**
 * Created by PhpStorm.
 * User: Achmad Fatoni
 * Date: 11/12/2014
 * Time: 12:39 AM
 */
class CustomerController extends BaseController {

    public function getIndex() {
        $data = array(
            'createUrl' => URL::to('customer/create'),
            'list' => Customer::all(),
        );
        return View::make('customer.index', $data);
    }

    public function getCreate() {
        $data = array(
            'actionUrl' => URL::to('customer/save'),
        );
        return View::make('customer.create_edit', $data);
    }

    public function getEdit($id) {
        $customer = Customer::find($id);
        $data = array(
            'customer' => $customer,
            'actionUrl' => URL::to('customer/save'),
            'id' => $id,
        );
        return View::make('customer.create_edit', $data);
    }

    public function postSave() {
        $input = Input::all();
        if(Input::has('id')){
            $customers = Customer::find(Input::get('id'));
            $action = $customers->update($input);
            
        }else{
            $customers = new Customer();
            $action = $customers->create($input);
        }
        if ($action) {
            return Redirect::to('customer')->with('success', 'Customer berhasil dibuat');
        } else {
            return Redirect::to('customer')->with('error', 'Customer Gagal dibuat');
        }
    }

    public function getDelete($id) {
        $customer = Customer::find($id);
        if ($customer->delete()) {
            return Redirect::to('customer')->with('success', 'Customer berhasil dihapus');
        } else {
            return Redirect::to('customer')->with('error', 'Customer Gagal dihapus');
        }
    }

}
