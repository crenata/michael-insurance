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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        if (auth()->user()->type === "broker") return view("broker.home");
        else if (auth()->user()->type === "underwriting") return view("underwriting.home");
        else return view("policy.home");
    }
}
