@component('shared.components.blue-content-block')
    @slot('title')
        Other Videos
    @endslot

    <ul class="other-videos-list">
        @foreach($otherVideos as $vid)
        <li>
            <div class="columns">
                <div class="column">
                    <a href="{{ url('music_videos/'.$vid->id) }}" class="other-video-link">
                        <span class="other-video-cover" style="background-image: url('{{ $vid->video_thumbnail }}');"></span>
                    </a>
                </div>
                <div class="column">
                    <a href="{{ url('music_videos/'.$vid->id) }}"><strong>{{$vid->title}}</strong></a><br />
                    {{$vid->video_length}}
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    <div class="has-text-right other-videos-footer"><a href="{{ url('music_videos') }}">See All Videos</a></div>
@endcomponent