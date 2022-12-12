<x-layout>
    @section('title', 'Daftar User')
    <a href="{{ route('products.store') }}"><button> Tambah User </button></a>
        @foreach ($products as $product)
            @include('products.product')
        @endforeach
</x-layout>
