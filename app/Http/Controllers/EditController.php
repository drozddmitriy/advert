<?php

namespace App\Http\Controllers;

use App\Advert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    public function execute($id, Request $request)
    {
        $advert = Advert::where('id', $id)->first();
        if((Auth::user()->username) == $advert->author_name) {

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
                    return redirect()->route('edit', ['advert' => $advert['id']])->withErrors($validator)->withInput();
                }

                $advert->fill($input);

                if ($advert->update()) {
                    return redirect()->route('page', ['id' => $advert->id])->with('status', 'Advert update');
                }
            }

            $data = $advert->toArray();

            if (view()->exists('pages_update')) {
                return view('pages_update', ['data' => $data]);
            }
        }
        else {
            return redirect()->route('home')->with('status', 'this is not your Advert');
        }
    }

    public function delete($id, Request $request)
    {

        $advert = Advert::where('id', $id)->first();

        if((Auth::user()->username) == $advert->author_name) {
            if ($request->isMethod('delete')) {
                $advert->delete();
                return redirect('/')->with('status', 'Advert delete');
            }
        }
        else {
            return redirect()->route('home')->with('status', 'this is not your Advert');
        }
    }
}
