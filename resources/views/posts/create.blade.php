<x-app-layout>
    @push('styles')
        @trixassets
    @endpush
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            @trix(Post::class, 'content')
            <input type="submit">
        </form>
</x-app-layout>
