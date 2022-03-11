@extends('layouts.app')
@section('title', 'Industry')
@section('body-class', 'hd-industry-body')
@section('content')
<section class="remedy-layout-wrapper">
    <div class="container">
        <h1 class="text-center font-weight-light">Sign Ups Broken down by <b class="">industry</b></h1>
        <div class="row mt-5">
            <div class="col-lg-2"><h6>Agent</h6></div>
            <div class="col-lg-10">
                <div class="row m-0">
                    <div class="col-lg-5">
                        <div class="row m-0">
                            <div class="col-lg-3"><h6>Health Care</h6></div>
                            <div class="col-lg-3"><h6>IT</h6></div>
                            <div class="col-lg-3"><h6>Gas & Oil</h6></div>
                            <div class="col-lg-3"><h6>Hospitality</h6></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4 border-top border-gray">
                <div class="col-lg-2 mt-2">
                    <img src="{{ asset('assets/images/avatar-img.png') }}" alt="remedy" class="col-lg-3 rounded-circle p-0">
                    <label><h5 class="pl-3">Ben</h5></label>
                </div>
                <div class="col-lg-10 mt-2">
                    <div class="row m-0">
                        <div class="col-lg-6 m-0 p-0">
                            <div class="row m-0">
                                <div class="col-lg-3">
                                     <div class="remedy-input-icon-wrapper">
                                        <input type="text" class=" form-control px-1 " name="" value="" autocomplete="" autofocus placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                     <div class="remedy-input-icon-wrapper">
                                        <input type="text" class=" form-control px-1 " name="" value="" autocomplete="" autofocus placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                     <div class="remedy-input-icon-wrapper">
                                        <input type="text" class=" form-control px-1 " name="" value="" autocomplete="" autofocus placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                     <div class="remedy-input-icon-wrapper">
                                        <input type="text" class=" form-control px-1 " name="" value="" autocomplete="" autofocus placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 m-0 p-0">
                            <div class="row m-0">
                                <div class="col-lg-3">
                                    <div class="remedy-input-icon-wrapper">
                                        <input type="text" class=" form-control px-1 " name="" value="" autocomplete="" autofocus placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="remedy-input-icon-wrapper">
                                        <input type="text" class=" form-control px-1 " name="" value="" autocomplete="" autofocus placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="remedy-input-icon-wrapper">
                                        <input type="text" class=" form-control px-1 " name="" value="" autocomplete="" autofocus placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="remedy-input-icon-wrapper">
                                        <input type="text" class=" form-control px-1 " name="" value="" autocomplete="" autofocus placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4 border-top border-gray">
                <div class="col-lg-2 mt-2">
                    <img src="{{ asset('assets/images/avatar-img.png') }}" alt="remedy" class="col-lg-3 rounded-circle p-0">
                    <label><h5 class="pl-3">Ben</h5></label>
                </div>
                <div class="col-lg-10 mt-2">
                    <div class="row m-0">
                        <div class="col-lg-6 m-0 p-0">
                            <div class="row m-0">
                                <div class="col-lg-3">
                                     <div class="remedy-input-icon-wrapper">
                                        <input type="text" class=" form-control px-1 " name="" value="" autocomplete="" autofocus placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                     <div class="remedy-input-icon-wrapper">
                                        <input type="text" class=" form-control px-1 " name="" value="" autocomplete="" autofocus placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                     <div class="remedy-input-icon-wrapper">
                                        <input type="text" class=" form-control px-1 " name="" value="" autocomplete="" autofocus placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                     <div class="remedy-input-icon-wrapper">
                                        <input type="text" class=" form-control px-1 " name="" value="" autocomplete="" autofocus placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 m-0 p-0">
                            <div class="row m-0">
                                <div class="col-lg-3">
                                    <div class="remedy-input-icon-wrapper">
                                        <input type="text" class=" form-control px-1 " name="" value="" autocomplete="" autofocus placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="remedy-input-icon-wrapper">
                                        <input type="text" class=" form-control px-1 " name="" value="" autocomplete="" autofocus placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="remedy-input-icon-wrapper">
                                        <input type="text" class=" form-control px-1 " name="" value="" autocomplete="" autofocus placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="remedy-input-icon-wrapper">
                                        <input type="text" class=" form-control px-1 " name="" value="" autocomplete="" autofocus placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="industryAgent">
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
        let page = 1;
        $(".remedy-login-btn").on("click", function() {
            page++;
            $.ajax({
                url: "{{ url('/agent-loadmore-industry') }}?page=" + page,
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
                        $("#industryAgent").append(response.html);
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

    function SubmitBillings(ele)
    {
        var formId = $(ele).data('id');
        console.log(formId);
        let myform = document.getElementById(formId);
        let fd = new FormData(myform );

        $.ajax({
            url: "{{ route('industry.chart.submit') }}",
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
