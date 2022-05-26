<?php

namespace App\Controllers;

class Index extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function ranking()
    {
        return view('ranking');
    }

    public function perfil()
    {
        return view('perfil');
    }
}
