<?php

/**
 * Created by PhpStorm.
 * User: Achmad Fatoni
 * Date: 11/12/2014
 * Time: 12:39 AM
 */
class CustomerController extends BaseController
{

    public function getIndex()
    {
        $data = array(
            'createUrl' => URL::to('customer/create'),
            'list' => Customer::all(),
        );
        return View::make('customer.index', $data);
    }

    public function getCreate()
    {
        $data = array(
            'actionUrl' => URL::to('customer/save'),
        );
        return View::make('customer.create_edit', $data);
    }

    public function getEdit($id)
    {
        $customer = Customer::find($id);
        $data = array(
            'customer' => $customer,
            'actionUrl' => URL::to('customer/update'),
            'id' => $id,
        );
        return View::make('customer.create_edit', $data);
    }

    public function postSave()
    {
        $input = Input::all();
        $customers = new Customer();
        $action = $customers->create($input);

        if ($action) {
            $user['username'] = $input['username'];
            $user['password'] = Hash::make('1234');
            $user['user_identity'] = $action->id;
            $jenisCustomer = $input['jenis_customer'];

            if($jenisCustomer == CUSTOMER_GOLD){
                $roleId = USER_GOLD;
            }else{
                $roleId = USER_SILVER;
            }

            $user['role_id'] = $roleId;
            $createUser = User::create($user);
            if($createUser){
                return Redirect::to('customer')->with('success', 'Customer berhasil dibuat');
            }
            return Redirect::to('customer')->with('error', 'Customer Gagal dibuat');

        } else {
            return Redirect::to('customer')->with('error', 'Customer Gagal dibuat');
        }
    }

    public function postUpdate()
    {
        $input = Input::all();
        if (Input::has('id')) {
            $customers = Customer::find(Input::get('id'));
            $action = $customers->update($input);
        }

        if ($action) {
            return Redirect::to('customer')->with('success', 'Customer berhasil diperbarui');
        } else {
            return Redirect::to('customer')->with('error', 'Customer Gagal diperbarui');
        }
    }

    public function getDelete($id)
    {
        $customer = Customer::find($id);
        if ($customer->delete()) {
            return Redirect::to('customer')->with('success', 'Customer berhasil dihapus');
        } else {
            return Redirect::to('customer')->with('error', 'Customer Gagal dihapus');
        }
    }

}
