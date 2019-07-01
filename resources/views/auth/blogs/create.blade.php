@extends('auth.layout')

@section('content')
    <div class="container">
        <br /><br />
        <a href="{{url('admin/blogs')}}"><i class="fas fa-arrow-alt-left"></i> Back to Blogs</a>
        <br /><br />
        <div class="form-wrapper">
            <header>
                <h3>Add a Blog</h3>
                @if(session('success'))
                    <div class="notification is-primary">{{session('success')}}</div>
                @endif
            </header>
            <div class="form-content">
                {!! Form::open(['action' => 'BlogsController@store', 'method' => 'POST']) !!}
                <div class="field">
                    <label class="label">Title</label>
                    <div class="control">
                        <input class="input" id="blog_title" name="blog_title" type="text" required  />
                    </div>
                </div>
                <div class="field">
                    <label class="label">Body</label>
                    <div class="control mimic-blog">
                        <textarea class="textarea" id="summernote_custom" name="blog_body" required></textarea>
                    </div>
                </div>
                <div class="field">
                    <div class="control has-text-right">
                        <button class="button submit">Add Blog</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
