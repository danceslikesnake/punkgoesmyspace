@component('shared.components.orange-content-block')
    @slot('title')
        Top 12
    @endslot
    <ul class="top-12-block is-clearfix">
        <?php $i = 0; ?>
        @foreach($topTwelve as $top)
                <?php
                $every_fourth = ($i%4==0) ? ' clear-fourth' : '';
                $every_third = ($i%3==0) ? ' clear-third' : '';
                    ?>
        <li class="has-text-centered<?= $every_fourth; ?><?= $every_third; ?>">
            <a href="{{$top->url}}" target="_blank">
                <span>{{$top->title}}</span>
                <img src="{{ asset('uploads/toptwelve/'.$top->photo) }}" alt="{{$top->title}}" />
            </a>
        </li>
        <?php $i++; ?>
        @endforeach
    </ul>
@endcomponent