<?php

namespace App\Http\Controllers;

use App\Advert;
use Illuminate\Http\Request;

class PageController extends Controller
{
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
