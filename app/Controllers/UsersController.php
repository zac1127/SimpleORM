<?php
namespace ZacBranson\SimplePHP\Controllers;

use ZacBranson\SimplePHP\User;

class UsersController
{
    public function index()
    {
        $users = User::where('id', '1')->run();

        return view('users.index', compact('users'));
    }
}
