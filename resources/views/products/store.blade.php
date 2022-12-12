<x-layout>
<div class="container mx-auto mt-10 bg-slate-700  rounded-xl">
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0 ml-4 mt-4">
        <h3 class="text-lg font-medium leading-6 text-white">Profile</h3>
        <p class="mt-1 text-sm text-slate-300">This information will be displayed publicly so be careful what you share.</p>
      </div>
    </div>
    <div class="mt-5 pl-10 md:col-span-2 md:mt-0 bg-white">
        <a href="{{ route('products.list') }}"><button class="cursor-default rounded-md border border-gray-300 bg-slate-700 text-slate-50 py-2 px-4 text-left shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm"> Kembali </button></a>
        <form method="POST" action="{{ route('products.create')}}"  enctype="multipart/form-data">
            @csrf
            @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Sorry !</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <label class="block text-sm font-medium text-gray-700" for="name">Brand Name : </label>
            <input class="rounded-md border border-gray-300 bg-white py-2 pl-3 pr-10 text-left shadow-sm" type="text" name="name" id="name"><br>
            <label class="block text-sm font-medium text-gray-700" for="category">Category :</label>
            <select class="cursor-default rounded-md border border-gray-300 bg-white py-2 pl-3 pr-10 text-left shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm" name="category" id="category">
                <option value="1">Food</option>
                <option value="2">tools</option>
                <option value="3">drugs</option>
            </select><br>
            <div class="w-1/3">
                <label for="description" class="block text-sm font-medium text-gray-700">Description :</label>
                <div class="mt-1">
                  <textarea  name="description" id="description" name="about" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="you@example.com"></textarea>
                </div>
                <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p>
              </div>
            <label class="block text-sm font-medium text-gray-700" for="price">Price : </label>
            <input class="w-22 rounded-md border border-gray-300 bg-white py-2 pl-3 pr-10 text-left shadow-sm" type="text" name="price" id="price"><br>
            <div class="w-1/3">
                <label class="block text-sm font-medium text-gray-700">Photo Product</label>
                <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <strong>{{$message}}</strong>
                    </div>

                    <img src="{{ asset('images/'.Session::get('image')) }}" />
                    @endif
                    @php
                        $file = $request->file('Picture');
                        $destinationPath = 'public/img/';
                        $originalFile = $file->getClientOriginalName();
                        $file->move($destinationPath, $originalFile);
                    @endphp
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                        <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                            <span>Upload a file</span>
                            <input id="file-upload" name="image" type="file" class="form-control sr-only">
                        </label>
                        <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                    </div>

                </div>
            </div>
            <div class="w-1/3 mt-3 bg-gray-50 px-4 py-3 text-right sm:px-6">
                <button type="submit" class="mt-5 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Tambah Data</button>
            </div>
        </form>
    </div>
  </div>
</div>

</x-layouts.app>
