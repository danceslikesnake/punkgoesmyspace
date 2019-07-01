@extends('auth.layout')

@section('content')
    <div class="container">
        <br /><br />
        @if(count($topTwelve) < 12)
        <div class="form-wrapper">
            <header>
                <h3>
                    Manage Top Twelve List
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
                {!! Form::open(['action' => 'TopTwelveController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="field">
                    <label class="label">Title</label>
                    <div class="control">
                        <input class="input" id="title" name="title" type="text" value="{{ old('title') }}" required  />
                    </div>
                </div>
                <div class="field">
                    <label class="label">Photo</label>
                    <div class="control">
                        <input class="input" id="photo" name="photo" type="file" required  />
                        <div class="help">Maximum file size: 2MB</div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">URL</label>
                    <div class="control">
                        <input class="input" id="url" name="url" type="text" value="{{ old('url') }}" required  />
                    </div>
                </div>
                <div class="field">
                    <div class="control has-text-right">
                        <button class="button submit">Add to List</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        @endif
        <div class="form-wrapper">
            <header><h3>Top Twelve List: ({{count($topTwelve)}} of 12)</h3></header>
            <div class="form-content">
                @if(count($topTwelve) > 0)
                    <ul class="columns is-multiline">
                        @foreach($topTwelve as $top)
                            <li class="column is-one-fifth-desktop is-one-quarter-tablet has-text-centered">
                                <div><img src="{{asset('uploads/toptwelve/'.$top->photo)}}" /></div>
                                <p class="truncate-text"><strong>{{$top->title}}</strong></p>
                                <div class="level">
                                    <div class="level-left">
                                    </div>
                                    <div class="level-right">
                                        <div class="level-item">
                                            <div class="field">
                                                <div class="control has-text-centered">
                                                    <a href="{{ url('admin/toptwelve/edit/'.$top->id) }}" class="button submit" style="background: #5c78ff; border-color: #5c78ff;">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                        {!! Form::open(['action' => ['TopTwelveController@destroy', $top->id], 'method' => 'POST', 'onsubmit' => 'return confirm("Are you sure?")']) !!}
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <div class="level-item">
                                            <div class="field">
                                                <div class="control has-text-centered">
                                                    <button class="button submit">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                You have not added to your list yet
                @endif
            </div>
        </div>
    </div>
@endsection