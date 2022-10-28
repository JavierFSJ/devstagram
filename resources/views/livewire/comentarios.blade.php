<div class="shadow border bg-white p-5 mb-5 rounded-lg">
    @auth
        <p class="text-xl font-bold text-center mb-4">Agrega un Nuevo Comentario</p>
        @if (session('mensaje'))
            <div class="bg-green-500  p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                {{ session('mensaje') }}
            </div>
        @endif
        <form wire:submit.prevent="store">
            @csrf
            <div class="my-5">
                <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
                    Comentario
                </label>
                <textarea wire:model="comentario" class="my-2 border p-3 w-full rounded-lg" placeholder="Comentario"
                    wire:model="comentario"></textarea>
                @error('comentario')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2
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
            @foreach ($comentarios as $comentario)
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
