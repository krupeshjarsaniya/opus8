@extends('layouts.app')
@section('title', 'Login')
@section('body-class', 'hd-auth-body')
@section('content')
<section class="remedy-layout-wrapper">
    <div class="container">
        <div class="remedy-form-wrapper">
            <form method="post" id="login" class="hd-form" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <div class="remedy-input-icon-wrapper">
                        <i><img src="{{ asset('assets/images/mail-icon.svg') }}" alt="remedy"></i>
                        <input id="email" type="email" class=" form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Enter your email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="remedy-input-icon-wrapper">
                        <i><img src="{{ asset('assets/images/password-icon.svg') }}" alt="remedy"></i>
                        <input id="password" type="password" class=" form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Enter Password">
                    </div>
                </div>
                <div class="form-btn-block">
                    <button type="submit" class="remedy-login-btn">Sign in <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection