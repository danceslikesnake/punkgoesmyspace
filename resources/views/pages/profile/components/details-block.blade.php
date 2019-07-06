@component('shared.components.blue-content-block')
    @slot('title')
        Punk Goes' Details
    @endslot

    <ul class="details-table is-clearfix">
        @if(!empty($custom_theme['content']['details']))
            @foreach($custom_theme['content']['details'] as $key => $val)
            <li class="th" style="clear: both;">{{ucwords(str_replace('_', ' ', $key))}}</li>
            <li class="td">{{$val}}</li>
            @endforeach
        @else
            @foreach($profile->details as $detail)
            <li class="th">{!! str_replace('::', '</li><li class="td">', $detail)!!}</li>
            @endforeach
        @endif
    </ul>
@endcomponent