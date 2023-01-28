@extends('layouts.base')

@section('body')
    @yield('trigger')
    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
