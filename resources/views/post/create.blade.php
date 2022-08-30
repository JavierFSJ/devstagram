@extends('layouts.app')

@section('titulo')
    Crear una nueva Publicación
@endsection

@push('styles')
  <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center mt-10 md:gap-5">
        <div class="md:w-1/2 px-10">
            <form action="{{ route('imagen.store') }}" id="dropzone" class="dropzone border-dotted border-2 w-full h-96 rounded flex flex-col justify-center items-center" method="POST" enctype="multipart/form-data">
              @csrf
            </form>
        </div>
        <div class="md:w-1/2 px-10 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('post.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Titulo
                    </label>
                    <input id="titulo" name="titulo" type="text" value="{{ old('titulo') }}"
                        placeholder="Titulo de la publicacion" class="border p-3 w-full rounded-lg">
                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2
                text-center">
                            {{ $message }}</p>
                    @enderror

                </div>

                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripcion
                    </label>
                    <textarea id="descripcion" name="descripcion" class="border p-3 w-full rounded-lg" placeholder="Descripcion">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2
                            text-center">
                            {{ $message }}</p>
                    @enderror

                </div>

                <div class="mb-5">
                    <input type="hidden" id="imagen" name="imagen" value="{{ old('imagen')}}">
                    @error('imagen')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2
                            text-center">
                            {{ $message }}</p>
                    @enderror
                </div>

                <input type="submit" value="Crear publicación"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase
                      font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
