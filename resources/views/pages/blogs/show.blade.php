@extends('shared.layout', ['share_title' => 'Punk Goes Acoustic, Vol. 3 | Blogs | '.$blog->blog_title])

@section('content')
    <div id="blogs" class="container main-content-wrapper normal-width">
        @include('shared.header', ['banner_ad' => $banner_ad])
        <div class="main-content">
            <div class="columns adjust-subheader-margin">
                <div class="column">
                    @component('shared.components.section-subheader')
                        @slot('title')
                            blogs
                        @endslot()
                        <a href="{{ url('/') }}">Back to Profile</a><br />
                        <a href="{{ url('blogs') }}">Back to Blogs</a>
                    @endcomponent
                </div>
            </div>
            <div class="columns">
                <div class="column is-one-quarter is-hidden-mobile">
                    @component('shared.components.blue-content-block')
                        @slot('title')
                            Punk Goes
                        @endslot

                        <div class="blog-profile">
                            <div class="columns is-mobile is-multiline">
                                <div class="column is-full-tablet has-text-centered">
                                    <img src="{{ asset('uploads/profile/'.$profile->profile_photo) }}" class="blog-profile-image" />
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
                    <div class="blog-post">
                        <strong class="blog-date">{!! date('l, F d, Y', strtotime($blog->created_at)) !!}</strong>
                        <div class="blog-content">
                            <h4>{{$blog->blog_title}}</h4>
                            {!! $blog->blog_body !!}
                            <div class="content-footer"><a href="{{ url('blogs/'.$blog->id) }}">{!! date('g:i A') !!}</a> | Share: <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" class="launch-share-dialog"><i class="fab fa-facebook-square"></i></a>&nbsp;&nbsp;<a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}" class="launch-share-dialog"><i class="fab fa-twitter"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection