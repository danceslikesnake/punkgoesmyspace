@component('shared.components.orange-content-block')
    @slot('title')
        Top {{isset($custom_theme['topArtists']) && count($custom_theme['topArtists']) > 0 ? count($custom_theme['topArtists']) : 12}} Artists
    @endslot
    <ul class="top-12-block is-clearfix">
        <?php $i = 0; ?>
        @if(isset($custom_theme['topArtists']) && count($custom_theme['topArtists']) > 0)
                @foreach($custom_theme['topArtists'] as $top)
                    <?php
                    $every_fourth = ($i%4==0) ? ' clear-fourth' : '';
                    $every_third = ($i%3==0) ? ' clear-third' : '';
                    ?>
                    <li class="has-text-centered<?= $every_fourth; ?><?= $every_third; ?>">
                        <a href="{{$top->url}}" target="_blank">
                            <span>{{$top->artist_name}}</span>
                            <div class="top-twelve-image" style="background-image: url('{{ asset('uploads/userTopTwelves/'.$top->photo) }}');"></div>
                        </a>
                    </li>
                    <?php $i++; ?>
                @endforeach
        @else
            @foreach($topTwelve as $top)
                <?php
                $every_fourth = ($i%4==0) ? ' clear-fourth' : '';
                $every_third = ($i%3==0) ? ' clear-third' : '';
                ?>
                <li class="has-text-centered<?= $every_fourth; ?><?= $every_third; ?>">
                    <a href="{{$top->url}}" target="_blank">
                        <span>{{$top->title}}</span>
                        <div class="top-twelve-image" style="background-image: url('{{ asset('uploads/toptwelve/'.$top->photo) }}');"></div>
                    </a>
                </li>
                    <?php $i++; ?>
            @endforeach
        @endif
    </ul>
@endcomponent