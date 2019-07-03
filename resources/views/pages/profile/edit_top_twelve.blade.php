@extends('shared.layout')

@section('content')
    <div id="profile_editor" class="container main-content-wrapper normal-width is-paddingless">
        @include('shared.header', ['banner_ad' => $banner_ad])
        <div class="editor-wrapper">
            @include('pages.profile.components.editor-navigation')
            <div class="editor-content">
                <header class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <h2><i class="fas fa-fw fa-heart"></i> profile top twelve</h2>
                        </div>
                    </div>
                    <div class="level-right">
                        <div class="level-item">
                            <button class="button-cta outline"><i class="fas fa-undo-alt fa-fw"></i> reset</button>
                        </div>
                    </div>
                </header>
            </div>
        </div>
    </div>
@endsection