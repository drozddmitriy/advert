<?php

namespace App\Http\Controllers;

use App\Advert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EditController extends Controller
{
    public function execute($id, Request $request)
    {
        $advert = Advert::where('id', $id)->first();

        if ($request->isMethod('post')) {

            $input = $request->except('_token');

            $massages = [
                'required' => 'Поле :attribute обязательно к заполнению'
            ];

            $validator = Validator::make($input, [
                'title' => 'required',
                'description' => 'required',
            ], $massages);

            if ($validator->fails()) {
                return redirect()->route('edit')->withErrors($validator)->withInput();
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
}
