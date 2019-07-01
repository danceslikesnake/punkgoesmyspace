@component('shared.components.blue-content-block')
    @slot('title')
        Other Albums
    @endslot

    <ul class="other-albums-list">
        @foreach($other_albums as $other_album)
        <li>
            <div class="columns is-mobile">
                <div class="column is-half-mobile">
                    <a href="{{ url('albums/'.$other_album->id) }}" class="other-album-link">
                        <span class="other-album-cover" style="background-image: url('{{ asset('uploads/albums/'.$other_album->id.'/'.$other_album->cover_image) }}');"></span>
                    </a>
                </div>
                <div class="column is-half-mobile">
                    <a href="{{ url('albums/'.$other_album->id) }}"><strong>{{$other_album->name}}</strong></a><br />
                    {{count($other_album->Photos)}} Photos
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    <div class="has-text-right other-albums-footer"><a href="{{ url('albums') }}">See All Albums</a></div>
@endcomponent