<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;


class SessionController extends Controller
{
    public function destroy() {
        auth()->logout();

        return redirect(route('home'))->with('success', 'Goodbye!');
    }

    public function create() {
        return view('sessions.create');
    }

    public function store() {
        $atrributes = request()->validate([
           'email' => ['required', Rule::exists('users', 'email')],
           'password' => ['required']
        ]);

        if (auth()->attempt($atrributes)){
            return redirect(route('home'))->with('success', 'Welcome back!');
        }

        throw ValidationException::withMessages([
            'email' => 'Incorrect credentials'
        ]);

        //return back()->withInput(['email'])->withErrors(['email' => 'Incorrect credentials']);
    }
}
