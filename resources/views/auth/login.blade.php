@extends('layouts.day.app')
@section('title', 'Welcome')
@section('content')
<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-lg-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Sign In</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            @error('email')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                            <input
                                type="email" class="form-control"
                                placeholder="email"
                                name="email" value="{{ old('email') }}"
                                required
                                autocomplete="email"
                                autofocus>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="password"
                                name="password">
                        </div>
                        <div class="row align-items-center remember">
                            <input type="checkbox">&nbsp;Remember Me
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary"
                            value="Login" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <div class="card-footer pb-2 pt-2">
                    <small>
                        <p class="mb-1">Don't have an account?&nbsp;<a href="#">Sign Up</a></p>
                    </small>
                    <small>
                        <p class="mb-1"><a href="#">Forgot your password?</a></p>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
