@extends('auth.layout')

@section('content')
    <div class="container">
        <br /><br />
        <div class="form-wrapper">
            <header>
                <h3>
                    Spotify Playlist
                </h3>
                @if(session('success'))
                    <div class="notification is-primary">{{session('success')}}</div>
                @endif
                @if(session('errors'))
                    <div class="notification is-warning">{{session('errors')}}</div>
                @endif
            </header>
            <div class="form-content">
                {!! Form::open(['action' => ['SpotifyPlaylistsController@update', $playlist->id], 'method' => 'POST']) !!}
                <input type="hidden" name="_method" value="PUT" />
                <div class="field">
                    <label class="label">Spotify Embed Code&nbsp;&nbsp;&nbsp;&middot;&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="return false;" class="launch-spotify-modal"><i class="fas fa-question-circle"></i> Where do I find this?</a></label>
                    <div class="control">
                        <textarea class="textarea" id="embed_code" name="embed_code" required>{{$playlist->spotify_uri}}</textarea>
                    </div>
                </div>
                <div class="field">
                    <div class="control has-text-right">
                        <button class="button submit">Update Playlist</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="form-wrapper">
            <header><h3>Current Playlist</h3></header>
            <div class="form-content admin-spotify-playlist">
                {!! $playlist->spotify_uri !!}
            </div>
        </div>
        <div id="spotify_modal" class="modal">
            <div class="modal-background spotify-modal-bg"></div>
            <div class="modal-content has-text-centered">
                <img src="{{asset('img/spotify_instructions.png')}}" />
            </div>
            <button class="modal-close is-large close-spotify-modal" aria-label="close" onclick="$('#spotify_modal').removeClass('is-active');"></button>
        </div>
    </div>
@endsection