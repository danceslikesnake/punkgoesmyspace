@extends('auth.layout')

@section('content')
    <div class="container">
        <br /><br />
        <a href="{{url('admin/blogs')}}"><i class="fas fa-arrow-alt-left"></i> Back to Blogs</a>
        <br /><br />
        <div class="form-wrapper">
            <header>
                <h3>Editing {{ $blog->blog_title }}</h3>
                @if(session('success'))
                    <div class="notification is-primary">{{session('success')}}</div>
                @endif
            </header>
            <div class="form-content">
                {!! Form::open(['action' => ['BlogsController@update', $blog->id], 'method' => 'POST']) !!}
                <input type="hidden" name="_method" value="PUT" />
                <div class="field">
                    <label class="label">Title</label>
                    <div class="control">
                        <input class="input" id="blog_title" name="blog_title" type="text" value="{{$blog->blog_title}}" required  />
                    </div>
                </div>
                <div class="field">
                    <label class="label">Body</label>
                    <div class="notification is-info"><i class="fa fa-info-circle"></i> New videos you add will render correctly after submitting the form.</div>
                    <div class="control mimic-blog">
                        <textarea class="textarea" id="summernote_custom" name="blog_body" required>{{$blog->blog_body}}</textarea>
                    </div>
                </div>
                <div class="field">
                    <div class="control has-text-right">
                        <button class="button submit">Update Blog</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
