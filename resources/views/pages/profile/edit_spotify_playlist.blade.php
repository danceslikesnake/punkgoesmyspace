@extends('shared.layout')

@section('content')
    <div id="profile_editor" class="container main-content-wrapper normal-width is-paddingless">
        @include('shared.header', ['banner_ad' => $banner_ad])
        <div class="editor-wrapper">
            @include('pages.profile.components.editor-navigation')
            <div class="editor-content">
                {!! Form::open(['action' => ['CustomThemesController@update_spotify_playlist', $profile_id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <input type="hidden" name="_method" value="PUT" />
                <header class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <h2><i class="fab fa-fw fa-spotify"></i> profile spotify playlist</h2>
                        </div>
                    </div>
                    <div class="level-right">
                        <div class="level-item">
                            <button type="submit" name="form_action" class="button-cta outline" value="reset"><i class="fas fa-undo-alt fa-fw"></i> reset</button>
                        </div>
                        <div class="level-item">
                            <button type="submit" name="form_action" class="button-cta solid" value="save"><i class="fas fa-save fa-fw"></i> save</button>
                        </div>
                    </div>
                </header>
                @include('shared.messages')
                <div class="form">
                    <section class="form-module">
                        <header>
                            <h3>Spotify Embed Code &middot; <a href="javascript:;" onclick="return false;" class="launch-spotify-modal"><i class="fas fa-info-circle fa-fw"></i> Where do I find this?</a></h3>
                        </header>
                        <div class="field">
                            <div class="control">
                                <textarea class="textarea" name="spotify_embed" id="spotify_embed">{{(isset($profile_spotify_embed) && $profile_spotify_embed != '') ? $profile_spotify_embed : $default_spotify_player->spotify_uri}}</textarea>
                            </div>
                        </div>
                    </section>
                    <section class="form-module">
                        <div class="spotify-playlist" style="padding: 16px;">
                            @if(isset($profile_spotify_embed) && $profile_spotify_embed != '')
                                {!! $profile_spotify_embed !!}
                            @else
                                {!! $default_spotify_player->spotify_uri !!}
                            @endif
                        </div>
                    </section>
                </div>
                <footer class="level">
                    <div class="level-left"></div>
                    <div class="level-right">
                        <div class="level-item">
                            <button type="submit" name="form_action" class="button-cta outline" value="reset"><i class="fas fa-undo-alt fa-fw"></i> reset</button>
                        </div>
                        <div class="level-item">
                            <button type="submit" name="form_action" class="button-cta solid" value="save"><i class="fas fa-save fa-fw"></i> save</button>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <div id="spotify_modal" class="modal">
        <div class="modal-background spotify-modal-bg"></div>
        <div class="modal-content has-text-centered">
            <img src="{{asset('img/spotify_instructions.png')}}" />
        </div>
        <button class="modal-close is-large close-spotify-modal" aria-label="close" onclick="$('#spotify_modal').removeClass('is-active');"></button>
    </div>
@endsection