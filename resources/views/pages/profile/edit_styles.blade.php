@extends('shared.layout')

@section('content')
    <div id="profile_editor" class="container main-content-wrapper normal-width is-paddingless">
        @include('shared.header', ['banner_ad' => $banner_ad])
        <div class="editor-wrapper">
            <header class="editor-navigation">
                <h2><i class="fas fa-cog fa-fw"></i> profile editor</h2>
                <p>Customize the profile page and share it with your friends!</p>
                <div>
                    Your Profile Url
                    <input value="http://www.url.com" type="text" />
                </div>
                <ul>
                    <li><a href="{{url('profile/edit/content')}}"><i class="fas fa-file-alt fa-fw"></i> Edit Profile Content</a></li>
                    <li><a href="{{url('profile/edit/styles')}}"><i class="fas fa-palette fa-fw"></i> Edit Profile Styles</a></li>
                    <li><a href="{{url('profile/edit/content')}}"><i class="fas fa-heart fa-fw"></i> Edit Top 12</a></li>
                </ul>
            </header>
            <div class="editor-style-options">
                asd
            </div>
            <div class="editor-content">
                <header class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <h2><i class="fas fa-fw fa-palette"></i> profile styles</h2>
                        </div>
                    </div>
                    <div class="level-right">
                        <div class="level-item">
                            <button class="button-cta outline"><i class="fas fa-undo-alt fa-fw"></i> reset</button>
                        </div>
                        <div class="level-item">
                            <button class="button-cta solid"><i class="fas fa-save fa-fw"></i> save</button>
                        </div>
                    </div>
                </header>
                <div>conent</div>
            </div>
        </div>
    </div>
@endsection