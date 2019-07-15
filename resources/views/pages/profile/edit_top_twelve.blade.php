@extends('shared.layout')

@section('content')
    <div id="profile_editor" class="container main-content-wrapper normal-width is-paddingless">
        @include('shared.header', ['banner_ad' => $banner_ad])
        <div class="editor-wrapper">
            @include('pages.profile.components.editor-navigation')
            <div class="editor-content">
                {!! Form::open(['action' => ['CustomThemesController@update_user_top_twelve', $profile_id], 'method' => 'POST']) !!}
                <input type="hidden" name="_method" value="PUT" />
                @component('pages.profile.components.editor-content-header')
                    @slot('title')
                        <i class="fas fa-fw fa-heart"></i> <span>profile</span> top artists
                    @endslot
                        <div class="level-item">
                            <button type="submit" name="form_action" class="button-cta outline" value="reset"><i class="fas fa-undo-alt fa-fw"></i> reset</button>
                        </div>
                        <div class="level-item">
                            <button type="submit" name="form_action" class="button-cta solid" value="save"><i class="fas fa-save fa-fw"></i> save</button>
                        </div>
                @endcomponent
                @include('shared.messages')
                <div class="form">
                    <div class="has-text-centered divider-headline">select up to 12 artists for your profile</div>
                    <ul class="user-top-twelve columns is-mobile is-multiline">
                        @foreach($availableTopTwelveList as $band)
                        <li class="column is-one-third-mobile is-one-third-tablet is-one-quarter-desktop">
                            <div data-id="{{$band->id}}" class="top-12-artist has-text-centered {{(isset($selectedArtists) && in_array($band->id, $selectedArtists)) ? 'is-selected' : ''}}">
                                <div class="top-12-artist-image" style="background-image: url('{{asset('uploads/userTopTwelves/'.$band->photo)}}');"></div>
                                <div class="top-12-artist-name">{{$band->artist_name}}</div>
                                <input class="top-12-input" type="hidden" name="userTopTwelve[]" value="" />
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <footer class="level is-mobile">
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
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection