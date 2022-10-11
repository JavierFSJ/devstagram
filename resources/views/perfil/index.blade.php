@extends('layouts/app')

@section('titulo')
    Editar Perfil: {{ $user->username }}
@endsection


@section('contenido')
    <div class="md:flex md:justify-center mt-5 px-5 md:px-0">
        <div class="md:w-2/3 bg-white shadow-xl p-2 px-5 mt-5 md:mt-0">
            <form action="{{ route('perfil.update' , $user)}}" class="my-3" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input type="text" id="name" name="name" type="text" value="{{ old('name') ? old('name') : $user->name }}"
                        placeholder="Nombre" class="border p-3 w-full rounded-lg">
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2
                        text-center">
                            {{ $message }}</p>
                    @enderror

                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input type="text" id="username" name="username" value="{{ old('username') ? old('username') : $user->username }}" type="text"
                        placeholder="Username" class="border p-3 w-full rounded-lg">
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2
                        text-center">
                            {{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input type="email" id="email" name="email" type="email" value="{{ old('email') ? old('email') : $user->email }}"
                        placeholder="Email" class="border p-3 w-full rounded-lg">
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2
                        text-center">
                            {{ $message }}</p>
                    @enderror

                </div>
                <input class="my-5" type="file" name="imagen">
                <input type="submit" value="Actualizar Datos"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase
                              font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection

@push('styles')
  <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush