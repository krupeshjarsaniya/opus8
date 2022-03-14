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

            @foreach ($agents as $agent)
            <form action="#" onsubmit="return false" method="post" name="Form_Name_{{ $agent->first_name }}_{{ $agent->id }}"  id="Form_Name_{{ $agent->first_name }}_{{ $agent->id }}">
                <div class="row mt-3 border-top border-gray">
                    <div class="col-lg-3 px-3  mt-2">
                        <img src="{{ asset('assets/images/avatar-img.png') }}" alt="remedy" class="col-lg-2 rounded-circle p-0">
                        <label><h5 class="pl-3">{{$agent->first_name}}</h5></label>
                        <input type="hidden" name="agentId" id="agentId" value="{{ $agent->id }}">
                    </div>

                    <div class="col-lg-3 px-3 bg-2 form-group mt-2">
                        <div class="remedy-input-icon-wrapper">
                            <input type="text" class=" form-control " name="average_close_out" value="{{ $agent->signup->average_close_out ?? '' }}"   placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-3 px-3 bg-2 form-group mt-2">
                        <div class="remedy-input-icon-wrapper">
                            <input type="text" class=" form-control " name="agent" value="{{ $agent->signup->agent ?? '' }}" placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-3 px-3 bg-2 form-group mt-2">
                        {{-- <button type="submit" class="remedy-login-btn">Sign up <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></button> --}}
                        <button type="button" class="remedy-login-btn" data-id="Form_Name_{{ $agent->first_name }}_{{ $agent->id }}" onclick="signUpSubmit(this)">Submit <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></button>
                    </div>
                </div>
            </form>

                {{-- <div class="form-btn-block">
                    <button type="submit" class="remedy-login-btn">Sign up <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></button>
                </div> --}}
            @endforeach
    <div>
</section>
@endsection
@push('js')
<script>
    /* Store Sign Up Data */
    function signUpSubmit(ele)
    {
        var formId = $(ele).data('id');
        // console.log(formId);
        let myform = document.getElementById(formId);
        let fd = new FormData(myform );

        $.ajax({
            url: "{{ route('signup.store') }}",
            type: 'POST',
            dataType: 'json',
            data:fd,
            cache: false,
            contentType: false,
            processData: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            beforeSend: function() {
                $(".remedy-login-btn #load_more").text("loading");
                $(".loader_area").addClass("show");
            },
            complete : function() {
                $(".remedy-login-btn #load_more").text("Load More");
                $(".loader_area").removeClass("show");
            },
            success: function(response, textStatus, jqXHR) {
                if (jqXHR.status == 200) {
                    toastr.success(response.message);
                }

                // if (response.status) {
                //     $("#industryAgent").append(response.html);
                //     if (!response.show_loadmore) {
                //         $(".remedy-login-btn").remove();
                //     }
                // }
            },
            error: function(error) {
                var message = null;
                if (error.responseJSON) {
                    if (typeof error.responseJSON.errors != "undefined") {
                        $.each(error.responseJSON.errors, function(id, topic) {
                            message = topic[0];
                            return false;
                        });
                    }
                    if (!message) {
                        message = error.responseJSON.message;
                    }
                }
                if (!message) {
                    message = 'Something went wrong'
                }
                toastr.error(message);
            },
            complete: function(data) {

                $(".loader_area").removeClass("show");

                if (data.status == 401)
                {
                    $.each(data.error1, function (index, value) {
                        $('.err_' + index+' input').addClass('border border-danger');
                        $('.err_' + index).append('<span class="small alerts text-danger">' + value + '</span>');
                    });
                }

                // location.reload()
            },

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
