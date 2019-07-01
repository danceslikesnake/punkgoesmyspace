@component('shared.components.orange-content-block')
    @slot('title')
        Punk Goes' Blurbs
    @endslot
    <h4 class="about-me-title">About Me</h4>
    {!! $profile->about_me !!}
@endcomponent