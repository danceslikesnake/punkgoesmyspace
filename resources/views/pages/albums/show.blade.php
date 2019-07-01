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
                        <a href="{{ url('/') }}">Back to Profile</a><br />
                        <a href="{{ url('albums') }}">Back to Albums</a>
                    @endcomponent
                    @component('shared.components.section-titleheader')
                        @slot('title')
                            {{$album->name}}
                        @endslot
                    @endcomponent
                    @if($album->album_type == 'instagram')
                    <div class="columns">
                        <div class="column"><span class="tag is-instagram-tag" style="margin-bottom: -16px;"><i class="fab fa-instagram"></i>&nbsp;#{{$album->instagram_hashtag}}</span></div>
                    </div>
                    @endif
                    <div>{{$photos->links()}}</div>
                    <ul class="columns is-multiline album-photo-list is-mobile">
                        @foreach($photos as $photo)
                            <li class="column is-half-mobile is-one-third-tablet is-one-quarter-desktop album-photo-list-item">
                                <a href="{{ url('photos/'.$photo->id) }}" class="has-text-centered">
                                    <span class="photo-cover" style="background-image: url('{{ ($album->album_type == 'instagram') ? $photo->photo : asset('uploads/albums/'.$photo->album_id.'/'.$photo->photo)  }}')"></span>
                                    @if($album->album_type == 'instagram')
                                    <span class="level instagram-badge is-mobile">
                                        <span class="level-left">
                                            <span class="level-item">
                                                <img class="instagram-avatar" src="{{$instagram_metadata[$photo->instagram_id]['user_profile_pic']}}" />
                                            </span>
                                            <span class="level-item">
                                                <div class="has-text-left">
                                                    Uploaded by:<br />
                                                    <strong>{{$instagram_metadata[$photo->instagram_id]['username']}}</strong>
                                                </div>
                                            </span>
                                        </span>
                                    </span>
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div>{{$photos->links()}}</div>
                </div>
            </div>
        </div>
    </div>
@endsection