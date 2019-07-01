@extends('shared.layout', ['share_image' => $photo->album_id.'/'.$photo->photo, 'share_title' => 'Punk Goes Acoustic, Vol. 3 | Photos'])

@section('content')
    <div id="photos" class="container main-content-wrapper normal-width">
        @include('shared.header', ['banner_ad' => $banner_ad])
        <div class="main-content">
            <div class="columns adjust-subheader-margin">
                <div class="column">
                    @component('shared.components.section-subheader')
                        @slot('title')
                            photos
                        @endslot()
                        <a href="{{ url('/') }}">Back to Profile</a><br />
                        <a href="{{ url('albums/'.$photo->Album->id) }}">Back to Album</a>
                    @endcomponent
                </div>
            </div>
            <div class="columns">
                <div class="column is-two-thirds">
                    @component('shared.components.section-titleheader')
                        @slot('title')
                            {{$photo->Album->name}}
                        @endslot
                        <div class="titleheader-links">
                            <a href="{{ url('photos/'.$other_photos['prev']) }}">Previous</a> | <a href="{{ url('photos/'.$other_photos['next']) }}">Next</a>
                        </div>
                    @endcomponent
                    <div class="photo-display"><img src="{{ ($photo->Album->album_type == 'instagram') ? $photo->photo : asset('uploads/albums/'.$photo->album_id.'/'.$photo->photo) }}" /></div>
                    @if($photo->Album->album_type == 'instagram')
                    <div class="level instagram-badge">
                        <div class="level-left">
                            <div class="level-item">
                                <img class="instagram-avatar" src="{{$instagram_metadata['user_profile_pic']}}" />
                            </div>
                            <div class="level-item">
                                <div class="has-text-left has-text-centered-mobile">
                                    Shared by:<br />
                                    <strong>{{$instagram_metadata['username']}}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="level-right">
                            <div class="level-item">
                                <span class="tag is-instagram-tag"><i class="fab fa-instagram"></i>&nbsp;#{{$photo->Album->instagram_hashtag}}</span>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($photo->photo_description != '')
                    <div class="instagram-caption">{{$photo->photo_description}}</div>
                    @endif
                    <div class="photo-share level is-mobile">
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
                    <div class="is-hidden-tablet"><hr style="margin-bottom: 8px;" /></div>
                </div>
                <div class="column is-one-third">
                    @include('pages.photos.components.link-to-photo-block')
                    @if(count($other_albums) > 0)
                    @include('pages.photos.components.other-albums-block')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection