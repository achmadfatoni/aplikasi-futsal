<?php

/**
 * Created by PhpStorm.
 * User: m
 * Date: 11/12/2014
 * Time: 12:39 AM
 */
class CustomerController extends BaseController
{
    private $customer;
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
        $this->beforeFilter('auth');
        $this->beforeFilter('admin');
    }

    public function getIndex()
    {
        $list = $this->customer->with('User')
            ->get();
        $data = array(
            'createUrl' => URL::to('customer/create'),
            'list' => $list,
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
        $customer = Customer::whereId($id)
            ->with('user')
            ->first();
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
        $status = false;
        $rules = array(
            'username' => 'required|unique:users'
        );

        $validator = Validator::make($input, $rules);

        if($validator->fails()){
            $messages = $validator->messages();
            return Redirect::back()->with('error', 'Customer Gagal dibuat')
                ->withErrors($validator)
                ->withInput($input);
        }else{
            $transaction = DB::transaction(function() use ($status, $customers, $input){
                $action = $customers->create($input);
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
                User::create($user);
                return true;
            });
            return Redirect::to('customer')->with('success', 'Customer berhasil dibuat');
        }
    }

    public function postUpdate()
    {
        $input = Input::all();
        $userId = Input::get('id');
        if (Input::has('id')) {
            $customers = Customer::find($userId);
            $action = $customers->update($input);
            if($action){
                $jenisCustomer = $input['jenis_customer'];

                if($jenisCustomer == CUSTOMER_GOLD){
                    $roleId = USER_GOLD;
                }else{
                    $roleId = USER_SILVER;
                }

                $user  = User::where('user_identity','=', $userId)
                    ->update(array(
                       'role_id' => $roleId,
                    ));

                if ($user) {
                    return Redirect::to('customer')->with('success', 'Customer berhasil diperbarui');
                } else {
                    return Redirect::to('customer')->with('error', 'Customer Gagal diperbarui');
                }
            }
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
        return Redirect::back();
    }

}
