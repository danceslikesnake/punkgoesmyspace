<header class="editor-navigation">
    <h2><i class="fas fa-cog fa-fw"></i> profile editor</h2>
    <p class="has-text-centered">Customize your profile and share it with friends!</p>
    <div class="custom-url-module">
        <label class="has-text-centered"><span>Copy</span> Profile Url</label>
        <input value="{{url('/theme/'.$custom_url)}}" type="text" readonly />
    </div>
    <ul class="is-clearfix">
        <li><a href="{{url('profile/edit/content')}}" class="{{(Request::is('profile/edit/content')) ? 'active-link' : ''}}"><i class="fas fa-file-alt fa-fw"></i> <span class="desktop">Profile Content</span> <span class="mobile">content</span></a></li>
        <li><a href="{{url('profile/edit/toptwelve')}}" class="{{(Request::is('profile/edit/toptwelve')) ? 'active-link' : ''}}"><i class="fas fa-heart fa-fw"></i> <span class="desktop">Top Artists</span> <span class="mobile">artists</span></a></li>
        <li><a href="{{url('profile/edit/custom_url')}}" class="{{(Request::is('profile/edit/custom_url')) ? 'active-link' : ''}}"><i class="fas fa-link fa-fw"></i> <span class="desktop">Profile Url</span> <span class="mobile">url</span></a></li>
        <li><a href="{{url('profile/edit/spotify_playlist')}}" class="{{(Request::is('profile/edit/spotify_playlist')) ? 'active-link' : ''}}"><i class="fab fa-spotify fa-fw"></i> <span class="desktop">Spotify Playlist</span> <span class="mobile">playlist</span></a></li>
        <li><a href="{{url('profile/edit/styles')}}" class="{{(Request::is('profile/edit/styles')) ? 'active-link' : ''}}"><i class="fas fa-palette fa-fw"></i> <span class="desktop">Profile Styles</span> <span class="mobile">styles</span></a></li>
    </ul>
</header>