<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller
{
    public function home()
    {
        // Correctly loading home.php from the pages folder
        return view('pages/home'); // This should load the view from app/Views/pages/home.php
    }

    public function about()
    {
        return view('pages/about');
    }

    public function contact()
    {
        return view('pages/contact');
    }
}
