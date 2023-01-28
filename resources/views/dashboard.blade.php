<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-around">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </div>
            <div class="container flex justify-center lg:justify-end">
                <div class="pr-3">
                    <form action="">
                        <div class="relative">
                            <input type="text" placeholder="search..." name="search" class="w-80 rounded">
                            <button class="absolute left-72 bottom-3 rotate-45"><svg class="w-6 h-6" fill="none"
                                    stroke="#777" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
    <section class="px-20 mx-auto grid grid-cols-3">
        <div class="absolute left-72">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="font-poppins antialiased">
                <div id="view" class="h-full w-screen flex flex-row" x-data="{ sidenav: true }">
                    <button @click="sidenav = true"
                        class="p-2 border-2 bg-white rounded-md border-gray-200 shadow-lg text-gray-500 focus:bg-teal-500 focus:outline-none focus:text-white absolute top-0 left-0 sm:hidden">
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
            <div class="card-container py-3 ">
                <div class="max-w-md bg-white rounded-lg border border-gray-200 shadow-md ">
                    <div class="my-2 flex justify-between px-2">
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
                            <div class="container bg-slate-100 px-3 py-3 rounded">
                                <a href="#">
                                    <p class="text-md text-slate-500 truncate"><strong>Eliza</strong> I like this dress,
                                        pwede pahangyo te? gamay lang gud miski jizz pesos lang</p>
                                </a>
                            </div>
                            <div class="container bg-slate-100 px-3 py-3 rounded my-1">
                                <a href="#">
                                    <p class="text-md text-slate-500 truncate"><strong>Eris</strong> I like this dress,
                                        pwede pahangyo te? gamay lang gud miski jizz pesos lang</p>
                                </a>
                            </div>
                        </div>
                        <hr class="my-3">
                        <div class="icons flex justify-end">
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

        {{-- <script src="js/graph.js" type="text/javascript"></script>
        <script>
          var user = document.getElementById("user-chart").nodeName;
          var chart = new Graph({
            data: [1, 20, 5, 6, 8],
            target: document.querySelector(user),
          });
        </script> --}}
    </section>
</x-app-layout>
