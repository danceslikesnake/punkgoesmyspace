@extends('auth.layout')

@section('content')
    <div class="container">
        <br /><br />
        <a href="{{url('admin/bannerads')}}"><i class="fas fa-arrow-alt-left"></i> Back to Banner Ads</a>
        <br /><br />
        <div class="form-wrapper">
            <header>
                <h3>Add a Banner Ad</h3>
                @if(session('success'))
                    <div class="notification is-primary">{{session('success')}}</div>
                @endif
            </header>
            <div class="form-content">
                {!! Form::open(['action' => 'BannerAdsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="field">
                    <label class="label">Company</label>
                    <div class="control">
                        <input class="input" id="name" name="name" type="text" value="{{old('name')}}" required  />
                    </div>
                </div>
                <div class="field">
                    <label class="label">Destination URL</label>
                    <div class="control">
                        <input class="input" id="url" name="url" type="text" value="{{old('url')}}" required  />
                    </div>
                </div>
                <div class="notification">Images can be JPGs, PNGs, or GIFs</div>
                <div class="field">
                    <label class="label">Desktop Image (728 x 90)</label>
                    <div class="control">
                        <input class="input" id="image_desktop" name="image_desktop" type="file" value="{{old('image_desktop')}}" required />
                    </div>
                </div>
                <div class="field">
                    <label class="label">Tablet Image (568 x 90)</label>
                    <div class="control">
                        <input class="input" id="image_tablet" name="image_tablet" type="file" value="{{old('image_tablet')}}" required />
                    </div>
                </div>
                <div class="field">
                    <label class="label">Mobile Image (320 x 75)</label>
                    <div class="control">
                        <input class="input" id="image_mobile" name="image_mobile" type="file" value="{{old('image_mobile')}}" required />
                    </div>
                </div>
                <div class="field">
                    <div class="control has-text-right">
                        <button class="button submit">Add Banner Ad</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
