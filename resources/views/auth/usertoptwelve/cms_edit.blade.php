@extends('auth.layout')

@section('content')
    <div class="container">
        <br /><br />
        <a href="{{url('admin/usertoptwelve')}}"><i class="fas fa-arrow-alt-left"></i> Back to User Top 12</a>
        <br /><br />
        <div class="form-wrapper">
            <header>
                <h3>
                    Editing Artist ({{$userTopTwelve->artist_name}}) for User Top 12
                </h3>
                @if(session('success'))
                    <div class="notification is-primary">{{session('success')}}</div>
                @endif
                @if(session('error'))
                    <div class="notification is-warning">{{session('error')}}</div>
                @endif
                @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                        <div class="notification is-warning">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
            </header>
            <div class="form-content">
                {!! Form::open(['action' => ['UserTopTwelvesController@cms_update', $userTopTwelve->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <input type="hidden" name="_method" value="PUT" />
                <div class="field">
                    <label class="label">Artist Name</label>
                    <div class="control">
                        <input class="input" id="artist_name" name="artist_name" type="text" value="{{ $userTopTwelve->artist_name }}" required  />
                    </div>
                </div>
                <div class="field">
                    <label class="label">Current Photo</label>
                    <div><img src="{{asset('uploads/userTopTwelves/'.$userTopTwelve->photo)}}" width="200" /></div>
                    <br />
                    <div class="control">
                        <input class="input" id="photo" name="photo" type="file"  />
                        <div class="help">Maximum file size: 2MB</div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">URL</label>
                    <div class="control">
                        <input class="input" id="url" name="url" type="text" value="{{ $userTopTwelve->url }}" required  />
                    </div>
                </div>
                <div class="field">
                    <div class="control has-text-right">
                        <button class="button submit">Update Artist</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection