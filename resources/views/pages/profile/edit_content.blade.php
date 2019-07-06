@extends('shared.layout')

@section('content')
    <div id="profile_editor" class="container main-content-wrapper normal-width is-paddingless">
        @include('shared.header', ['banner_ad' => $banner_ad])
        <div class="editor-wrapper">
            @include('pages.profile.components.editor-navigation')
            <div class="editor-content">
                {!! Form::open(['action' => ['CustomThemesController@update_content', $profile_id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <input type="hidden" name="_method" value="PUT" />
                <input type="hidden" name="redirect_route" value="{{url('profile/edit/content')}}" />
                <header class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <h2><i class="fas fa-fw fa-file-alt"></i> profile content</h2>
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
                            <h3>Profile Image</h3>
                        </header>
                        <div class="field">
                            <div class="level">
                                <div class="level-left">
                                    <div class="level-item">
                                        <img src="{{ (isset($profile_content['custom_profile_image']) && $profile_content['custom_profile_image'] != '') ? asset('uploads/themes/'.$profile_id.'/'.$profile_content['custom_profile_image']) : asset('uploads/profile/'.$profile->profile_photo) }}" class="editor-profile-image-preview" />
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
                                        <input
                                                class="input"
                                                type="text"
                                                placeholder="Punk Goes"
                                                maxlength="75"
                                                name="name"
                                                id="name"
                                                value="{{$profile_content['name']}}" />
                                    </div>
                                    <span class="help" id="name_character_count"><span>0</span>/75</span>
                                </div>
                            </div>
                            <div class="column is-half">
                                <div class="field">
                                    <label class="label">Quote</label>
                                    <div class="control">
                                        <input
                                                class="input"
                                                type="text"
                                                placeholder="{{$profile->quote}}"
                                                maxlength="75"
                                                name="quote"
                                                id="quote"
                                                value="{{$profile_content['quote']}}" />
                                    </div>
                                    <span class="help" id="quote_character_count"><span>0</span>/75</span>
                                </div>
                            </div>
                            <div class="column is-half">
                                <div class="field">
                                    <label class="label">Location</label>
                                    <div class="control">
                                        <input
                                                class="input"
                                                type="text"
                                                placeholder="{{$profile->address}}"
                                                maxlength="75"
                                                name="location"
                                                id="location"
                                                value="{{$profile_content['location']}}" />
                                    </div>
                                    <span class="help" id="location_character_count"><span>0</span>/75</span>
                                </div>
                            </div>
                            <div class="column is-half">
                                <div class="field">
                                    <label class="label">Age</label>
                                    <div class="control">
                                        <div class="select">
                                            <select name="age" id="age">
                                                <option value="">Select an age...</option>
                                                @for($i=13;$i<=100;$i++)
                                                    <option value="{{$i}}" {{ (isset($profile_content['age']) && $profile_content['age'] == $i) ? 'selected' : '' }}>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-half">
                                <div class="field">
                                    <label class="label">Mood</label>
                                    <div class="control">
                                        <div class="select">
                                            <select name="mood" id="mood" class="mood-selector">
                                                <option {{ (isset($profile_content['mood']) && $profile_content['mood'] == 'happy') ? 'selected' : '' }} value="happy">happy</option>
                                                <option {{ (isset($profile_content['mood']) && $profile_content['mood'] == 'in_love') ? 'selected' : '' }} value="in_love">in love</option>
                                                <option {{ (isset($profile_content['mood']) && $profile_content['mood'] == 'crying') ? 'selected' : '' }} value="crying">crying</option>
                                                <option {{ (isset($profile_content['mood']) && $profile_content['mood'] == 'scared') ? 'selected' : '' }} value="scared">scared</option>
                                                <option {{ (isset($profile_content['mood']) && $profile_content['mood'] == 'silly') ? 'selected' : '' }} value="silly">silly</option>
                                                <option {{ (isset($profile_content['mood']) && $profile_content['mood'] == 'existential') ? 'selected' : '' }} value="existential">existential</option>
                                                <option {{ (isset($profile_content['mood']) && $profile_content['mood'] == 'embarrassed') ? 'selected' : '' }} value="embarrassed">embarrassed</option>
                                                <option {{ (isset($profile_content['mood']) && $profile_content['mood'] == 'rad') ? 'selected' : '' }} value="rad">rad</option>
                                                <option {{ (isset($profile_content['mood']) && $profile_content['mood'] == 'angry') ? 'selected' : '' }} value="angry">angry</option>
                                                <option {{ (isset($profile_content['mood']) && $profile_content['mood'] == 'skeptical') ? 'selected' : '' }} value="skeptical">skeptical</option>
                                                <option {{ (isset($profile_content['mood']) && $profile_content['mood'] == 'over_it') ? 'selected' : '' }} value="over_it">over it</option>
                                                <option {{ (isset($profile_content['mood']) && $profile_content['mood'] == 'dead') ? 'selected' : '' }} value="dead">dead</option>
                                                <option {{ (isset($profile_content['mood']) && $profile_content['mood'] == 'sick') ? 'selected' : '' }} value="sick">sick</option>
                                                <option {{ (isset($profile_content['mood']) && $profile_content['mood'] == 'amazed') ? 'selected' : '' }} value="amazed">amazed</option>
                                                <option {{ (isset($profile_content['mood']) && $profile_content['mood'] == 'robotic') ? 'selected' : '' }} value="robotic">robotic</option>
                                            </select>
                                        </div>
                                        <img src="{{ (isset($profile_content['mood']) && $profile_content['mood'] != '') ? asset('img/emojis/'.$profile_content['mood'].'.svg') : asset('img/emojis/happy.svg') }}" class="is-emoji" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="form-module">
                        <header>
                            <h3>Your Details</h3>
                        </header>
                        <div class="columns is-multiline details-list" style="margin-bottom: 0;">
                            <div class="column is-half">
                                <div class="field">
                                    <div class="control">
                                        <strong class="is-prefix-text">Status</strong>
                                        <input
                                                class="input natural-width"
                                                type="text"
                                                maxlength="45"
                                                placeholder="It's Complicated ¯\_(ツ)_/¯"
                                                name="details[status]"
                                                id="status"
                                                value="{{ (isset($profile_content['details']['status'])) ? $profile_content['details']['status'] : '' }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="column is-half">
                                <div class="field">
                                    <div class="control">
                                        <strong class="is-prefix-text">Here For</strong>
                                        <input
                                                class="input natural-width"
                                                type="text"
                                                maxlength="45"
                                                placeholder="Friends"
                                                name="details[here_for]"
                                                id="here_for"
                                                value="{{ (isset($profile_content['details']['here_for'])) ? $profile_content['details']['here_for'] : '' }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="column is-half">
                                <div class="field">
                                    <div class="control">
                                        <strong class="is-prefix-text">Orientation</strong>
                                        <input
                                                class="input natural-width"
                                                type="text"
                                                maxlength="45"
                                                name="details[orientation]"
                                                id="orientation"
                                                value="{{ (isset($profile_content['details']['orientation'])) ? $profile_content['details']['orientation'] : '' }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="column is-half">
                                <div class="field">
                                    <div class="control">
                                        <strong class="is-prefix-text">Hometown</strong>
                                        <input
                                                class="input natural-width"
                                                type="text"
                                                maxlength="50"
                                                name="details[hometown]"
                                                id="hometown"
                                                value="{{ (isset($profile_content['details']['hometown'])) ? $profile_content['details']['hometown'] : '' }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="column is-half">
                                <div class="field">
                                    <div class="control">
                                        <strong class="is-prefix-text">Ethnicity</strong>
                                        <input
                                                class="input natural-width"
                                                type="text"
                                                maxlength="45"
                                                name="details[ethnicity]"
                                                id="ethnicity"
                                                value="{{ (isset($profile_content['details']['ethnicity'])) ? $profile_content['details']['ethnicity'] : '' }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="column is-half">
                                <div class="field">
                                    <div class="control">
                                        <strong class="is-prefix-text">Religion</strong>
                                        <input
                                                class="input natural-width"
                                                type="text"
                                                maxlength="45"
                                                name="details[religion]"
                                                id="religion"
                                                value="{{ (isset($profile_content['details']['religion'])) ? $profile_content['details']['religion'] : '' }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="column is-half">
                                <div class="field">
                                    <div class="control">
                                        <strong class="is-prefix-text">Zodiac Sign</strong>
                                        <input
                                                class="input natural-width"
                                                type="text"
                                                maxlength="45"
                                                name="details[zodiac_sign]"
                                                id="zodiac_sign"
                                                value="{{ (isset($profile_content['details']['zodiac_sign'])) ? $profile_content['details']['zodiac_sign'] : '' }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="column is-half">
                                <div class="field">
                                    <div class="control">
                                        <strong class="is-prefix-text">Smoke / Drink</strong>
                                        <input
                                                class="input natural-width"
                                                type="text"
                                                maxlength="45"
                                                name="details[smoke_/_drink]"
                                                id="smoke_/_drink"
                                                value="{{ (isset($profile_content['details']['smoke_/_drink'])) ? $profile_content['details']['smoke_/_drink'] : '' }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="column is-half">
                                <div class="field">
                                    <div class="control">
                                        <strong class="is-prefix-text">Children</strong>
                                        <input
                                                class="input natural-width"
                                                type="text"
                                                maxlength="45"
                                                name="details[children]"
                                                id="children"
                                                value="{{ (isset($profile_content['details']['children'])) ? $profile_content['details']['children'] : '' }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="column is-half">
                                <div class="field">
                                    <div class="control">
                                        <strong class="is-prefix-text">Education</strong>
                                        <input
                                                class="input natural-width"
                                                type="text"
                                                maxlength="45"
                                                name="details[education]"
                                                id="education"
                                                value="{{ (isset($profile_content['details']['education'])) ? $profile_content['details']['education'] : '' }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="column is-half">
                                <div class="field">
                                    <div class="control">
                                        <strong class="is-prefix-text">Occupation</strong>
                                        <input
                                                class="input natural-width"
                                                type="text"
                                                maxlength="45"
                                                name="details[occupation]"
                                                id="occupation"
                                                value="{{ (isset($profile_content['details']['occupation'])) ? $profile_content['details']['occupation'] : '' }}" />
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