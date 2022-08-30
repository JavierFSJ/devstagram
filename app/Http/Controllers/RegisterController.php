<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth/singUp');
    }

    public function store(Request $request)
    {   

        //Transformando el username
        $request->request->add(['username' => Str::slug($request->username)]);
        
        //Validacion
        $this->validate($request , [
            "name" => 'required|max:60',
            "username" => 'unique:users|required|max:25',
            "email" => 'required|unique:users|email',
            "password" => 'confirmed|min:8'
        ]);
        
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            
        ]);


        //Auntenticando a un usuario
        /* auth()->attempt([
            'email' => $request->email,
            'password'=> $request->password
        ]); */

        auth()->attempt($request->only('email' , 'password'));

        return redirect()->route('post.index' , auth()->user()->username);
    }
}
