@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection


@section('contenido')
    <div class="container mx-auto md:flex px-3 md:p-0 mt-10 gap-6">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads/' . $post->imagen) }}" alt="Imagen del post">
            <div class="mt-3 flex gap-2">
                @auth
                    <livewire:like-post :post="$post" />
                @endauth
            </div>

            <div>
                <a href="{{ route('post.index', $post->user) }}" class="font-bold">{{ $post->user->username }}</a>
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-3 text-2xl ">
                    {{ $post->descripcion }}
                </p>
            </div>

            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form method="POST" action="{{ route('posts.destroy', $post) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Eliminar Publicación"
                            class="p-2 bg-red-500 hover:bg-red-600 rounded text-white font-bold mt-4 cursor-pointer">
                    </form>
                @endif
            @endauth
        </div>

        <div class="md:w-1/2">
            <livewire:comentarios :post="$post"/>
            
        </div>
    </div>
@endsection
