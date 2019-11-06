@extends('layouts.day.app')
@section('title', 'Home')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <h1 class="mt-4">{{ __('Dashboard') }}</h1>
        </div>
        <div id="my-advertisements" data-title="My Advertisements">Loading my advertisements</div>

    </div>
@endsection
