@extends('layouts.app')
@section('title', 'Login')
@section('body-class', 'hd-auth-body')
@section('content')
<section class="remedy-layout-wrapper">
    <div class="container">
        <h1 class="text-center font-weight-light mb-3">PSL<b>s</b></h1>
        <div style="border-top:5px solid #F1F1F1; width: 100px; margin: 0 auto"></div>
            <div class="row mt-5">
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
                {{-- @dump($agent->psls->new_on_board) --}}
                <div class="row border-top border-gray mt-5">
                    <div class="col-lg-2 mt-2">
                        <img src="{{ asset('assets/images/demo.jpg') }}" alt="remedy"  style="width: 70px; height: 70px; object-fit: cover; border-radius: 50%;">
                        <label><h5 class="pl-2"><a href="{{route('agent.chart',$agent)}}">{{$agent->first_name}}</a></h5></label>
                    </div>

                    <div class="col-lg-10 mt-2">
                        <form action="#" onsubmit="return false" method="post" name="Form_Name_{{ $agent->first_name }}"  id="Form_Name_{{ $agent->first_name }}">
                            <input type="hidden" value="{{$agent->id}}" name="agentId">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="remedy-input-icon-wrapper">
                                        <input type="text" class="form-control " name="new_on_board" value="{{$agent->psls->new_on_board ?? ''}}" autofocus placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="remedy-input-icon-wrapper">
                                        <input type="text" class="form-control " name="sector" value="{{$agent->psls->sector ??  ''}}" autofocus placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="remedy-input-icon-wrapper">
                                        <input type="text" class=" form-control " name="company" value="{{$agent->psls->company ?? ''}}" autofocus placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    {{-- <a href="#" data-id="Form_Name_{{ $agent->first_name }}" onclick="SubmitBillings(this)" class="remedy-login-btn">Submit <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></a> --}}
                                    <button type="button" class="remedy-login-btn" data-id="Form_Name_{{ $agent->first_name }}" onclick="pslsSubmit(this)">Submit <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach

            {{-- <div class="row border-top border-gray mt-4">
                <div class="col-lg-2 mt-2">
                     <img src="{{ asset('assets/images/avatar-img.png') }}" alt="remedy" class="col-lg-3 rounded-circle p-0">
                    <label><h5 class="pl-3">Ben</h5></label>
                </div>
                <div class="col-lg-10 mt-2">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="remedy-input-icon-wrapper">
                                    <input type="text" class=" form-control " name="" value="" autocomplete="" autofocus placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="remedy-input-icon-wrapper">
                                    <input type="text" class=" form-control " name="" value="" autocomplete="" autofocus placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="remedy-input-icon-wrapper">
                                    <input type="text" class=" form-control " name="" value="" autocomplete="" autofocus placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <button type="submit" class="remedy-login-btn">Submit <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></button>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="form-btn-block">
                <button type="submit" class="remedy-login-btn">Submit <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></button>
            </div> --}}
    <div>
</section>
@endsection

@push('js')
    @include('psls.js.psls-js')
@endpush
