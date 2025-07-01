<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        return view('index');
    }
    public function home(){
        return view('home');
    }
    public function dashboard(){
        return view('dashboard');
    }
    public function analytic(){
        return view('analytic');
    }
    public function worker(){
        return view('dashboard');
    }
    public function pemasukan(){
        return view('uang_masuk');
    }
}
