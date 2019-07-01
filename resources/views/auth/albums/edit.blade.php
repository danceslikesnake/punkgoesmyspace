@extends('auth.layout')

@section('content')
    <div class="container">
        <br /><br />
        <div class="form-wrapper">
            <header>
                <h3>Edit {{$album->name}}</h3>
                @if(session('success'))
                    <div class="notification is-primary">{{session('success')}}</div>
                @endif
            </header>
            <div class="form-content">
                {!! Form::open(['action' => ['AlbumsController@update', $album->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <input type="hidden" name="_method" value="PUT" />
                <div class="field">
                    <label class="label">Album Name</label>
                    <div class="control">
                        <input class="input" id="name" name="name" type="text" value="{{$album->name}}" required  />
                    </div>
                </div>
                <div class="field">
                    <label class="label">Current Cover Image</label>
                    <div><img src="{{asset('uploads/albums/'.$album->id.'/'.$album->cover_image)}}" width="200" /></div>
                    <br />
                    <div class="control">
                        <div class="help">Upload a different cover image if you wish</div>
                        <input class="input" id="cover_image" name="cover_image" type="file" />
                        <div class="help">Maximum file size: 2MB</div>
                    </div>
                </div>
                @if($album->album_type == 'instagram')
                <div class="field reveal-hashtag">
                    <label class="label">Instagram Hashtag</label>
                    <span class="tag is-instagram-tag"><i class="fab fa-instagram"></i>&nbsp;#{{$album->instagram_hashtag}}</span>
                    <br /><br />
                    <div class="control has-icons-left">
                        <input class="input" id="instagram_hashtag" name="instagram_hashtag" value="{{$album->instagram_hashtag}}" type="text" />
                        <span class="icon is-small is-left" style="top: -4px">
                      <i class="fas fa-hashtag"></i>
                    </span>
                    </div>
                </div>
                @endif
                <div class="field">
                    <div class="control has-text-right">
                        <button class="button submit">Edit Album</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
