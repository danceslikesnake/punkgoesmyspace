@extends('auth.layout')

@section('content')
    <div class="container">
        <br /><br />
        <div class="form-wrapper">
            <header>
                <h3>
                    Videos
                </h3>
                @if(session('success'))
                    <div class="notification is-primary">{{session('success')}}</div>
                @endif
                @if(session('errors'))
                    <div class="notification is-warning">{{session('errors')}}</div>
                @endif
            </header>
            <div class="form-content">
                {!! Form::open(['action' => 'VideosController@store', 'method' => 'POST']) !!}
                <div class="field">
                    <label class="label">Youtube Video Link</label>
                    <div class="control">
                        <input class="input" id="video_link" name="video_link" type="text" required  />
                    </div>
                    <div class="help">E.g., https://www.youtube.com/watch?v=5VBbS1e3LYI</div>
                </div>
                <div class="field">
                    <div class="control has-text-right">
                        <button class="button submit">Add Video</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="form-wrapper">
            <header><h3>Videos Uploaded: ({{count($videos)}})</h3></header>
            <div class="form-content">
                @if(count($videos) > 0)
                    <meta id="ajax-sort-url" data-route="{{url('admin/music_videos/sort')}}" />
                    <meta type="hidden" name="sort-csrf-token" content="{{csrf_token()}}">
                    <ul id="sortable" class="columns is-multiline cms-sortable-list">
                        @foreach($videos as $video)
                            <li id="{{$video->id}}" class="column is-one-fifth-desktop is-one-quarter-tablet has-text-centered">
                                <div><img src="{{$video->video_thumbnail}}" /></div>
                                <p class="truncate-text">{{$video->title}}</p>
                                {!! Form::open(['action' => ['VideosController@destroy', $video->id], 'method' => 'POST', 'onsubmit' => 'return confirm("Are you sure?")']) !!}
                                <input type="hidden" name="_method" value="DELETE" />
                                <div class="field">
                                    <div class="control has-text-centered">
                                        <button class="button submit">Remove</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </li>
                        @endforeach
                    </ul>
                @else
                    You have not uploaded any videos yet.
                @endif
            </div>
        </div>
    </div>
@endsection