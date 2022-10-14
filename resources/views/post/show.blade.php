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
            <div class="shadow border bg-white p-5 mb-5 rounded-lg ">
                @auth
                    <p class="text-xl font-bold text-center mb-4">Agrega un Nuevo Comentario</p>
                    @if (session('mensaje'))
                        <div class="bg-green-500  p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                            {{ session('mensaje') }}
                        </div>
                    @endif
                    <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                        @csrf
                        <div class="my-5">
                            <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
                                Comentario
                            </label>
                            <textarea id="comentario" name="comentario" class="my-2 border p-3 w-full rounded-lg" placeholder="Comentario"></textarea>
                            @error('comentario')
                                <p
                                    class="bg-red-500 text-white my-2 rounded-lg text-sm p-2
                            text-center">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                        <input type="submit" value="Publicar comentario"
                            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase
                      font-bold w-full p-3 text-white rounded-lg">
                    </form>
                @endauth

                <div class="bg-white shawdow mb-5 max-h-96 overflow-y-scroll mt-10">
                    <h2 class="text-center font-bold text-xl">Comentarios</h2>
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario)
                            <div class="p-5 border-gray-300 border-b">
                                <a href="{{ route('post.index', $comentario->user) }}"
                                    class="font-bold">{{ $comentario->user->username }}</a>
                                <p>{{ $comentario->comentario }}</p>
                                <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">No hay comentarios</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
