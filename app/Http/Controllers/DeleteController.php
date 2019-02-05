<?php

namespace App\Http\Controllers;

use App\Advert;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function execute($id)
    {
        if (!$id) {
            abort(404);
        }
        $advert = Advert::find($id);
        $advert->delete();
        return redirect('/')->with('status', 'Advert delete');
    }
}
