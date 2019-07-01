<div class="profile">
    <div class="columns is-mobile">
        <div class="column is-narrow profile-left">
            <div class="profile-image">
                <img src="{{ asset('uploads/profile/'.$profile->profile_photo) }}" />
            </div>
        </div>
        <div class="column profile-right">
            “{{$profile->quote}}”
            <br />
            <br />
            {{$profile->age}} years old
            <br />
            {{$profile->address}}
            <div class="online-now">
                <i class="fas fa-user"></i>Online Now!
            </div>
            Last Login: 06/28/2019
        </div>
    </div>
    <div class="mood-and-links has-text-centered-mobile">
        <strong>Mood:</strong> {{$profile->mood}} <span class="fa-stack"><i class="fas fa-circle fa-stack-1x"></i><i class="fas fa-smile-beam fa-stack-1x"></i></span>
        <br />
        View My: <a href="{{ url('albums') }}">Pics</a> | <a href="{{ url('music_videos') }}">Videos</a>
    </div>
</div>