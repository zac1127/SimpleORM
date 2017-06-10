<?php
namespace ZacBranson\SimplePHP\Controllers;

use ZacBranson\SimplePHP\User;

class UsersController
{
    public function index()
    {
            $users = User::all()->get();

            return view('/users/index', compact('users'));

    }
}
