<script>
    /* Placeholder */

    $(document).ready(function() {
        var mql = window.matchMedia("screen and (min-width: 1024px)");
        if (mql.matches)
        { // if media query matches
            $('.form-control').removeAttr('placeholder');
        }
    });

    /* Store Agent Psls Data */

    $(document).ready(function() {
        var mql = window.matchMedia("screen and (min-width: 1024px)");
        if (mql.matches)
        { // if media query matches
            $('.form-control').removeAttr('placeholder');
        }
    });


    function pslsSubmit(ele)
    {
        var formId = $(ele).data('id');
        // console.log(formId);
        let myform = document.getElementById(formId);
        let fd = new FormData(myform );

        $.ajax({
            url: "{{ route('psls.store') }}",
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

        });
    }
</script>

