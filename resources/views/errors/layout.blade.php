@extends('layout')

@section('main')


<div class="error">
    <p>@yield('code')</p>
    <p>@yield('message')</p>
</div>


@endsection
