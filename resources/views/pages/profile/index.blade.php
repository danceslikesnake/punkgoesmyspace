@extends('shared.layout', ['use_custom_styles' => (isset($custom_theme['styles']) && !empty($custom_theme['styles'])) ? true : false, 'custom_styles' => $custom_theme['styles'], 'custom_theme_id' => $custom_theme['id']])

@section('content')
    <div id="profile" class="container main-content-wrapper profile-width">
        @include('shared.header', ['banner_ad' => $banner_ad, 'use_custom_styles' => (isset($custom_theme['styles']) && !empty($custom_theme['styles'])) ? true : false])
        <div class="main-content">
            @if(session('theme_error'))
                <div id="error_404">
                    <div class="error-box" style="margin-bottom: 24px;">
                        <h2 class="level">
                            <div class="level-left"><i class="fas fa-sad-cry"></i>&nbsp;&nbsp;{!! session('theme_error') !!}</div>
                        </h2>
                        <p>Here are a few things you can try:</p>
                        <div class="content">
                            <ul class="error-options">
                                <li>Bouble check you have the correct theme url.</li>
                                <li><a href="{{url('profile/edit/content')}}"><strong>Create your own theme!</strong></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            @if($show_voting)
            <div class="voting-module">
                <header class="level is-mobile voting-headline">
                    <div class="level-item force-left">
                        <img src="{{asset('img/fearless-lightning-vertical.svg')}}" class="lightning-bolt left" />
                    </div>
                    <div class="level-item has-text-centered">
                        <h2>Who do you want to release the next Punk Goes Acoustic single? Make your pick below!</h2>
                    </div>
                    <div class="level-item force-right">
                        <img src="{{asset('img/fearless-lightning-vertical.svg')}}" class="lightning-bolt right" />
                    </div>
                </header>
                <div class="voting-window">
                    <div class="voting-module-cover"><i class="fas fa-spinner fa-spin"></i><br />Casting your vote...</div>
                    <header class="level is-mobile">
                        <div class="level-left">
                            <h3 class="level-item">Who should release the next single?</h3>
                        </div>
                        <div class="level-right">
                            <button class="close-voting-window-btn">hide&nbsp;<i class="fas fa-chevron-up fa-fw"></i></button>
                        </div>
                    </header>
                    <div style="overflow: hidden">
                        <ul class="is-clearfix level">
                            <li class="voting-item level-item" id="voting-item-0">
                                <a data-route="{{url('/cast_vote')}}" data-id="0" data-band-name="Grayscale" class="voting-link"></a>
                                <div class="voting-image grayscale" style="background-image: url('{{asset('img/grayscale.png')}}');"></div>
                                <div class="voting-label">
                                    <span class="hermano voting-band-name">Grayscale</span><span class="voting-label-results" style="display: none;"><br />Check back on 7/18 to find out who wins!</span>
                                </div>
                                <span class="voting-icon far fa-square"></span>
                                <span class="voting-icon far fa-check-square"></span>
                            </li>
                            <li class="voting-item level-item" id="voting-item-1">
                                <a data-route="{{url('/cast_vote')}}" data-id="1" data-band-name="Dance Gavin Dance" class="voting-link"></a>
                                <div class="voting-image dance-gavin-dance" style="background-image: url('{{asset('img/dance-gavin-dance.png')}}');"></div>
                                <div class="voting-label">
                                    <span class="hermano voting-band-name">Dance Gavin Dance</span><span class="voting-label-results" style="display: none;"><br />Check back on 7/18 to find out who wins!</span>
                                </div>
                                <span class="voting-icon far fa-square"></span>
                                <span class="voting-icon far fa-check-square"></span>
                            </li>
                            <li class="voting-item level-item" id="voting-item-2">
                                <a data-route="{{url('/cast_vote')}}" data-id="2" data-band-name="Underoath" class="voting-link"></a>
                                <div class="voting-image underoath" style="background-image: url('{{asset('img/underoath.png')}}');"></div>
                                <div class="voting-label">
                                    <span class="hermano voting-band-name">Underoath</span><span class="voting-label-results" style="display: none;"><br />Check back on 7/18 to find out who wins!</span>
                                </div>
                                <span class="voting-icon far fa-square"></span>
                                <span class="voting-icon far fa-check-square"></span>
                            </li>
                            <li class="voting-item level-item" id="voting-item-3">
                                <a data-route="{{url('/cast_vote')}}" data-id="3" data-band-name="Don Broco" class="voting-link"></a>
                                <div class="voting-image don-broco" style="background-image: url('{{asset('img/don-broco.png')}}');"></div>
                                <div class="voting-label">
                                    <span class="hermano voting-band-name">Don Broco</span><span class="voting-label-results" style="display: none;"><br />Check back on 7/18 to find out who wins!</span>
                                </div>
                                <span class="voting-icon far fa-square"></span>
                                <span class="voting-icon far fa-check-square"></span>
                            </li>
                            <li class="voting-item level-item" id="voting-item-4">
                                <a data-route="{{url('/cast_vote')}}" data-id="4" data-band-name="Circa Survive" class="voting-link"></a>
                                <div class="voting-image circa-survive" style="background-image: url('{{asset('img/circa-survive.png')}}');"></div>
                                <div class="voting-label">
                                    <span class="hermano voting-band-name">Circa Survive</span><span class="voting-label-results" style="display: none;"><br />Check back on 7/18 to find out who wins!</span>
                                </div>
                                <span class="voting-icon far fa-square"></span>
                                <span class="voting-icon far fa-check-square"></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr />
            </div>
            @endif
            <div class="columns">
                <div class="column is-narrow main-left">
                    <h1 class="has-text-centered-mobile">{{($custom_theme['content']['name'] != '') ? $custom_theme['content']['name'] : 'Punk Goes'}}</h1>
                    @include('pages.profile.components.profile-block')
                    @include('pages.profile.components.connect-block')

                    <div class="profile-link-display">
                        <strong>Punk Goes URL:</strong>
                        http://www.punkgoes.com
                    </div>

                    @include('pages.profile.components.details-block')
                </div>
                <div class="column main-right">
                    <div class="spotify-playlist">
                        @if(isset($custom_theme['spotify_uri']) && $custom_theme['spotify_uri'] != '')
                            {!! $custom_theme['spotify_uri'] !!}
                        @else
                            {!! $spotifyPlayer->spotify_uri !!}
                        @endif
                    </div>
                    @include('pages.profile.components.blog-roll')
                    @include('pages.profile.components.about-me')
                    @include('pages.profile.components.top-12-block')
                </div>
            </div>
        </div>
    </div>
@endsection