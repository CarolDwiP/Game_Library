<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Redirect jika sudah login
        if (session()->get('isLoggedIn')) {
            return session()->get('role') === 'admin' 
                ? redirect()->to('/dashboard') 
                : redirect()->to('/user');
        }
        
        return view('home');
    }
}