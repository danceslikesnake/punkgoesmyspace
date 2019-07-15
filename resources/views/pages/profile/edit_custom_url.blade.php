@extends('shared.layout')

@section('content')
    <div id="profile_editor" class="container main-content-wrapper normal-width is-paddingless">
        @include('shared.header', ['banner_ad' => $banner_ad])
        <div class="editor-wrapper">
            @include('pages.profile.components.editor-navigation')
            <div class="editor-content">
                {!! Form::open(['action' => ['CustomThemesController@update_custom_url', $profile_id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <input type="hidden" name="_method" value="PUT" />
                @component('pages.profile.components.editor-content-header')
                    @slot('title')
                        <i class="fab fa-fw fa-spotify"></i> profile url
                    @endslot
                        <div class="level-item">
                            <button class="button-cta solid" type="submit"><i class="fas fa-save fa-fw"></i> save</button>
                        </div>
                @endcomponent
                @include('shared.messages')
                <div class="form">
                    <section class="form-module">
                        <header>
                            <h3>Your Profile URL</h3>
                        </header>
                        <div class="field">
                            <div class="control">
                                <p>Make it easier to share your profile with friends!</p>
                                <br />
                                <span class="is-prefix-text" style="color: black;">punkgoes.com/theme/</span>
                                <input class="input natural-width" type="text" name="custom_url" id="custom_url" value="{{$custom_url}}" />
                            </div>
                        </div>
                    </section>
                </div>
                <footer class="level is-mobile">
                    <div class="level-left"></div>
                    <div class="level-right">
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