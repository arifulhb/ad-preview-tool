@extends('layouts.day.app')
@section('title', 'Welcome')
@section('content')
<div class="container-fluid">
    @component('auth.layout', ['title'=> 'Login'])
        <form method="POST" action="{{ route('login') }}">
            @csrf
            @include('components.form-group', [
                'icon' => 'fa fa-envelope',
                'placeholder' => 'Email',
                'id' => 'name',
                'value' => old('email'),
                'name' => 'email',
                'error' => $errors->has('email') ? $errors->first('email') : null
            ])
            @include('components.form-group', [
                'icon' => 'fa fa-lock',
                'type' => 'password',
                'placeholder' => 'Password',
                'id' => 'password',
                'value' => old('password'),
                'name' => 'password',
                'error' => $errors->has('password') ? $errors->first('password') : null
            ])
            <div class="row align-items-center remember">
                <input type="checkbox">&nbsp;Remember Me
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="form-group mb-0">
                        <input type="submit" class="btn btn-primary"
                        value="Login" class="btn float-right login_btn">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <small>
                        <p class="mb-1 text-right mt-2">
                            <span class="text-muted">Forget Password</span>
                        </p>
                    </span>
                </div>
            </div>
        </form>
        @slot('footer')
            <p class="mb-1">Don't have an account?&nbsp;<a href="{{ url('/register') }}">Sign Up</a></p>
        @endslot
    @endcomponent
</div>
@endsection
