<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        function myauth($request)
        {
            if (Auth::attempt([
                'username' => $request->get('username'),
                'password' => $request->get('password')
            ])) {
                return true;
            }
            return false;
        }

        if (myauth($request)) {
            return redirect('/');
        } else {
            $input = $request->except('_token');

            $massages = [
                'required' => 'Поле :attribute обязательно к заполнению',
                'unique' => 'Поле :attribute должно быть уникальным'
            ];

            $validator = Validator::make($input, [
                'username' => 'required|unique:users',
                'password' => 'required',
            ], $massages);

            if ($validator->fails()) {
                return redirect()->route('home')->withErrors($validator)->withInput();
            }

            $user = User::create($request->all());
            $user->generatePassword($request->get('password'));
            myauth($request);
            return redirect('/');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');

    }
}
