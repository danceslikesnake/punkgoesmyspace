@extends('shared.layout')

@section('content')
    <div id="videos" class="container main-content-wrapper normal-width">
        @include('shared.header', ['banner_ad' => $banner_ad])
        <div class="main-content">
            <div class="columns adjust-subheader-margin">
                <div class="column">
                    @component('shared.components.section-subheader')
                        @slot('title')
                            videos
                        @endslot()
                        <a href="{{ url('/') }}">Back to Profile</a>
                    @endcomponent
                </div>
            </div>
            <div class="columns">
                <div class="column is-one-quarter is-hidden-mobile">
                    @component('shared.components.blue-content-block')
                        @slot('title')
                            Punk Goes
                        @endslot

                        <div class="video-profile">
                            <div class="columns is-multiline">
                                <div class="column is-full-tablet  has-text-centered">
                                    <img src="{{ asset('uploads/profile/'.$profile->profile_photo) }}" class="video-profile-image" />
                                </div>
                                <div class="column is-full-tablet">
                                    <div class="has-text-centered">View My: <a href="{{ url('albums') }}">Pics</a></div>
                                    <div class="address">{{$profile->address}}</div>
                                    <a href="mailto:info@fearlessrecords.com" target="_blank"><i class="fas fa-envelope"></i>&nbsp;&nbsp;Send Message</a>
                                </div>
                            </div>
                        </div>
                    @endcomponent
                </div>
                <div class="column is-three-quarters">
                    @component('shared.components.blue-content-block')
                        @slot('title')
                            Punk Goes' Videos
                        @endslot
                    @if($videos->links())
                        {{$videos->links()}}
                    @endif
                        <ul class="columns is-multiline video-list is-mobile">
                            @foreach($videos as $video)
                                <li class="column is-half">
                                    <div class="columns">
                                        <div class="column">
                                            <a href="{{ url('music_videos/'.$video->id) }}" class="video-link">
                                                <span class="video-cover" style="background-image: url('{{ $video->video_thumbnail }}');"></span>
                                            </a>
                                        </div>
                                        <div class="column">
                                            <a href="{{ url('music_videos/'.$video->id) }}"><strong>{{$video->title}}</strong></a><br />
                                            {{$video->video_length}}
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                            @if($videos->links())
                                {{$videos->links()}}
                            @endif
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection