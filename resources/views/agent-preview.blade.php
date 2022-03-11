@extends('layouts.app')
@section('title', 'Agent Preview')
@section('content')
<section class="remedy-layout-wrapper">
    <div class="container">
        <div class="">
            <div class="remedy-logout-details-block">
                <h2>Agent <span>Preview</span></h2>
                <span class="border-line"></span>
            </div>
            <div class="row">
                <div class="col-md-5 col-lg-6">
                    <div class="remedy-agent-preview-block">
                        <div class="remedy-agent-preview-img">
                            <a href="{{ route('agent.edit', ['agent' => $agent_info->id]) }}"><img src="{{ $agent_info->profile_pic }}" alt="{{ $agent_info->first_name }}"></a>
                        </div>
                        <div class="user-details preview-btn d-flex justify-content-center mt-3 ml-5">
                            <div class="mr-3 ml-3">
                                <a class="preview-btn" href="{{ route('agent.edit', ['agent' => $agent_info->id]) }}">Edit <i class="fa fa-pencil"></i></a>
                            </div>
                            <div>
                                <a class="preview-btn delete-agent" data-id="{{ $agent_info->id }}" href="javascript:void(0);">Delete <i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                        <div class="remedy-return-back-arrow">
                            <a href="{{ url('/agent') }}"><img src="{{ asset('assets/images/left-back-arrow-icon.svg') }}" alt="remedy">return to the agent list</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-lg-6">
                    <div>
                        <div class="form-group">
                            <div class="remedy-input-icon-wrapper">
                                <i><img src="{{ asset('assets/images/mail-icon.svg') }}" alt="remedy"></i>
                                <input type="email" disabled value="{{ $agent_info->email }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ihan@gmail.com">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="remedy-input-icon-wrapper">
                                        <i><img src="{{ asset('assets/images/user-icon.svg') }}" alt="remedy"></i>
                                        <input type="text" disabled value="{{ $agent_info->first_name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ihan">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="remedy-input-icon-wrapper">
                                        <i><img src="{{ asset('assets/images/user-icon.svg') }}" alt="remedy"></i>
                                        <input type="text" class="form-control" disabled value="{{ $agent_info->last_name }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Yilmaz">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="remedy-input-icon-wrapper">
                                <i><img src="{{ asset('assets/images/shop-icon.svg') }}" alt="remedy"></i>
                                <input type="email" disabled value="{{ $agent_info->sales_type }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sales Type">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="remedy-input-icon-wrapper">
                                <i><img src="{{ asset('assets/images/percentage-icon.svg') }}" alt="remedy"></i>
                                <input type="email" disabled value="{{ $agent_info->sales_percentage }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sales Percentage">
                            </div>
                        </div>

                        {{-- Start by dhaval --}}
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="remedy-input-icon-wrapper">
                                        <i><img src="{{ asset('assets/images/user-icon.svg') }}" alt="remedy"></i>
                                        <input type="text" disabled value="{{ $agent_info->hour_rate }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Hour Rate">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <div class="remedy-input-icon-wrapper">
                                        {{-- <i><img src="{{ asset('assets/images/user-icon.svg') }}" alt="remedy"></i>
                                        <input type="text" class="form-control" disabled value="{{ $agent_info->sector_of_the_deal }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sector Of The Deal"> --}}
                                        <select class="form-select form-control" disabled name="sector_of_the_deal" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            <option value="1" @if($agent_info->sector_of_the_deal == 1) selected @endif>It</option>
                                            <option value="2" @if($agent_info->sector_of_the_deal == 2) selected @endif>Medical</option>
                                            <option value="3" @if($agent_info->sector_of_the_deal == 3) selected @endif>Bissuness</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="remedy-input-icon-wrapper">
                                <i><img src="{{ asset('assets/images/percentage-icon.svg') }}" alt="remedy"></i>
                                <input type="text" disabled value="{{ $agent_info->agency_of_deal }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agency Of Deal">
                            </div>
                        </div>
                        {{-- End by dhaval --}}


                        {{-- <div class="remedy-music-player-box-wrapper">
                            <div class="remedy-music-player-user-details">
                                <div class="jAudio">
                                    <audio></audio>
                                    <div class="jAudio--ui">
                                        <div class="jAudio--thumb"></div>
                                        <div class="jAudio--status-bar">
                                            <div class="jAudio--details"></div>
                                            <div class="jAudio--controls">
                                                <ul>
                                                    <li>
                                                        <button class="jAudio--control jAudio--control-prev" data-action="prev">
                                                            <span></span>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button class="jAudio--control jAudio--control-play" data-action="play">
                                                            <span></span>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button class="jAudio--control jAudio--control-next" data-action="next">
                                                            <span></span>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="jAudio--volume-bar"></div>
                                            <div class="jAudio--progress-bar">
                                                <div class="jAudio--progress-bar-wrapper">
                                                    <div class="jAudio--progress-bar-played">
                                                        <span class="jAudio--progress-bar-pointer"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jAudio--time">
                                                <span class="jAudio--time-elapsed">00:00</span>
                                                <span class="jAudio--time-total">00:00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jAudio--playlist"></div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    (function() {
        let songs = @json($agent_info->agent_songs);
        var playlist = [];
        var t = [];
        console.log(songs);
        songs.forEach(function(song) {
            playlist.push({
                file: song.song_url,
                trackName: song.song_name,
                trackArtist: "{{ $agent_info->first_name }}",
                thumb: "{{ $agent_info->profile_pic }}"
            });
        });
        t = {
            playlist: playlist,
            // autoPlay: true
        }
        $(".jAudio").jAudio(t);

        if ($(".delete-agent").length >= 1) {
            $(".delete-agent").on("click", function(e) {
                e.preventDefault();
                var id = $(this).data("id");
                $.confirm({
                    title: 'Are you sure ?',
                    content: 'Are you sure you want to delete this agent?',
                    type: 'red',
                    buttons: {
                        confirm: {
                            text: 'Yes',
                            btnClass: 'btn-red',
                            action: function() {
                                var csrf_token = $('meta[name="csrf-token"]').attr("content");
                                let url = '{{ $module_route . "/". $agent_info->id }}';
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
                                            window.location = "{{ url('/agent') }}"
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
    })();
</script>
@endpush
