@csrf
<div class="row">
    <div class="col-md-4">
        <div class="remedy-agent-preview-block">
            <div class="remedy-agent-preview-img">
                <input type="file" accept="image/*" name="profile_pic" id="profile_pic" class="profile_pic">
                <img src="{{ $agent_info->profile_pic ?? asset('assets/images/profile_small.svg') }}" class="profile_pic_prev" alt="{{ $agent_info->first_name ?? '' }}">
                <a href="javascript:void(0);" class="profile_pic_handler">Click to upload</a>
            </div>
			 <div class="remedy-return-back-arrow">
				<a href="{{ url('/agent') }}"><img src="{{ asset('assets/images/left-back-arrow-icon.svg') }}" alt="remedy">return to the agent list</a>
			</div>
        </div>
    </div>
    <div class="col-md-8">
        <div>
            <div class="form-group">
                <div class="remedy-input-icon-wrapper">
                    <i><img src="{{ asset('assets/images/mail-icon.svg') }}" alt="remedy"></i>
                    <input type="email" class="form-control" id="email" value="{{old('email', $agent_info->email ?? '')}}" name="email" placeholder="Your email">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <div class="remedy-input-icon-wrapper">
                            <i><img src="{{ asset('assets/images/user-icon.svg') }}" alt="remedy"></i>
                            <input type="text" class="form-control" id="first_name" value="{{old('first_name', $agent_info->first_name ?? '')}}" name="first_name" placeholder="Your first name">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <div class="remedy-input-icon-wrapper">
                            <i><img src="{{ asset('assets/images/user-icon.svg') }}" alt="remedy"></i>
                            <input type="text" class="form-control" id="last_name" value="{{old('last_name', $agent_info->last_name ?? '')}}" name="last_name" placeholder="Your last name">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="remedy-input-icon-wrapper">
                    <i><img src="{{ asset('assets/images/shop-icon.svg') }}" alt="remedy"></i>
                    <input type="text" class="form-control" id="sales_type" value="{{old('sales_type', $agent_info->sales_type ?? '')}}" name="sales_type" placeholder="Sales Type">
                    <div class="col-md-12 eng-error-block">
                        <small class="text-danger engineer_error"></small>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="remedy-input-icon-wrapper">
                    <i><img src="{{ asset('assets/images/percentage-icon.svg') }}" alt="remedy"></i>
                    <input type="number" class="form-control" id="sales_percentage" value="{{old('sales_percentage', $agent_info->sales_percentage ?? '')}}" name="sales_percentage" placeholder="Sales Percentage">
                </div>
            </div>

             {{-- Start by dhaval --}}
             <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <div class="remedy-input-icon-wrapper">
                            <i><img src="{{ asset('assets/images/user-icon.svg') }}" alt="remedy"></i>
                            <input type="text" class="form-control" id="hour_rate" value="{{old('hour_rate', $agent_info->hour_rate ?? '')}}" name="hour_rate" placeholder="Hour Rate">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <div class="remedy-input-icon-wrapper">
                            {{-- <i><img src="{{ asset('assets/images/user-icon.svg') }}" alt="remedy"></i> --}}
                            {{-- <input type="text" class="form-control" id="sector_of_the_deal" value="{{old('sector_of_the_deal', $agent_info->sector_of_the_deal ?? '')}}" name="sector_of_the_deal" placeholder="Sector Of The Deal"> --}}
                            {{-- <select class="form-control" id="sector_of_the_deal" name="sector_of_the_deal" placeholder="Sector Of The Deal">
                                <option value="IT">IT</option>
                                <option value="Industry">Industry</option>
                                <option value="School">School</option>
                                <option value="College">College</option>
                            </select> --}}

                            <select class="form-select form-control" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="remedy-input-icon-wrapper">
                    <i><img src="{{ asset('assets/images/percentage-icon.svg') }}" alt="remedy"></i>
                    <input type="text" class="form-control" id="agency_of_deal" value="{{old('agency_of_deal', $agent_info->agency_of_deal ?? '')}}" name="agency_of_deal" placeholder="Agency Of Deal">
                </div>
            </div>
            {{-- End by dhaval --}}

            {{-- @if (isset($agent_info) && !empty($agent_info->agent_songs) && count($agent_info->agent_songs) >= 1)
            <div class="row">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agent_info->agent_songs as $songs)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $songs->song_name }}</td>
                            <td><a href="javascript:void(0);" class="delete-song" data-id="{{ $songs->id }}"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif --}}
            <div class="form-group">
                <div class="hd-file-upload hd-form-bg-section d-none" id="song_upload_wrapper">
                    <label id="song_file-error" class="error d-none" for="song_file">This field is required</label>
                    <div class="hd-file-data">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/images/upload.svg')}}" alt="" />
                            <div class="hd-file-border mb-0">
                                <!-- <span class="lbl-text">Drag files here or <b>browse</b> (up to 20 files)</span> -->
                                <span class="lbl-text">Drag files here or <b>browse</b></span>
                                <label class="file_name"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (isset($agent_info) && $agent_info->id)
                {{-- <p>If you upload song than it will remove old song and upload new one.</p> --}}
            @endif
            <div class="row beat-file-names">
                <div class="col-md-12">
                    <div class="uploaded_file_list"></div>
                </div>
            </div>
            <div class="form-btn-block">
                <button type="submit" class="remedy-login-btn">{{isset($agent_info->id) && $agent_info->id != "" ? 'Update' : 'Add Agent'}} <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    var agent_id = "{{$agent_info->id ?? '' }}";
    var song_files_titles = [];
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone(".dropzone", {
        maxFiles: 1,
        maxFilesize: 2,
        resizeQuality: 1.0,
        paramName: "song_file",
        autoProcessQueue: false,
        acceptedFiles: ".wav, .mp3, .aiff, .m4a",
        clickable: "#song_upload_wrapper",
        addRemoveLinks: true,
        previewsContainer: ".beat-file-names",
        timeout: 60000,
        init: function() {
            this.on("addedfile", function(file) {
                var maxFiles = 1;
                if (this.files.length - 1 == maxFiles) {
                    alert("You reached to maximum 1 file upload");
                    this.removeFile(file);
                    return false;
                }

                var _size = file.size;
                var fSExt = new Array('Bytes', 'KB', 'MB', 'GB'),
                    i = 0;
                while (_size > 900) {
                    _size /= 1024;
                    i++;
                }
                var exactSize = (Math.round(_size * 100) / 100);
                if (exactSize > "200" && (fSExt[i] == "MB" || fSExt[i] == "GB")) {
                    alert("Maximum allowed file size must be less than or equals to 50 MB");
                    this.removeFile(file);
                    return false;
                }

                var fname = file.name;
                song_files_titles.push(fname);

                var file_count = this.files.length;
                if (file_count > 1) {
                    $("#song_upload_wrapper").find('span.lbl-text').text(file_count + " files uploaded");
                } else {
                    $("#song_upload_wrapper").find('span.lbl-text').text(fname);
                }

            });
        },
        removedfile: function(file) {
            song_files_titles = [];
            if (myDropzone.files || myDropzone.files.length) {
                var fname = "";
                $.each(myDropzone.files, function(index, file) {
                    fname = file.name;
                    song_files_titles.push(fname);
                });
                var file_count = myDropzone.files.length;
                if (file_count == 0) {
                    // $("#song_upload_wrapper").find('span.lbl-text').html("Drag files here or <b>browse</b> (up to 20 files)");
                    $("#song_upload_wrapper").find('span.lbl-text').html("Drag files here or <b>browse</b>");
                } else if (file_count > 1) {
                    $("#song_upload_wrapper").find('span.lbl-text').text(file_count + " files uploaded");
                } else {
                    $("#song_upload_wrapper").find('span.lbl-text').text(fname);
                }
            }
            file.previewElement.remove();
        },
        success: function(file, response) {},
        error: function(file, response) {
            return false;
        }
    });

    $(document).ready(function(e) {
        $(".profile_pic_handler").click(function() {
            $("#profile_pic").trigger("click");
        });

        if ($(".delete-song").length >= 1) {
            $(".delete-song").on("click", function(e) {
                e.preventDefault();
                var parents = $(this).parents("tr");
                var id = $(this).data("id");
                $.confirm({
                    title: 'Are you sure ?',
                    content: 'Are you sure you want to delete this song?',
                    type: 'red',
                    buttons: {
                        confirm: {
                            text: 'Yes',
                            btnClass: 'btn-red',
                            action: function() {
                                var csrf_token = $('meta[name="csrf-token"]').attr("content");
                                let url = '{{ $module_route }}/' + agent_id + '/songs/' + id;
                                $.ajax({
                                    url: url,
                                    method: "DELETE",
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    headers: {
                                        "X-CSRF-TOKEN": csrf_token
                                    },
                                    success: function(response, textStatus, jqXHR) {
                                        if (jqXHR.status == 200 || jqXHR.status == 204) {
                                            toastr.success(response.message);
                                            parents.remove();
                                        } else {
                                            toastr.success(response.message);
                                        }
                                    },
                                    error: function() {

                                    }
                                });
                            }
                        },
                        cancel: {
                            text: 'Cancel',
                        }
                    }
                });
            });
        }

        $(document).on('change', "#profile_pic", function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    if ($(".profile_pic_prev").length >= 1) {
                        $(".profile_pic_prev").attr('src', e.target.result);
                    } else {
                        $('.profile_pic_prev').html('<img src="' + e.target.result + '" onerror="this.src={{ asset("assets/images/profile_small.svg") }}" id="image_preview" height="100%" width="100%">');
                    }
                };
                reader.readAsDataURL(this.files[0]);
            }
        });

        var isRequiredProfile = "{{ !empty($agent_info->profile_pic) }}"

        $(".remedy-login-btn").on("click", function() {
            //if (myDropzone.files && myDropzone.files.length || agent_id) {
            //if (agent_id) {
                $("#agent-form-handler").validate({
                    ignore: [],
                    rules: {
                        "email": {
                            required: true,
                            email: true,
                        },
                        "first_name": "required",
                        "last_name": "required",
                        /* "songs[]": {
                            required: false,
                            accept: "audio/*",
                        }, */
                        "profile_pic": {
                            required: !isRequiredProfile,
                            accept: "image/*",
                        },
                        "sales_type": "required",
                        "sales_percentage": "required",
                    },
                    messages: {
                        "email": "This field is required",
                        "first_name": "This field is required",
                        "last_name": "Please Choose an option",
                        /* "songs[]": {
                            required: "This field is required",
                            accept: "Invalid file type uploaded"
                        }, */
                        "profile_pic": {
                            required: "This field is required",
                            accept: "Invalid file type uploaded"
                        },
                        "sales_type": "Please Choose an option",
                        "sales_percentage": "Please Choose an option",
                    },
                    errorPlacement: function(error, element) {
                        if (element.hasClass("song_file")) {
                            error.insertAfter(".songs_file");
                        } else if (element.hasClass("profile_pic")) {
                            error.insertAfter(".profile_pic_handler");
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    submitHandler: function(form, event) {
                        if ($(form).valid()) {
                            //if (myDropzone.files || myDropzone.files.length || agent_id) {
                            //if (agent_id) {
                                var formData = new FormData(form);
                                var url = form.action;
                                var method = "POST";
                                /* if (myDropzone.files || myDropzone.files.length) {
                                    $.each(myDropzone.files, function(index, file) {
                                        formData.append('songs[]', file, file.name);
                                    });
                                } */
                                var csrf_token = $('meta[name="csrf-token"]').attr("content");
                                $.ajax({
                                    url: url,
                                    type: method,
                                    data: formData,
                                    dataType: 'json',
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    headers: {
                                        "X-CSRF-TOKEN": csrf_token
                                    },
                                    beforeSend: function() {
                                        $(".loader_area").addClass("show");
                                    },
                                    success: function(response, textStatus, jqXHR) {
                                        if (jqXHR.status == 200 || jqXHR.status == 204) {
                                            window.location = "{{ url('/agent') }}";
                                        } else {}
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
                            //}
                        }
                    }
                });
           /*  } else {
                $("#song_file-error").removeClass("d-none");
                return false;
            } */
        });
    });
</script>
@endpush
