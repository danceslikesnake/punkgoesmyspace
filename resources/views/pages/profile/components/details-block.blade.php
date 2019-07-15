@component('shared.components.blue-content-block')
    @slot('title')
        Punk Goes' Details
    @endslot

    <ul class="details-table">
        @if(!empty($custom_theme['content']['details']))
            @foreach($custom_theme['content']['details'] as $key => $val)
            <li class="tr">
                <div class="th">{{ucwords(str_replace('_', ' ', $key))}}</div>
                <div class="td">{{$val}}</div>
            </li>
            @endforeach
        @else
            @foreach($profile->details as $detail)
            <li class="tr">
                <div class="th">{!! str_replace('::', '</div><div class="td">', $detail)!!}</div>
            </li>
            @endforeach
        @endif
    </ul>
@endcomponent