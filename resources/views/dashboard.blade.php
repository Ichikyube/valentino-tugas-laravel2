<x-app-layout>
        {{-- @section('sidebar')
            @include('partials.sidebar')
        @endsection --}}
        <div class="flex flex-col">
            <x-slot name="header">
                <div class="flex justify-around">
                    <div>
                        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                            {{ __('dashboard') }}
                        </h2>
                    </div>
                </div>
            </x-slot>
        </div>


</x-app-layout>
