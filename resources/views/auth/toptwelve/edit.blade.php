@extends('auth.layout')

@section('content')
    <div class="container">
        <br /><br />
        <a href="{{url('admin/toptwelve')}}"><i class="fas fa-arrow-alt-left"></i> Back to Top Twelve List</a>
        <br /><br />
        <div class="form-wrapper">
            <header>
                <h3>
                    Editing {{$topTwelve->title}}
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
                {!! Form::open(['action' => ['TopTwelveController@update', $topTwelve->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <input type="hidden" name="_method" value="PUT" />
                <div class="field">
                    <label class="label">Title</label>
                    <div class="control">
                        <input class="input" id="title" name="title" type="text" value="{{ $topTwelve->title }}" required  />
                    </div>
                </div>
                <div class="field">
                    <label class="label">Current Photo</label>
                    <div><img src="{{asset('uploads/toptwelve/'.$topTwelve->photo)}}" width="200" /></div>
                    <br />
                    <div class="control">
                        <div class="help">Upload a different photo</div>
                        <input class="input" id="photo" name="photo" type="file" />
                        <div class="help">Maximum file size: 2MB</div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">URL</label>
                    <div class="control">
                        <input class="input" id="url" name="url" type="text" value="{{ $topTwelve->url }}" required  />
                    </div>
                </div>
                <div class="field">
                    <div class="control has-text-right">
                        <button class="button submit">Update</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection