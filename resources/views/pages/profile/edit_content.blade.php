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
            <div class="editor-content">
                <header class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <h2><i class="fas fa-fw fa-file-alt"></i> profile content</h2>
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
                <div class="form">
                    <section class="form-module">
                        <header>
                            <h3>Your URL</h3>
                        </header>
                        <div class="field">
                            <label class="label">Url Tag</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="Text input">
                            </div>
                        </div>
                    </section>
                    <section class="form-module">
                        <header>
                            <h3>Header</h3>
                        </header>
                        <div class="columns is-multiline">
                            <div class="column is-half">
                                <div class="field">
                                    <label class="label">Name</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Text input">
                                    </div>
                                </div>
                            </div>
                            <div class="column is-half">
                                <div class="field">
                                    <label class="label">Quote</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Text input">
                                    </div>
                                </div>
                            </div>
                            <div class="column is-half">
                                <div class="field">
                                    <label class="label">Age</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Text input">
                                    </div>
                                </div>
                            </div>
                            <div class="column is-half">
                                <div class="field">
                                    <label class="label">Address</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Text input">
                                    </div>
                                </div>
                            </div>
                            <div class="column is-half">
                                <div class="field">
                                    <label class="label">Mood</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Text input">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <footer class="level">
                    <div class="level-left"></div>
                    <div class="level-right">
                        <div class="level-item">
                            <button class="button-cta outline"><i class="fas fa-undo-alt fa-fw"></i> reset</button>
                        </div>
                        <div class="level-item">
                            <button class="button-cta solid"><i class="fas fa-save fa-fw"></i> save</button>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
@endsection