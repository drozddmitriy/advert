<?php

namespace App\Http\Controllers;

use App\Advert;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = Advert::orderBy('id', 'DESC')->paginate(5);
        return view('index')->with('adverts', $adverts);
    }
}
