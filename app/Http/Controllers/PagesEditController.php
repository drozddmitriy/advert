<?php

namespace App\Http\Controllers;

use App\Advert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PagesEditController extends Controller
{

    public function execute(Request $request)
    {
        if ($request->isMethod('post')) {

            $input = $request->except('_token');

            $massages = [
                'required' => 'Поле :attribute обязательно к заполнению'
            ];

            $validator = Validator::make($input, [
                'title' => 'required|max:100',
                'description' => 'required',
            ], $massages);

            if ($validator->fails()) {
                return redirect()->route('pagesEdit')->withErrors($validator)->withInput();
            }

            $advert = new Advert();
            $input['author_name'] = Auth::user()->username;

            $advert->fill($input);
            if ($advert->save()) {
                return redirect()->route('page', ['id' => $advert->id])->with('status', 'Advert create');
            }
        }

        if (view()->exists('pages_edit')) {
            return view('pages_edit');
        }
    }
}
