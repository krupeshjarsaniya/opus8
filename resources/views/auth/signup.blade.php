@extends('layouts.app')
@section('title', 'Login')
@section('body-class', 'hd-auth-body')
@section('content')
<section class="remedy-layout-wrapper">
    <div class="container">
        <h1 class="text-center font-weight-light">Sign <b>Up</b></h1>
        <div style="border-top:5px solid #F1F1F1; width: 100px; margin: 25px auto"></div>
        <form>
            <div class="row mt-5">
            	<div class="col-lg-4 px-4"><h5>Strategy Deals</h5></div>
            	<div class="col-lg-4 px-4"><h5>Average Close Out</h5></div>
            	<div class="col-lg-4 px-4"><h5>Agent</h5></div>
            </div>

            <div class="row mt-3 border-top border-gray">
                <div class="col-lg-4 px-3  mt-2">
                    <img src="{{ asset('assets/images/avatar-img.png') }}" alt="remedy" style="width: 70px; height: 70px; object-fit: cover; border-radius: 50%;">
                    <label><h5 class="pl-3">Ben</h5></label>
                </div>
            	<div class="col-lg-4 px-3 bg-2 form-group mt-2">
            		<div class="remedy-input-icon-wrapper">
                        <input type="text" class=" form-control " name="" value="" placeholder="">
                    </div>
            	</div>
            	<div class="col-lg-4 px-3 bg-2 form-group mt-2">
                    <div class="remedy-input-icon-wrapper">
                        <input type="text" class=" form-control " name="" value="" placeholder="">
                    </div>
                </div>
            </div>

            <div class="row border-top border-gray">
                <div class="col-lg-4 px-3  mt-2">
                    <img src="{{ asset('assets/images/avatar-img.png') }}" alt="remedy" style="width: 70px; height: 70px; object-fit: cover; border-radius: 50%;">
                    <label><h5 class="pl-3">Ben</h5></label>
                </div>
                <div class="col-lg-4 px-3 bg-2 form-group mt-2">
                    <div class="remedy-input-icon-wrapper">
                        <input type="text" class=" form-control" name="" value="" placeholder="">
                    </div>
                </div>
                <div class="col-lg-4 px-3 bg-2 form-group mt-2">
                    <div class="remedy-input-icon-wrapper">
                        <input type="text" class=" form-control" name="" value="" placeholder="">
                    </div>
                </div>
            </div>

            <div class="row border-top border-gray">
                <div class="col-lg-4 px-3  mt-2">
                    <img src="{{ asset('assets/images/avatar-img.png') }}" alt="remedy" style="width: 70px; height: 70px; object-fit: cover; border-radius: 50%;">
                    <label><h5 class="pl-3">Ben</h5></label>
                </div>
                <div class="col-lg-4 px-3 bg-2 form-group mt-2">
                    <div class="remedy-input-icon-wrapper">
                        <input type="text" class=" form-control" name="" value="" placeholder="">
                    </div>
                </div>
                <div class="col-lg-4 px-3 bg-2 form-group mt-2">
                    <div class="remedy-input-icon-wrapper">
                        <input type="text" class=" form-control" name="" value="" placeholder="">
                    </div>
                </div>
            </div>

            <div class="row border-top border-gray">
                <div class="col-lg-4 px-3  mt-2">
                    <img src="{{ asset('assets/images/avatar-img.png') }}" alt="remedy" style="width: 70px; height: 70px; object-fit: cover; border-radius: 50%;">
                    <label><h5 class="pl-3">Ben</h5></label>
                </div>
                <div class="col-lg-4 px-3 bg-2 form-group mt-2">
                    <div class="remedy-input-icon-wrapper">
                        <input type="text" class=" form-control" name="" value="" placeholder="">
                    </div>
                </div>
                <div class="col-lg-4 px-3 bg-2 form-group mt-2">
                    <div class="remedy-input-icon-wrapper">
                        <input type="text" class=" form-control" name="" value="" placeholder="">
                    </div>
                </div>
            </div>

            <div class="row border-top border-gray">
                <div class="col-lg-4 px-3  mt-2">
                    <img src="{{ asset('assets/images/avatar-img.png') }}" alt="remedy" style="width: 70px; height: 70px; object-fit: cover; border-radius: 50%;">
                    <label><h5 class="pl-3">Ben</h5></label>
                </div>
                <div class="col-lg-4 px-3 bg-2 form-group mt-2">
                    <div class="remedy-input-icon-wrapper">
                        <input type="text" class=" form-control" name="" value="" placeholder="">
                    </div>
                </div>
                <div class="col-lg-4 px-3 bg-2 form-group mt-2">
                    <div class="remedy-input-icon-wrapper">
                        <input type="text" class=" form-control" name="" value="" placeholder="">
                    </div>
                </div>
            </div>

            <div class="form-btn-block">
                <button type="submit" class="remedy-login-btn">Sign up <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></button>
            </div>
        <form>
    <div>
</section>
@endsection
@push('js')

@endpush
