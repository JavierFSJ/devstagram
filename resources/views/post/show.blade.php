@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection


@section('contenido')
    <div class="container mx-auto flex mt-10 gap-6">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads/' . $post->imagen) }}" alt="Imagen del post">
            <div class="mt-3">
                <p>0 likes</p>
            </div>

            <div>
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-3 text-2xl ">
                  {{$post->descripcion}}
                </p>
            </div>
        </div>

        <div class="md:w-1/2">
          <div class="shadow border bg-white p-5 mb-5">
            <p class="text-xl font-bold text-center mb-4">Agrega un Nuevo Comentario</p>
            <form action="">
              <textarea name="" id="" cols="30" rows="10"></textarea>
            </form>
          </div>
        </div>
    </div>
@endsection
