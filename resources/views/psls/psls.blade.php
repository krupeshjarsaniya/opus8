@extends('layouts.app')
@section('title', 'Login')
@section('body-class', 'hd-auth-body')
@section('content')
<section class="remedy-layout-wrapper">
    <div class="container">
        <h1 class="text-center font-weight-light">PSL<b>s</b></h1>
        @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session()->get('error') }}
        </div>
        @endif
        <div class="row mt-5 mb-4">
            <div class="col-lg-2"><h5>Agent</h5></div>
            <div class="col-lg-10">
                <div class="row mx-0">
                    <div class="col-lg-3"><h5>New on Board</h5></div>
                    <div class="col-lg-3"><h5>Sector</h5></div>
                    <div class="col-lg-3"><h5>Company</h5></div>
                    <div class="col-lg-3"><h5>Action</h5></div>
                </div>
            </div>
        </div>

        <div id="pslsAgent">
            {!! $html !!}
        </div>

        @if($show_loadmore)
            <div class="form-btn-block">
                <button type="submit" class="remedy-login-btn removeButton"><span id="load_more">Load More</span> <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></button>
            </div>
        @endif
    <div>
</section>
@endsection

@push('js')
    @include('psls.js.psls-js')
@endpush
