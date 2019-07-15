<div id="cms_nav">
    <header class="cms-nav-head">
        <div class="brand">
            <img src="{{ asset('img/cms-pga-logo.svg') }}" alt="Punk Goes Acoustic Logo" />
            <div>Punk Goes Acoustic</div>
        </div>
    </header>
    @if (!Auth::guest())
        @if($_SERVER['SERVER_NAME'] == 'test.punkgoes.com')
            <h4 class="nav-link-header">Content</h4>
            <ul class="nav-links">
                <li><a href="{{ url('admin/usertoptwelve') }}"><i class="fas fa-star fa-fw"></i>User Top 12</a></li>
            </ul>
        @else
            <h4 class="nav-link-header">Content</h4>
            <ul class="nav-links">
                <li><a href="{{ url('admin/profile/edit') }}"><i class="fas fa-user fa-fw"></i>Profile</a></li>
                <li><a href="{{ url('admin/blogs') }}"><i class="fas fa-blog fa-fw"></i>Blogs</a></li>
                <li><a href="{{ url('admin/albums') }}"><i class="fas fa-images fa-fw"></i>Photo Albums</a></li>
                <li><a href="{{ url('admin/music_videos') }}"><i class="fas fa-video fa-fw"></i>Videos</a></li>
                <li><a href="{{ url('admin/toptwelve') }}"><i class="fas fa-star fa-fw"></i>Top 12</a></li>
                <li><a href="{{ url('admin/usertoptwelve') }}"><i class="fas fa-star fa-fw"></i>User Top 12</a></li>
                <li><a href="{{ url('admin/bannerads') }}"><i class="fas fa-ad fa-fw"></i> Banner Ads</a></li>
            </ul>
            <h4 class="nav-link-header">Data Collection</h4>
            <ul class="nav-links">
                <li><a href="{{ url('admin/votingresults') }}"><i class="fas fa-vote-yea fa-fw"></i>Voting Results</a></li>
            </ul>
            <h4 class="nav-link-header">3rd Party Content</h4>
            <ul class="nav-links">
                <li><a href="{{ url('admin/spotifyplaylist') }}"><i class="fab fa-spotify fa-fw"></i>Spotify Playlist</a></li>
            </ul>
        @endif
        <ul class="nav-links user-options">
            <li class="nav-link-box-shadow"><a href="{{ url('/') }}" class="view-site-btn"><i class="fas fa-desktop fa-fw"></i>View Site</a></li>
            @if (!Auth::guest())
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout-btn"><i class="fas fa-power-off fa-fw"></i>Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            @endif
        </ul>
        @endif
</div>