@component('shared.components.blue-content-block')
    @slot('title')
        Punk Goes' Details
    @endslot

    <ul class="details-table is-clearfix">
        @foreach($profile->details as $detail)
            <li class="th">{!! str_replace('::', '</li><li class="td">', $detail)!!}</li>
        @endforeach
    </ul>
@endcomponent