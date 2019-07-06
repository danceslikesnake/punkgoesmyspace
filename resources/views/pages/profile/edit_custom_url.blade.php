@extends('shared.layout')

@section('content')
    <div id="profile_editor" class="container main-content-wrapper normal-width is-paddingless">
        @include('shared.header', ['banner_ad' => $banner_ad])
        <div class="editor-wrapper">
            @include('pages.profile.components.editor-navigation')
            <div class="editor-content">
                {!! Form::open(['action' => ['CustomThemesController@update_custom_url', $profile_id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <input type="hidden" name="_method" value="PUT" />
                <header class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <h2><i class="fab fa-fw fa-spotify"></i> custom profile url</h2>
                        </div>
                    </div>
                    <div class="level-right">
                        <div class="level-item">
                            <button class="button-cta solid" type="submit"><i class="fas fa-save fa-fw"></i> save</button>
                        </div>
                    </div>
                </header>
                @include('shared.messages')
                <div class="form">
                    <section class="form-module">
                        <header>
                            <h3>Your Custom Profile URL</h3>
                        </header>
                        <div class="field">
                            <div class="control">
                                <span class="is-prefix-text">{{url('/theme')}}/</span>
                                <input class="input natural-width" type="text" name="custom_url" id="custom_url" value="{{$custom_url}}" />
                            </div>
                        </div>
                    </section>
                </div>
                <footer class="level">
                    <div class="level-left"></div>
                    <div class="level-right">
                        <div class="level-item">
                            <button class="button-cta solid" type="submit"><i class="fas fa-save fa-fw"></i> save</button>
                        </div>
                    </div>
                </footer>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection