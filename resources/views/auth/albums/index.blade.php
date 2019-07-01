@extends('auth.layout')

@section('content')
    <div class="container">
        <br /><br />
        <div class="form-wrapper">
            <header>
                <h3>
                    Photo Albums
                    <span class="is-pulled-right">
                        <a href="{{ url('admin/albums/create') }}" class="cms-cta-link">
                            <i class="far fa-plus"></i>Create Album
                        </a>
                    </span>
                </h3>
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
                @if(count($albums) > 0)
                    <ul class="cms-table-list">
                        @foreach($albums as $album)
                            <li class="cms-table-list-row level">
                                <div class="level-left">
                                    <div class="level-item">
                                        <div class="cms-table-thumbnail" style="background-image: url('{{ asset("uploads/albums/".$album->id."/".$album->cover_image) }}');"></div>
                                    </div>
                                    <div class="level-item"><strong>{{$album->name}}</strong></div>
                                    <div class="level-item">({{count($album->Photos)}}) Photos</div>
                                    @if($album->album_type == 'instagram')
                                    <div class="level-item"><span class="tag is-instagram-tag"><i class="fab fa-instagram"></i>&nbsp;&nbsp;#{{$album->instagram_hashtag}}</span></div>
                                    @endif
                                </div>
                                <div class="level-right">
                                    <div class="level-item"><a href="{{ url('admin/albums/'.$album->id) }}" class="cms-cta-link outline-link">Photos</a></div>
                                    <div class="level-item"><span style="font-size: 16px;">&middot;</span></div>
                                    <div class="level-item"><a href="{{ url('admin/albums/edit/'.$album->id) }}" class="cms-cta-link outline-link">Edit</a></div>
                                    <div class="level-item">
                                        {!! Form::open(['action' => ['AlbumsController@destroy', $album->id], 'method' => 'POST', 'onsubmit' => 'return confirm("Are you sure?")']) !!}
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button class="cms-cta-link outline-link danger-link">Delete</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    You have not created any albums yet.
                @endif
            </div>
        </div>
    </div>
@endsection