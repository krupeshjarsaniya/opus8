@extends('layouts.app')
@section('title', 'Login')
@section('body-class', 'hd-auth-body')
@section('content')
<section class="remedy-layout-wrapper">
    <div class="container">
        <h1 class="text-center font-weight-light">Sign <b>Up</b></h1>
        <div style="border-top:5px solid #F1F1F1; width: 100px; margin: 25px auto"></div>
        <form>
            <div class="row mt-5 mb-3">
            	<div class="col-lg-3 px-4"><h5>Strategy Deals</h5></div>
            	<div class="col-lg-3 px-4"><h5>Average Close Out</h5></div>
                <div class="col-lg-3 px-4"><h5>Agent</h5></div>
            	<div class="col-lg-3 px-4 text-center"><h5>Button</h5></div>
            </div>

            <div class="row  border-top border-gray mt-3">
                <div class="col-lg-3 my-0 px-3">
                    <div class="row">
                        <img src="{{ asset('assets/images/avatar-img.png') }}" alt="remedy" class="col-lg-2 mt-lg-3 rounded-circle p-lg-0 px-5">
                        <label class="col-lg-9 col-12 text-lg-left text-center mt-lg-4 mt-4"><h5>Ben</h5></label>
                    </div>
                </div>
            	<div class="col-lg-3 mt-lg-3 mb-lg-0 px-3 bg-2 form-group ">
            		<div class="remedy-input-icon-wrapper">
                        <input type="text" class=" form-control " name="" value=""  placeholder="Average Close Out">
                    </div>
            	</div>
            	<div class="col-lg-3 mt-lg-3 mb-lg-0 px-3 bg-2 form-group ">
                    <div class="remedy-input-icon-wrapper">
                        <input type="text" class=" form-control " name="" value=""  placeholder="Agent">
                    </div>
                </div>
                <div class="col-lg-3 mt-lg-3 mb-lg-0 px-3 bg-2 form-group ">
                        <button type="submit" class="remedy-login-btn">Sign up <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></button>
                </div>
            </div>

            <div class="row  border-top border-gray mt-3">
                <div class="col-lg-3 my-0 px-3">
                    <div class="row">
                        <img src="{{ asset('assets/images/avatar-img.png') }}" alt="remedy" class="col-lg-2 mt-lg-3 rounded-circle p-lg-0 px-5">
                        <label class="col-lg-9 col-12 text-lg-left text-center mt-lg-4 mt-4"><h5>Ben</h5></label>
                    </div>
                </div>
                <div class="col-lg-3 mt-lg-3 mb-lg-0 px-3 bg-2 form-group ">
                    <div class="remedy-input-icon-wrapper">
                        <input type="text" class=" form-control " name="" value=""  placeholder="Average Close Out">
                    </div>
                </div>
                <div class="col-lg-3 mt-lg-3 mb-lg-0 px-3 bg-2 form-group ">
                    <div class="remedy-input-icon-wrapper">
                        <input type="text" class=" form-control " name="" value=""  placeholder="Agent">
                    </div>
                </div>
                <div class="col-lg-3 mt-lg-3 mb-lg-0 px-3 bg-2 form-group ">
                        <button type="submit" class="remedy-login-btn">Sign up <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></button>
                </div>
            </div>

            <div class="row  border-top border-gray mt-3">
                <div class="col-lg-3 my-0 px-3">
                    <div class="row">
                        <img src="{{ asset('assets/images/avatar-img.png') }}" alt="remedy" class="col-lg-2 mt-lg-3 rounded-circle p-lg-0 px-5">
                        <label class="col-lg-9 col-12 text-lg-left text-center mt-lg-4 mt-4"><h5>Ben</h5></label>
                    </div>
                </div>
                <div class="col-lg-3 mt-lg-3 mb-lg-0 px-3 bg-2 form-group ">
                    <div class="remedy-input-icon-wrapper">
                        <input type="text" class=" form-control " name="" value=""  placeholder="Average Close Out">
                    </div>
                </div>
                <div class="col-lg-3 mt-lg-3 mb-lg-0 px-3 bg-2 form-group ">
                    <div class="remedy-input-icon-wrapper">
                        <input type="text" class=" form-control " name="" value=""  placeholder="Agent">
                    </div>
                </div>
                <div class="col-lg-3 mt-lg-3 mb-lg-0 px-3 bg-2 form-group ">
                    <button type="submit" class="remedy-login-btn">Sign up <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></button>
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

<script>

 $(document).ready(function() {
        var mql = window.matchMedia("screen and (min-width: 1024px)");
        if (mql.matches)
        { // if media query matches
            $('.form-control').removeAttr('placeholder');
        }
    });



</script>

@endpush
