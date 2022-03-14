@extends('layouts.app')
@section('title', 'Login')
@section('body-class', 'hd-auth-body')
@section('content')
<section class="remedy-layout-wrapper">
    <div class="container">
        <h1 class="text-center font-weight-light">PSL<b>s</b></h1>
        <div class="row mt-5 mb-4">
            <div class="col-lg-2"><h5>Agent</h5></div>
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-3"><h5>New on Board</h5></div>
                    <div class="col-lg-3"><h5>Sector</h5></div>
                    <div class="col-lg-3"><h5>Company</h5></div>
                    <div class="col-lg-3"><h5>Action</h5></div>
                </div>
            </div>
        </div>

        @foreach ($agents as $agent)
            <div class="row border-top border-gray mt-2">
                <div class="col-lg-2 col-sm-12  mt-3">
                    <div class="row">
                        <img src="{{ asset('assets/images/avatar-img.png') }}" alt="remedy" class="col-lg-3 col-12 px-5 px-lg-0 rounded-circle p-0 psls_image">
                        <label class="col-lg-9 text-lg-left col-12 text-center mt-lg-2 mt-4 "><h5><a href="{{route('agent.chart',$agent)}}">{{$agent->first_name}}</a></h5></label>
                    </div>
                </div>

                <div class="col-lg-10 mt-2">
                    <form action="#" onsubmit="return false" method="post" name="Form_Name{{ $agent->first_name }}{{ $agent->id }}"  id="Form_Name{{ $agent->first_name }}{{ $agent->id }}">
                        <input type="hidden" value="{{$agent->id}}" name="agentId">
                        <div class="row">
                            <div class="col-lg-3 mt-4 mt-lg-0">
                                <div class="remedy-input-icon-wrapper">
                                    <input type="text" class="form-control " name="new_on_board" value="{{$agent->psls->new_on_board ?? ''}}" placeholder="New on Board">
                                </div>
                            </div>
                            <div class="col-lg-3 mt-4 mt-lg-0">
                                <div class="remedy-input-icon-wrapper">
                                    <input type="text" class="form-control " name="sector" value="{{$agent->psls->sector ??  ''}}" placeholder="Sector">
                                </div>
                            </div>
                            <div class="col-lg-3 mt-4 mt-lg-0">
                                <div class="remedy-input-icon-wrapper">
                                    <input type="text" class=" form-control " name="company" value="{{$agent->psls->company ?? ''}}" placeholder="Company">
                                </div>
                            </div>
                            <div class="col-lg-3 mt-4 mt-lg-0">
                                {{-- <a href="#" data-id="Form_Name_{{ $agent->first_name }}" onclick="SubmitBillings(this)" class="remedy-login-btn">Submit <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></a> --}}
                                <button type="button" class="remedy-login-btn mb-lg-0 mb-3" data-id="Form_Name{{ $agent->first_name }}{{ $agent->id }}" onclick="pslsSubmit(this)">Submit <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach

        {{-- @if ($show_loadmore)
        <div class="form-btn-block">
            <button type="submit" class="remedy-login-btn "><span id="load_more">Load More</span> <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></button>
        </div>
        @endif --}}
    <div>
</section>
@endsection

@push('js')
    @include('psls.js.psls-js')
@endpush
