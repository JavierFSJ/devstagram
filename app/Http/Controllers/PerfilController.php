<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        if ($user->id !== auth()->user()->id) {
            $user = auth()->user();
            $posts = auth()->user()->posts;
            return redirect()->route('post.index', compact('user', 'posts'));
        }

        return view('perfil.index', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'email|required|unique:users,email,' . $user->id,
        ]);

        if ($request->imagen) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000, 1000, null);

            $imagenPath = public_path('perfil') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'imagen' => $nombreImagen ?? '',
        ]);

        $user->save();

        return redirect()->route('post.index', $user);
    }
}
