@extends('auth.layout')

@section('content')
    <div class="container">
        <br /><br />
        <div class="form-wrapper">
            <header>
                <h3>
                    Blogs
                    <span class="is-pulled-right">
                        <a href="{{ url('admin/blogs/create') }}" class="cms-cta-link">
                            <i class="far fa-plus"></i>Add Blog Post
                        </a>
                    </span>
                </h3>
                @if(session('success'))
                    <div class="notification is-primary">{{session('success')}}</div>
                @endif
            </header>
            <div class="form-content">
                @if(count($blogs) > 0)
                    <ul class="cms-table-list">
                        @foreach($blogs as $blog)
                            <li class="cms-table-list-row level">
                                <div class="level-left">
                                    <div class="level-item"><strong>{{$blog->blog_title}}</strong></div>
                                </div>
                                <div class="level-right">
                                    <div class="level-item"><a href="{{ url('admin/blogs/edit/'.$blog->id) }}" class="cms-cta-link outline-link">Edit</a></div>
                                    <div class="level-item">
                                        {!! Form::open(['action' => ['BlogsController@destroy', $blog->id], 'method' => 'POST', 'onsubmit' => 'return confirm("Are you sure?")']) !!}
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button class="cms-cta-link outline-link danger-link">Delete</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    You have not created any blogs yet.
                @endif
            </div>
        </div>
    </div>
@endsection