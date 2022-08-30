@extends('layouts/app');

@section('titulo')
    Inicia Sesion en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center mt-10 md:gap-5 md:items-center">
        <div class="md:w-6/12 mb-8 p-5 md:p-0">
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen Sing Up">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('login') }}" method="POST">
                @csrf

                @if (session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2
                    text-center">
                        {{ session('mensaje') }}</p>
                @endif


                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input type="email" id="email" name="email" type="email" value="{{ old('email') }}"
                        placeholder="Email" class="border p-3 w-full rounded-lg">
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2
                        text-center">
                            {{ $message }}</p>
                    @enderror

                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input type="password" id="password" name="password" type="password" value="{{ old('password') }}"
                        placeholder="Password" class="border p-3 w-full rounded-lg">
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2
                        text-center">
                            {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="rember" >
                    <label for="rember" class="mb-2   text-gray-500">Recordarme</label>
                </div>

                <input type="submit" value="Iniciar Sesión"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase
                              font-bold w-full p-3 text-white rounded-lg">


            </form>
        </div>
    </div>
@endsection
