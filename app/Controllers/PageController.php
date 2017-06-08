<?php
namespace ZacBranson\SimplePHP\Controllers;

class PageController
{
    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }
}