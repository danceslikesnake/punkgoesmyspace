@extends('auth.layout')

@section('content')
    <div class="container">
        <br /><br />
        <div class="form-wrapper">
            <header>
                <h3>Create an Album</h3>
                @if(session('success'))
                    <div class="notification is-primary">{{session('success')}}</div>
                @endif
                @if(session('error'))
                    <div class="notification is-danger">{{session('error')}}</div>
                @endif
                @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                        <div class="notification is-danger">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
            </header>
            <div class="form-content">
                {!! Form::open(['action' => 'AlbumsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="field">
                    <label class="label">Album Name</label>
                    <div class="control">
                        <input class="input" id="name" name="name" type="text" value="{{old('name')}}" required  />
                    </div>
                </div>
                <div class="field">
                    <label class="label">Cover Image</label>
                    <div class="control">
                        <input class="input" id="cover_image" name="cover_image" type="file" value="{{old('cover_image')}}" required />
                    </div>
                </div>
                <div class="field">
                    <label class="label">Album Type</label>
                    <div class="control">
                        <div class="select">
                            <select id="album_type" name="album_type">
                                <option value="manual" selected>Manual Upload (default)</option>
                                <option value="instagram">Instagram (via hashtag)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field reveal-hashtag" style="display: none;">
                    <label class="label">Instagram Hashtag</label>
                    <div class="control has-icons-left">
                        <input class="input" id="instagram_hashtag" name="instagram_hashtag" value="{{old('instagram_hashtag')}}" type="text" />
                        <span class="icon is-small is-left" style="top: -4px">
                          <i class="fas fa-hashtag"></i>
                        </span>
                    </div>
                </div>
                <div class="field">
                    <div class="control has-text-right">
                        <button class="button submit">Create Album</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
