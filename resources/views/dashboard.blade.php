<x-app-layout>
        @section('sidebar')
            @include('partials.sidebar')
        @endsection
        <div class="flex flex-col">
            <x-slot name="header">
                <div class="flex justify-around">
                    <div>
                        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                            {{ __('dashboard') }}
                        </h2>
                    </div>
                    mantaaap
                    <div class="container flex justify-center lg:justify-end">
                        <div class="pr-3">
                            <form action="">
                                <div class="relative">
                                    <input type="text" placeholder="search..." name="search" class="rounded w-80">
                                    <button class="absolute rotate-45 left-72 bottom-3"><svg class="w-6 h-6" fill="none"
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
        </div>


</x-app-layout>
