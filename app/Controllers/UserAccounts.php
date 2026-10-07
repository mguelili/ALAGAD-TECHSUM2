<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserAccounts extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        $data = [
            'title' => 'User Accounts',
            'users' => $userModel
                ->orderBy('id', 'ASC')
                ->findAll(),
        ];

        return view('user_accounts/index', $data);
    }
}
