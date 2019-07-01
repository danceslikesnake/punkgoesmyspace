@extends('shared.layout', ['share_title' => 'Punk Goes Acoustic | Videos | '.$video->title])

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
                        <a href="{{ url('/') }}">Back to Profile</a><br />
                        <a href="{{ url('music_videos') }}">Back to Videos</a>
                    @endcomponent
                </div>
            </div>
            <div class="columns">
                <div class="column is-two-thirds">
                    @component('shared.components.section-titleheader')
                        @slot('title')
                            {{$video->title}}
                        @endslot
                        <div class="titleheader-links">
                            <a href="{{ url('music_videos/'.$prevNextVideos['prev']) }}">Previous</a> | <a href="{{ url('music_videos/'.$prevNextVideos['next']) }}">Next</a>
                        </div>
                    @endcomponent
                    <div class="video-display">
                        <iframe src="https://www.youtube.com/embed/{{$video->video_id}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="video-share level">
                        <div class="level-left">
                            <div class="level-item"><strong>Share on:</strong></div>
                        </div>
                        <div class="level-right">
                            <div class="level-item">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" class="level launch-share-dialog"><i class="fab fa-facebook-square"></i>Facebook</a>
                            </div>
                            <div class="level-item">
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}" class="level launch-share-dialog"><i class="fab fa-twitter"></i>Twitter</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-one-third">
                    @include('pages.videos.components.link-to-video-block')
                    @include('pages.videos.components.other-videos-block')
                </div>
            </div>
        </div>
    </div>
@endsection