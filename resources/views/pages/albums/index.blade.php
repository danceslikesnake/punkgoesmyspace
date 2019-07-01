@extends('shared.layout')

@section('content')
    <div id="albums" class="container main-content-wrapper normal-width">
        @include('shared.header', ['banner_ad' => $banner_ad])
        <div class="main-content">
            <div class="columns is-mobile">
                <div class="column">
                    @component('shared.components.section-subheader')
                        @slot('title')
                            photos
                        @endslot()
                        <a href="{{ url('/') }}">Back to Profile</a>
                    @endcomponent
                    @component('shared.components.section-titleheader')
                        @slot('title')
                            Punk Goes' Albums
                        @endslot
                    @endcomponent
                    <ul class="columns is-multiline album-list is-mobile">
                        @foreach($albums as $album)
                            @if(count($album->Photos) > 0)
                            <li class="column is-half-mobile is-one-third-tablet is-one-quarter-desktop album-list-item">
                                <a href="{{url('albums/'.$album->id)}}" class="has-text-centered">
                                    <span class="album-cover-image" style="background-image: url('{{ asset('uploads/albums/'.$album->id.'/'.$album->cover_image) }}')"></span>
                                    <strong>{{$album->name}}</strong><br />
                                    {{count($album->Photos)}} Photos<br />
                                    @if($album->album_type == 'instagram')
                                    <span class="tag is-instagram-tag" style="margin-top: 4px;"><i class="fab fa-instagram"></i>&nbsp;#{{$album->instagram_hashtag}}</span>
                                    @endif
                                </a>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection