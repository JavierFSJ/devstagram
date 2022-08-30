<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $resquest)
    {
        $this->validate($resquest, [
            "email" => 'required|email',
            'password' => 'required',
        ]);

        if (!auth()->attempt($resquest->only('email', 'password') , $resquest->rember )) {
            return back()->with('mensaje', 'Credenciales incorrectas');
        }

        return redirect()->route('post.index' , auth()->user()->username);
    }
}
