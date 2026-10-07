<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class CustomerAccounts extends BaseController
{
    public function index()
    {
        $customerModel = new CustomerModel();

        $data = [
            'title' => 'Customer Accounts',
            'customers' => $customerModel
                ->orderBy('id', 'ASC')
                ->findAll(),
        ];

        return view('customer_accounts/index', $data);
    }
}