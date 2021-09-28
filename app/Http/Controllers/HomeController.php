<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('soloadmin', ['only'=> ['index']]);
    }

    public function getUser(){
        return view('user');
    }

    public function getProfesional(){
        return view('profesional');
    }


    public function index()
    {
        return view('home');
    }
}
