<x-app-layout>
    @push('styles')
        @trixassets
    @endpush
    <div class="flex-wrap pt-3 pb-2 mb-3 d-flex justify-content-between flex-md-nowrap align-items-center border-bottom">
        <h1 class="h2">Tambah Postingan baru</h1>
    </div>
    <br><br><br><br>
    <div class="col-lg-8">
        <form action="{{ route('posts.list') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" @class(['form-control', 'is-invalid' => $errors->has('title')]) id="title" name="title" placeholder="Judul Post"
                    value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" id="slug" @class(['form-control', 'is-invalid' => $errors->has('slug')]) value="{{ old('slug') }}" name="slug"
                    onfocus="getSlug(this)" placeholder="slug-post" readonly>
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        @error('body')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <div class="mb-3">
            <label for="slug" class="form-label">Isi</label>
            @trix(\App\Post::class, 'content')
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Gambar</label>
            <input class="form-control @error('image') is-invalid @enderror" name="image" type="file" id="formFile">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button class="btn btn-primary">Tambah Postingan</button>
        <a class="btn btn-warning" href="{{ route('posts.list') }}">Kembali</a>
        </form>
    </div>
</x-app-layout>
