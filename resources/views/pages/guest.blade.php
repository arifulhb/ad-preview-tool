@extends('layouts.day.app')
@section('title', 'Welcome')
@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Welcome to {{ env('APP_NAME') }}</h1>
        <p class="">Create & Share Web Advertisement Snippets</p>
    </div>
@endsection
