<div class="profile">
    <div class="columns is-mobile">
        <div class="column is-narrow profile-left">
            <div class="profile-image">
                <img src="{{ ($custom_theme['content']['custom_profile_image']) ? asset('uploads/themes/'.$custom_theme['id'].'/'.$custom_theme['content']['custom_profile_image']) : asset('uploads/profile/'.$profile->profile_photo) }}" />
            </div>
        </div>
        <div class="column profile-right">
            “{{($custom_theme['content']['quote'] != '') ? $custom_theme['content']['quote'] : $profile->quote}}”
            <br />
            <br />
            {{($custom_theme['content']['age'] != '') ? $custom_theme['content']['age'] : $profile->age}} years old
            <br />
            {{($custom_theme['content']['location'] != '') ? $custom_theme['content']['location'] : $profile->address}}
            <div class="online-now">
                <i class="fas fa-user"></i>Online Now!
            </div>
            Last Login: {{date('m/d/Y', strtotime($blogs[0]->created_at))}}
        </div>
    </div>
    <div class="mood-and-links has-text-centered-mobile">
        <div class="level is-mobile" style="margin-bottom: 4px;">
            <div class="level-left">
                <div class="level-item">
                    <strong>Mood:</strong>&nbsp;{{($custom_theme['content']['mood'] != '') ? str_replace('_', ' ', $custom_theme['content']['mood']) : $profile->mood}}
                </div>
                <div class="level-item">
                    @if(isset($custom_theme['content']['mood']) && $custom_theme['content']['mood'] != '')
                        <img src="{{asset('img/emojis/'.$custom_theme['content']['mood'].'.svg')}}" style="height: 24px;" />
                    @else
                        <img src="{{asset('img/emojis/happy.svg')}}" style="height: 24px;" />
                    @endif
                </div>
            </div>
        </div>
        View My: <a href="{{ url('albums') }}">Pics</a> | <a href="{{ url('music_videos') }}">Videos</a>
    </div>
</div>