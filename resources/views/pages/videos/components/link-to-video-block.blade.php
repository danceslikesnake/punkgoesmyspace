@component('shared.components.blue-content-block')
    @slot('title')
        Link to this video
    @endslot

    Video URL: <strong class="copy-to-clipboard-message" style="display: none; color: #28a745;">Copied!</strong>
    <div class="video-url-input">
        <input type="text" readonly value="{{ url('music_videos/'.$video->id) }}" class="for-clipboard" /> <button type="button" class="copy-to-clipboard">Copy</button>
    </div>
@endcomponent