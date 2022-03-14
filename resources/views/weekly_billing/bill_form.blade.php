@extends('layouts.app')
@section('title', 'Weekly Billing')
@section('body-class', 'hd-billing-body')
@section('content')
<section class="remedy-layout-wrapper">
    <div class="container">

        <h1 class="text-center font-weight-light">Weekly <b>Billings</b></h1>
        @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
        @endif
        <div class="row mt-5">
        	<div class="col-lg-3"><h5>Agent</h5></div>
        	<div class="col-lg-3"><h5>Weekly Billings</h5></div>
        	<div class="col-lg-3"><h5>Average Close Out</h5></div>
        	<div class="col-lg-3 text-center"><h5>Action</h5></div>
        </div>


        <div id="agentBilling">
            {!! $html !!}
        </div>
        @if ($show_loadmore)
        <div class="form-btn-block">
            <button type="submit" class="remedy-login-btn"><span id="load_more">Load More</span> <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></button>
        </div>
        @endif
    <div>
</section>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {

        // Placeholder Remove
        placeholder();

        let page = 1;
        $(".remedy-login-btn").on("click", function() {
            page++;
            $.ajax({
                url: "{{ url('/agent-loadmore-biling') }}?page=" + page,
                type: 'POST',
                dataType: 'json',
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
                success: function(response) {
                    if (response.status) {
                        $("#agentBilling").append(response.html);
                        if (!response.show_loadmore) {
                            $(".remedy-login-btn").remove();
                        }
                    }
                },
                error: function(error) {
                    var message = null;
                    if (typeof error.responseJSON.errors != "undefined") {
                        $.each(error.responseJSON.errors, function(id, topic) {
                            message = topic[0];
                            return false;
                        });
                    }
                    if (!message) {
                        message = error.responseJSON.message;
                    }
                    toastr.error(message);
                }
            });
        })
    });

    function placeholder()
    {
        var mql = window.matchMedia("screen and (min-width: 1024px)");
        if (mql.matches)
        { // if media query matches
            $('.form-control').removeAttr('placeholder');
        }
    }

    function SubmitBillings(ele)
    {
        var formId = $(ele).data('id');
        console.log(formId);
        let myform = document.getElementById(formId);
        let fd = new FormData(myform );

        $.ajax({
            url: "{{ route('bill.chart.submit') }}",
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
            complete: function() {
                $(".loader_area").removeClass("show");
            },

        });
    }
</script>
@endpush
