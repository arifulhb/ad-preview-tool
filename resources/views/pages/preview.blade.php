@extends('layouts.public')
@section('title', 'Preview')
@section('content')
    <div class="container-fluid mt-5">
        <article>
            <div class="row">
                <header><h1><i class="fa fa-ad text-danger"></i> {{ env('APP_NAME') }}</h1></header>
            </div>
            <div class="row">
                <div id="my-preview" data-ids="{{ $ids }}" class="container">
                    <div class="text-center mt-5">
                        <i class="fa fa-spin fa-spinner"></i> Loading Advertisement
                    </div>
                </div>
            </div>
        </article>
    </div>
@endsection
