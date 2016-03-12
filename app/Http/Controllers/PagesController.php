<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function about()
    {
        return view('pages.about');
    }
    public function design()
    {
        return view('pages.design');
    }
    public function restricted()
    {
        return view('pages.restricted');
    }


}
