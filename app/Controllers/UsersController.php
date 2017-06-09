<?php
namespace ZacBranson\SimplePHP\Controllers;

use ZacBranson\SimplePHP\User;

class UsersController
{
    public function index()
    {
        $users = User::all()->run();

        return view('users.index', ["users" => $users]);
    }
}
