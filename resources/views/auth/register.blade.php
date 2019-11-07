@extends('layouts.day.app ')
@section('title', 'Register')
@section('content')

<div class="container-fluid">
    @component('auth.layout', ['title'=> 'Register'])
        <form name="my-form" onsubmit="return validform()" class=""
            action="{{ route('register') }}" method="post">
            @csrf
            @include('components.form-group', [
                'icon' => 'fa fa-user',
                'placeholder' => 'Name',
                'id' => 'name',
                'value' => old('name'),
                'name' => 'name',
                'error' => $errors->has('name') ? $errors->first('name') : null
            ])

            @include('components.form-group', [
                'icon' => 'fa fa-envelope',
                'placeholder' => 'Email',
                'type' => 'email',
                'value' => old('email'),
                'id' => 'email',
                'name' => 'email',
                'error' => $errors->has('email') ? $errors->first('email') : null
            ])


            @include('components.form-group', [
                'icon' => 'fa fa-link',
                'placeholder' => 'username',
                'id' => 'account',
                'value' => old('account'),
                'name' => 'account',
                'error' => $errors->has('account') ? $errors->first('account') : null
            ])

            @include('components.form-group', [
                'icon' => 'fa fa-lock',
                'placeholder' => 'Password',
                'type' => 'password',
                'id' => 'password',
                'name' => 'password',
                'error' => $errors->has('password') ? $errors->first('password') : null
            ])

            @include('components.form-group', [
                'icon' => 'fa fa-lock',
                'placeholder' => 'Conrim Password',
                'type' => 'password',
                'id' => 'password_confirmation',
                'name' => 'password_confirmation',
                'error' => $errors->has('password_confirmation') ? $errors->first('password_confirmation') : null
            ])

            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
            </div>
        </form>
        @slot('footer')
            <p class="mb-1">Already have an account?&nbsp;<a href="{{ url('/login') }}">Sign in</a></p>
        @endslot
    @endcomponent
</div>
@endsection
