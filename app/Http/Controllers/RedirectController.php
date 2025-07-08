<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function index(){
        return view('redirect');
    }
    public function failed(){
        return view('redirectfailed');
    }
}
