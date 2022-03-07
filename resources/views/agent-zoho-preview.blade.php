@extends('layouts.app')
@section('title', 'Sales Dashboard')
@section('content')
<meta http-equiv="refresh" content="30">
<section class="remedy-layout-wrapper">
    <div class="container">
        <div class="">
            @if (isset($agent_info))
                <div class="remedy-logout-details-block">
                    <h2>Closed a <span>Deal</span></h2>
                    <span class="border-line"></span>
                </div>
                <div class="row">
                    <div class="col-md-5 col-lg-6">
                        <div class="remedy-agent-preview-block">
                            <div class="remedy-agent-preview-img">
                                <img src="{{ $agent_info->profile_pic }}" alt="{{ $agent_info->first_name }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-6">
                        <div>
                            @if (isset($agent_info->fee))
                            <div class="form-group">
                                <div class="remedy-input-icon-wrapper">
                                    <input type="email" disabled value="{{ $agent_info->fee }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Fee">
                                </div>
                            </div>
                            @endif
                            @if (isset($agent_info->stage))
                            <div class="form-group">
                                <div class="remedy-input-icon-wrapper">
                                    <input type="email" disabled value="{{ $agent_info->stage }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Stage">
                                </div>
                            </div>
                            @endif
                            @if (isset($agent_info->products))
                            <div class="form-group">
                                <div class="remedy-input-icon-wrapper">
                                    <input type="email" disabled value="{{ $agent_info->products }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Products">
                                </div>
                            </div>
                            @endif
                            @if (isset($agent_info->owner))
                            <div class="form-group">
                                <div class="remedy-input-icon-wrapper">
                                    <input type="email" disabled value="{{ $agent_info->owner }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Owner">
                                </div>
                            </div>
                            @endif
                            @if (count($agent_info->agent_songs) >= 1)
                            <div class="remedy-music-player-box-wrapper">
                                <div class="remedy-music-player-user-details">
                                    <audio id="audio-{{ $agent_info->agent_songs[0]->id }}" autoplay controls>
                                        <source src="{{ $agent_info->agent_songs[0]->song_url }}" type="audio/wav">
                                        <source src="{{ $agent_info->agent_songs[0]->song_url }}" type="audio/mpeg">
                                        <source src="{{ $agent_info->agent_songs[0]->song_url }}" type="audio/aiff">
                                        <source src="{{ $agent_info->agent_songs[0]->song_url }}" type="audio/m4a">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>
                            </div>
                            @endif
                            {{--
                            @if (count($agent_info->agent_songs) >= 1)
                            <div class="remedy-music-player-box-wrapper">
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
                            </div>
                            @endif --}}
                        </div>
                    </div>
                </div>
            @else
                <div class="remedy-logout-details-block remedy-gif-wrapper">
                    <img src="{{ $message }}">
                </div>
            @endif
        </div>
    </div>
</section>
@endsection

@if (isset($agent_info) && count($agent_info->agent_songs) >= 1)
@push('scripts')
<script>
    window.addEventListener("DOMContentLoaded", event => {
        const audio = document.querySelector("audio");
        audio.volume = 0.2;
        audio.play();
    });
</script>
@endpush
@endif