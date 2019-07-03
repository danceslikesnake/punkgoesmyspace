<header class="editor-navigation">
    <h2 class="has-text-centered"><i class="fas fa-cog fa-fw"></i> profile editor</h2>
    <p class="has-text-centered">Customize the profile page and share it with your friends!</p>
    <div class="custom-url-module">
        <label class="has-text-centered">Custom Profile Url</label>
        <input value="{{url('/theme/')}}/8cdh7s6s" type="text" readonly />
    </div>
    <ul>
        <li><a href="{{url('profile/edit/content')}}" class="{{(Request::is('profile/edit/content')) ? 'active-link' : ''}}"><i class="fas fa-file-alt fa-fw"></i> Edit Profile Content</a></li>
        <li><a href="{{url('profile/edit/styles')}}" class="{{(Request::is('profile/edit/styles')) ? 'active-link' : ''}}"><i class="fas fa-palette fa-fw"></i> Edit Profile Styles</a></li>
        <li><a href="{{url('profile/edit/toptwelve')}}" class="{{(Request::is('profile/edit/toptwelve')) ? 'active-link' : ''}}"><i class="fas fa-heart fa-fw"></i> Edit Top 12</a></li>
    </ul>
</header>