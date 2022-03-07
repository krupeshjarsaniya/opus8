@extends('layouts.app')
@section('title', 'Welcome')
@section('content')
<section class="remedy-layout-wrapper">
    <div class="container">
        <div class="remedy-form-wrapper">
            <form>
                <div class="form-group">
                    <div class="remedy-input-icon-wrapper">
                        <i><img src="{{ asset('assets/images/mail-icon.svg') }}" alt="remedy"></i>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="remedy-input-icon-wrapper">
                        <i><img src="{{ asset('assets/images/password-icon.svg') }}" alt="remedy"></i>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
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