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
                            <h3>Your Custom Profile URL</h3>
                        </header>
                        <div class="field">
                            <div class="control">
                                <span class="is-prefix-text">{{url('/theme')}}/</span>
                                <input class="input natural-width" type="text" name="custom_url_tag" id="custom_url_tag" value="8cdh7s6s" />
                            </div>
                            <div class="help is-danger" style="display: none;"><i class="fas fa-fw fa-exclamation-triangle"></i> Username is taken. Please choose another.</div>
                            <div class="help is-primary" style="display: none;"><i class="fas fa-fw fa-check-circle"></i> Username is available!</div>
                        </div>
                    </section>
                    <section class="form-module">
                        <header>
                            <h3>Profile Image</h3>
                        </header>
                        <div class="field">
                            <div class="level">
                                <div class="level-left">
                                    <div class="level-item">
                                        <img src="{{asset('img/placeholder.png')}}" class="editor-profile-image-preview" />
                                    </div>
                                    <div class="level-item">
                                        <div>
                                            <label class="label" for="custom_url_tag">Choose an image...</label>
                                            <div class="control">
                                                <input class="input" type="file" name="custom_profile_image" id="custom_profile_image" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="form-module">
                        <header>
                            <h3>Profile Information</h3>
                        </header>
                        <div class="columns is-multiline" style="margin-bottom: 0;">
                            <div class="column is-half">
                                <div class="field">
                                    <label class="label">Name</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Text input">
                                    </div>
                                    <span class="help">0/75</span>
                                </div>
                            </div>
                            <div class="column is-half">
                                <div class="field">
                                    <label class="label">Quote</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Text input">
                                    </div>
                                    <span class="help">0/75</span>
                                </div>
                            </div>
                            <div class="column is-half">
                                <div class="field">
                                    <label class="label">Age</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Text input">
                                    </div>
                                    <span class="help">0/75</span>
                                </div>
                            </div>
                            <div class="column is-half">
                                <div class="field">
                                    <label class="label">Address</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Text input">
                                    </div>
                                    <span class="help">0/75</span>
                                </div>
                            </div>
                            <div class="column is-half">
                                <div class="field">
                                    <label class="label">Mood</label>
                                    <div class="control">
                                        <div class="select">
                                            <select>
                                                <option value="happy">happy</option>
                                                <option value="in_love">in love</option>
                                                <option value="crying">crying</option>
                                                <option value="scared">scared</option>
                                                <option value="silly">silly</option>
                                                <option value="existential">existential</option>
                                                <option value="embarrassed">embarrassed</option>
                                                <option value="rad">rad</option>
                                                <option value="angry">angry</option>
                                                <option value="skeptical">skeptical</option>
                                                <option value="over_it">over it</option>
                                                <option value="dead">dead</option>
                                                <option value="sick">sick</option>
                                                <option value="amazed">amazed</option>
                                                <option value="robotic">robotic</option>
                                            </select>
                                        </div>
                                        <img src="{{asset('img/emojis/happy.svg')}}" class="is-emoji" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="form-module">
                        <header>
                            <h3>Your Details</h3>
                        </header>
                        <div class="field">
                            <div class="control">
                                <textarea class="textarea"></textarea>
                            </div>
                            <div class="help">
                                One detail per line, with a Label and Description joined with two colons, i.e.: <strong>Here for::Friends</strong>
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