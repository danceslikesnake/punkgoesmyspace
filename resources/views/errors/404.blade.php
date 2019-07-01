@extends('shared.layout')

@section('content')
    <div id="error_404" class="container main-content-wrapper profile-width">
    @include('shared.header', ['banner_ad' => $banner_ad])
        <div class="main-content">
            <div class="columns">
                <div class="column">
                    <div class="error-box">
                        <h2 class="level">
                            <div class="level-left"><i class="fas fa-sad-cry"></i>&nbsp;&nbsp;Oops! We couldn't locate the page you were looking for.</div>
                        </h2>
                        <p>Here are a few things you can try:</p>
                        <div class="content">
                            <ul class="error-options">
                                <li>Find what you need in the navigation above.</li>
                                <li>Check out the links below</li>
                            </ul>
                        </div>
                    </div>
                    @component('shared.components.blue-content-block')
                        @slot('title')
                            Maybe You Would Like to View Photos:
                        @endslot
                        <ul class="columns is-vcentered has-text-centered">
                            @foreach($photos as $photo)
                            <li class="column">
                                <a href="{{url('photos/'.$photo->id)}}">
                                    <img class="photos" src="{{ ($photo->instagram_id != '') ? $photo->photo : asset('uploads/albums/'.$photo->album_id.'/'.$photo->photo) }}" />
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    @endcomponent
                    @component('shared.components.blue-content-block')
                        @slot('title')
                            Maybe You Would Like to Watch Videos:
                        @endslot
                        <ul class="columns">
                            @foreach($videos as $video)
                                <li class="column">
                                    <a href="{{url('videos/'.$video->id)}}"><img src="{{$video->video_thumbnail}}" /></a>
                                </li>
                            @endforeach
                        </ul>
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection