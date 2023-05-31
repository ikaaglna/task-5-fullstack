<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
    public function index()
    {
        // if (Session::has('logged_in') == false) {
        //     return redirect('/');
        // }
        $article = "http://localhost:8000/api/v1/posts";
        $data = file_get_contents($article);
        $article = json_decode($data, true);

        return view('layouts.articles.index', with($article));
        // return view('layouts.articles.index');
    }
}
