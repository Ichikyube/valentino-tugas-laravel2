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
                    <div id="sidebar"
                        class="bg-white h-screen md:block shadow-xl px-3 w-30 md:w-60 lg:w-60 overflow-x-hidden transition-transform duration-300 ease-in-out"
                        x-show="sidenav" @click.away="sidenav = false">
                        <div class="space-y-6 md:space-y-10 mt-10">

                            <div id="profile" class="space-y-3">
                                <img src="https://pbs.twimg.com/profile_images/1467997254929854470/mDYbXoVl_400x400.jpg"
                                    alt="Avatar user" class="w-10 md:w-16 rounded-full mx-auto" />
                                <div>
                                    <h2 class="font-medium text-xs md:text-sm text-center text-teal-500">
                                        Eduard Pantazi
                                    </h2>
                                    <p class="text-xs text-gray-500 text-center">Administrator</p>
                                </div>
                            </div>
                            <div class="flex border-2 border-gray-200 rounded-md focus-within:ring-2 ring-teal-500">
                                <input type="text"
                                    class="w-full rounded-tl-md rounded-bl-md px-2 py-3 text-sm text-gray-600 focus:outline-none"
                                    placeholder="Search" />
                                <button class="rounded-tr-md rounded-br-md px-2 py-3 hidden md:block">
                                    <svg class="w-4 h-4 fill-current" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                            <div id="menu" class="flex flex-col space-y-2">
                                <a href=""
                                    class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:text-base rounded-md transition duration-150 ease-in-out">
                                    <svg class="w-6 h-6 fill-current inline-block" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                        </path>
                                    </svg>
                                    <span class="">Dashboard</span>
                                </a>
                                <a href=""
                                    class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                                    <svg class="w-6 h-6 fill-current inline-block" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z">
                                        </path>
                                    </svg>
                                    <span class="">Products</span>
                                </a>
                                <a href=""
                                    class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                                    <svg class="w-6 h-6 fill-current inline-block" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                        <path fill-rule="evenodd"
                                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="">Reports</span>
                                </a>
                                <a href=""
                                    class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                                    <svg class="w-6 h-6 fill-current inline-block" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z">
                                        </path>
                                        <path
                                            d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z">
                                        </path>
                                    </svg>
                                    <span class="">Messages</span>
                                </a>
                                <a href=""
                                    class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                                    <svg class="w-6 h-6 fill-current inline-block" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="">Calendar</span>
                                </a>
                                <a href=""
                                    class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                                    <svg class="w-6 h-6 fill-current inline-block" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="">Table</span>
                                </a>
                                <a href=""
                                    class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                                    <svg class="w-6 h-6 fill-current inline-block" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM14 11a1 1 0 011 1v1h1a1 1 0 110 2h-1v1a1 1 0 11-2 0v-1h-1a1 1 0 110-2h1v-1a1 1 0 011-1z">
                                        </path>
                                    </svg>
                                    <span class="">UI Components</span>
                                </a>
                                <a href=""
                                    class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-teal-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                                    <svg class="w-6 h-6 fill-current inline-block" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                        </path>
                                    </svg>
                                    <span class="">Users</span>
                                </a>
                            </div>
                        </div>
                    </div>

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
