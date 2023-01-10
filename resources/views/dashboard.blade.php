@extends('layout')
@section('title', 'Dashboard')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard selamat datang {{ Auth::user()->name }} </h1>

    </div>
@endsection
