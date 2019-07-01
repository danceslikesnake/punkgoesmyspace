@component('shared.components.blue-content-block')
    @slot('title')
        Link to this photo
    @endslot

    Photo URL: <strong class="copy-to-clipboard-message" style="display: none; color: #28a745;">Copied!</strong>
    <div class="photo-url-input">
        <input type="text" value="{{url('photos/'.$photo->id)}}" class="for-clipboard" /> <button type="button" class="copy-to-clipboard">Copy</button>
    </div>
@endcomponent