@extends('layouts.day.app')
@section('title', 'Edit Advertisement')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <h1 class="mt-4">{{ __('Edit Advertisement') }}</h1>
        </div>

        <div id="edit-advertisement" data-id={{ $id }}>
            <div class="row">
                <div class="col-lg-12  text-center">
                    <h3><i class="fa fa-spin fa-spinner text-danger"></i> Loading Advertisement Edit Panel</h3>
                </div>
            </div>
        </div>

    </div>
@endsection
