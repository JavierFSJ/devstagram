<div>
    @if ($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div class="">
                    <a href="{{ route('post.show', ['post' => $post, 'user' => $post->user]) }}">
                        <img src="{{ asset('uploads/' . $post->imagen) }}" alt="Imagen Post">
                    </a>
                </div>
            @endforeach
        </div>
        <div class="my-10">
            {{ $posts->links('pagination::tailwind') }}
        </div>
    @else
        <p class="text-center">No hay Post para mostrar</p>
        <p class="text-center">Sigue atros dev y mira sus post</p>
    @endif
</div>