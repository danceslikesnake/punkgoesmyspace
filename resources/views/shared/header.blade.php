<header id="header">
    <div class="ad-container">
        @if(isset($banner_ad))
            <a href="{{$banner_ad->url}}" target="_blank" class=""><img class="ad-placeholder desktop" alt="{{$banner_ad->name}} Desktop" src="{{asset('uploads/banner_ads/'.$banner_ad->id.'/'.$banner_ad->image_desktop)}}" /></a>
            <a href="{{$banner_ad->url}}" target="_blank" class=""><img class="ad-placeholder tablet" alt="{{$banner_ad->name}} Tablet" src="{{asset('uploads/banner_ads/'.$banner_ad->id.'/'.$banner_ad->image_tablet)}}" /></a>
            <a href="{{$banner_ad->url}}" target="_blank" class=""><img class="ad-placeholder mobile" alt="{{$banner_ad->name}} Mobile" src="{{asset('uploads/banner_ads/'.$banner_ad->id.'/'.$banner_ad->image_mobile)}}" /></a>
        @endif
    </div>
    <nav class="navbar nav-controls" role="navigation" aria-label="header controls">
        <div class="navbar-menu is-active is-flex-touch is-paddingless is-backgroundless">
            <div class="navbar-start is-flex-touch" style="height: 41px; width: 100%;">
                <img src="{{ asset('img/mainlogo.svg') }}" alt="punk goes acoustic - a place for friends" height="28" width="203" />
            </div>
            <div class="navbar-end is-flex-touch">
                <div class="navbar-item is-flush-right-on-mobile">
                    <img src="{{ asset('img/powered_by.svg') }}" alt="powered by fearless" width="53" height="25" />
                </div>
            </div>
        </div>
    </nav>
    <nav class="navbar nav-links" role="navigation" aria-label="main navigation">
        <div class="navbar-menu is-active is-flex-touch is-paddingless is-backgroundless">
            <div class="navbar-start is-flex-touch">
                <a class="navbar-item add-border" href="{{ url('/') }}">Profile</a>
                <a class="navbar-item add-border" href="{{ url('albums') }}">Photos</a>
                <a class="navbar-item add-border" href="{{ url('music_videos') }}">Videos</a>
                <a class="navbar-item add-border" href="{{ url('blogs') }}">Blogs</a>
            </div>
            <div class="navbar-end is-flex-touch">
                <a class="navbar-item" href="http://www.fearlessrecords.com/" target="_blank">Fearless Records</a>
            </div>
        </div>
    </nav>
</header>