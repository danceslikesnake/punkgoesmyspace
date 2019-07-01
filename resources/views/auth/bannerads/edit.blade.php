@extends('auth.layout')

@section('content')
    <div class="container">
        <br /><br />
        <a href="{{url('admin/bannerads')}}"><i class="fas fa-arrow-alt-left"></i> Back to Banner Ads</a>
        <br /><br />
        <div class="form-wrapper">
            <header>
                <h3>Editing {{$banner_ad->name}}</h3>
                @if(session('success'))
                    <div class="notification is-primary">{{session('success')}}</div>
                @endif
            </header>
            <div class="form-content">
                {!! Form::open(['action' => ['BannerAdsController@update', $banner_ad->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <input type="hidden" name="_method" value="PUT" />
                <div class="field">
                    <label class="label">Company</label>
                    <div class="control">
                        <input class="input" id="name" name="name" type="text" value="{{$banner_ad->name}}" required  />
                    </div>
                </div>
                <div class="field">
                    <label class="label">Destination URL</label>
                    <div class="control">
                        <input class="input" id="url" name="url" type="text" value="{{$banner_ad->url}}" required  />
                    </div>
                </div>
                <div class="notification">Images can be JPGs, PNGs, or GIFs</div>
                <div class="field">
                    <label class="label">Desktop Image (728 x 90)</label>
                    <img src="{{asset('uploads/banner_ads/'.$banner_ad->id.'/'.$banner_ad->image_desktop)}}"/>
                    <div class="control">
                        <input class="input" id="image_desktop" name="image_desktop" type="file" value="{{old('image_desktop')}}" />
                    </div>
                </div>
                <div class="field">
                    <label class="label">Tablet Image (568 x 90)</label>
                    <img src="{{asset('uploads/banner_ads/'.$banner_ad->id.'/'.$banner_ad->image_tablet)}}"/>
                    <div class="control">
                        <input class="input" id="image_tablet" name="image_tablet" type="file" value="{{old('image_tablet')}}" />
                    </div>
                </div>
                <div class="field">
                    <label class="label">Mobile Image (320 x 75)</label>
                    <img src="{{asset('uploads/banner_ads/'.$banner_ad->id.'/'.$banner_ad->image_mobile)}}"/>
                    <div class="control">
                        <input class="input" id="image_mobile" name="image_mobile" type="file" value="{{old('image_mobile')}}" />
                    </div>
                </div>
                <div class="field">
                    <div class="control has-text-right">
                        <button class="button submit">Update Banner Ad</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
