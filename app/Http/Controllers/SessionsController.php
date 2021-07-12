<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function destroy(){
        auth()->logout();
        return redirect('/')->with('success','Goodbye!');
    }

    public function create(){
        return view('sessions.create');
    }

    public function store(){
        $attributes = request()->validate([
            'email' => 'required|max:255|email',
            'password' => 'required|min:7|max:255'
        ]);
        if(auth()->attempt($attributes)){
            // session fixation protection
            session()->regenerate();
            return redirect('/')->with('success','Welcome Back!');
        }
        // auth fails and throws error messages
        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);
        // return back()->withInput()->withErrors(['email' => 'Your provided credentials could not be verified.']);
    }
}
