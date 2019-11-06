@extends('layouts.day.app')
@section('title', 'Add New Advertisement')
@section('content')
<div class="container-fluid">
    <div class="page-header mb-5">
        <h1 class="mt-4">{{ __('Add Aew Advertisement') }}</h1>
        <a href="{{ url('/home') }}"><i class="fa fa-arrow-circle-left"></i> Back</a>
    </div>
    <div id="add-advertisement">
        <div class="row">
            <div class="col-lg-12  text-center">
                <h3><i class="fa fa-spin fa-spinner text-danger"></i> Loading New Advertisement Panel</h3>
            </div>
        </div>
    </div>
</div>
@endsection
