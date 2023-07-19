<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create() {
        return view('register.create');
    }

    public function store() {

        $attributes = request()-> validate([
           'name' => ['required', 'min:3'],
           //'username' => ['required', 'min:4', 'max:16', 'unique:users,username'],
           'username' => ['required', 'min:4', 'max:16', Rule::unique('users', 'username')],
           'email' => ['required', 'email', Rule::unique('users', 'email')],
           'password' => ['required', 'min:6']
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        //session()->flash('success', 'Your account has been created.');
        return redirect(route('home'))->with('success', 'Your account has been created.');
    }
}
