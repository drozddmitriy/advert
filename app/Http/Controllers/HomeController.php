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

    public function show($id){
        if(!$id){
            abort(404);
        }

        if(view()->exists('page')){

            $advert = Advert::where('id',$id)->first();
            return view('page')->with('advert', $advert);
        }
        else {
            abort(404);
        }
    }
}
