@extends('auth.layout')

@section('content')
    <div class="container">
        <br /><br />
        <div class="form-wrapper">
            <header>
                <h3>Profile</h3>
                @if(session('success'))
                    <div class="notification is-primary">{{session('success')}}</div>
                @endif
            </header>
            <div class="form-content">
                {!! Form::open(['action' => ['ProfileController@update', $profile->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <input type="hidden" name="_method" value="PUT" />
                <div class="field">
                    <label class="label">Quote</label>
                    <div class="control">
                        <input class="input" id="quote" name="quote" type="text" value="{{ $profile->quote }}" required  />
                    </div>
                </div>
                <div class="field">
                    <label class="label">Age</label>
                    <div class="control">
                        <input class="input quarter-width" id="age" name="age" type="number" value="{{ $profile->age }}" required />
                    </div>
                </div>
                <div class="field">
                    <label class="label">Address</label>
                    <div class="control">
                        <input class="input" id="address" name="address" type="text" value="{{ $profile->address }}" required />
                    </div>
                </div>
                <div class="field">
                    <label class="label">Mood</label>
                    <div class="control">
                        <input class="input" id="mood" name="mood" type="text" value="{{ $profile->mood }}" required />
                    </div>
                </div>
                <div class="field">
                    <label class="label">Details</label>
                    <div class="help">Enter one Detail per line, with a Label and Description joined with double colons, i.e.: <strong>Label::Description</strong></div>
                    <br />
                    <div class="control">
                        <textarea class="textarea" id="details" name="details" required>{{ $profile->details }}</textarea>
                    </div>
                </div>
                <div class="field">
                    <label class="label">About Me</label>
                    <div class="notification is-info"><i class="fa fa-info-circle"></i> New videos you add will render correctly after submitting the form.</div>
                    <div class="control mimic-about-me">
                        <textarea class="textarea" id="summernote_custom" name="about_me" required>{{ $profile->about_me }}</textarea>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Profile Photo</label>
                    <div><img src="{{asset('uploads/profile/'.$profile->profile_photo)}}" width="100" /></div>
                    <br />
                    <div class="control mimic-about-me">
                        <input class="input" id="profile_photo" name="profile_photo" type="file" />
                    </div>
                </div>
                <div class="field">
                    <div class="control has-text-right">
                        <button class="button submit">Update Profile</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
