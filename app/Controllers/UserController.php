<?php

namespace App\Controllers;

class UserController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];

        return view('users/index', $data);
    }
}
