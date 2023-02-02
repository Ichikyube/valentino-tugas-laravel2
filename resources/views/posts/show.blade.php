<!-- inside view blade file -->

@trix($post, 'content')

{!! $post->trix('content') !!} //must use HasTrixRichText trait in order for $model->trix() method work

{!! app('laravel-trix')->make($post, 'content') !!}

<section class="grid grid-cols-3 px-20 mx-auto">
    <div class="absolute left-72">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="antialiased font-poppins">
            <div id="view" class="flex flex-row w-screen h-full" x-data="{ sidenav: true }">
                <button @click="sidenav = true"
                    class="absolute top-0 left-0 p-2 text-gray-500 bg-white border-2 border-gray-200 rounded-md shadow-lg focus:bg-teal-500 focus:outline-none focus:text-white sm:hidden">
                    <svg class="w-5 h-5 fill-current" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
        @foreach($posts as $post)
        <div class="py-3 card-container ">
            <div class="max-w-md bg-white border border-gray-200 rounded-lg shadow-md ">
                <div class="flex justify-between px-2 my-2">
                    <div class="flex">
                        <img src="{{asset('images/Rectangle.png')}}" alt="">
                        <h6 class="ml-2"></h6>
                    </div>
                    <div>
                        <svg class="w-6 h-6" fill="none" stroke="#999" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                            </path>
                        </svg>
                    </div>
                </div>
                {{-- images carousel --}}
                <div class="owl-carousel owl-theme">
                    <div class="item h-54">
                        <img src="{{asset('images/empty.jpg')}}" alt="" class="h-54">
                    </div>
                    <div class="item h-54">
                        <img src="{{asset('images/empty.jpg')}}" alt="" class="h-54">
                    </div>
                    <div class="item h-54">
                        <img src="{{asset('images/empty.jpg')}}" alt="" class="h-54">
                    </div>
                </div>
                <div class="p-5">
                    <div class="flex justify-between">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$post->name}}</h5>
                        </a>
                        <p>price:<em>{{$post->price}}</em></p>
                    </div>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {{$post->description}}
                    </p>
                    <hr>
                    {{-- comments --}}
                    <div>
                        <h6>comments</h6>

                    </div>
                    <hr class="my-3">
                    <div class="flex justify-end icons">
                        <a href="/">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="/">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
