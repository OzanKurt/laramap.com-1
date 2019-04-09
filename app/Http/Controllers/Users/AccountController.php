<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function getAccount()
    {
        return view('users.account');
    }
}
