@extends('auth.layout')

@section('content')
    <div class="container">
        <br /><br />
        <a href="{{url('admin/albums')}}"><i class="fas fa-arrow-alt-left"></i> Back to Albums</a>
        <br /><br />
        <div class="form-wrapper">
            <header>
                <h3>Manage Photos for {{$album->name}}</h3>
                @if(session('success'))
                    <div class="notification is-primary">{{session('success')}}</div>
                @endif
            </header>
            @if($album->album_type == 'instagram')
                <div class="form-content">
                    <span class="tag is-instagram-tag"><i class="fab fa-instagram"></i>&nbsp;#{{$album->instagram_hashtag}}</span>
                </div>
            @else
                <div class="form-content">
                    {!! Form::open(['action' => 'PhotosController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <input type="hidden" name="album_id" value="{{$album->id}}" />
                    <div class="field">
                        <label class="label">Upload a Photo</label>
                        <div class="control">
                            <input class="input" id="photo" name="photo" type="file" required />
                            <div class="help">Maximum file size: 2MB</div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Description</label>
                        <div class="control">
                            <input class="input" id="photo_description" name="photo_description" type="text" />
                        </div>
                    </div>
                    <div class="field">
                        <div class="control has-text-right">
                            <button class="button submit">Upload</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            @endif
        </div>
        <div class="form-wrapper">
            @if($album->album_type == 'instagram')
            <header><h3>Photos Captured: ({{count($album->Photos)}})</h3></header>
            @else
            <header><h3>Photos Uploaded: ({{count($album->Photos)}})</h3></header>
            @endif
            <div class="form-content">
                @if(count($album->Photos) > 0)
                    <meta id="ajax-sort-url" data-route="{{url('admin/photos/sort')}}" />
                    <meta type="hidden" name="sort-csrf-token" content="{{csrf_token()}}">
                    <ul id="sortable" class="columns is-multiline cms-sortable-list">
                        @foreach($album->Photos as $photo)
                            @if($album->album_type == 'instagram')
                                @if($photo->instagram_is_visible)
                                <li class="column is-one-fifth-desktop is-one-quarter-tablet has-text-centered" id="{{$photo->id}}">
                                    <div style="height: 190px;"><img src="{{$photo->photo}}" style="max-height: 120px;" /></div>
                                    <p class="truncate-text">Posted by<br /><strong>{{$instagram_metadata[$photo->instagram_id]['username']}}</strong></p>
                                    {!! Form::open(['action' => ['PhotosController@instagram_photo_hide', $photo->id], 'method' => 'POST', 'onsubmit' => 'return confirm("Are you sure?")']) !!}
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <div class="field">
                                        <div class="control has-text-centered">
                                            <button class="button submit">Delete</button>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </li>
                                @endif
                            @else
                                <li class="column is-one-fifth-desktop is-one-quarter-tablet has-text-centered" id="{{$photo->id}}">
                                    <div style="height: 190px;"><img src="{{asset('uploads/albums/'.$photo->album_id.'/'.$photo->photo)}}" style="max-height: 190px;" /></div>
                                    <p class="truncate-text">{{$photo->photo}}</p>
                                    <div class="level">
                                        <div class="level-left"></div>
                                        <div class="level-right">
                                            <div class="level-item">
                                                <div class="field">
                                                    <div class="control has-text-centered">
                                                        <a href="{{ url('admin/photos/edit/'.$photo->id) }}" class="button submit" style="background: #5c78ff; border-color: #5c78ff;">Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="level-item">
                                                {!! Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'POST', 'onsubmit' => 'return confirm("Are you sure?")']) !!}
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <div class="field">
                                                    <div class="control has-text-centered">
                                                        <button class="button submit">Delete</button>
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @else
                    You have not any photos in this album yet.
                @endif
            </div>
        </div>
    </div>
@endsection