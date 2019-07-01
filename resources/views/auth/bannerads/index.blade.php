@extends('auth.layout')

@section('content')
    <div class="container">
        <br /><br />
        <div class="form-wrapper">
            <header>
                <h3>
                    Banner Ads
                    <span class="is-pulled-right">
                        <a href="{{ url('admin/bannerads/create') }}" class="cms-cta-link">
                            <i class="far fa-plus"></i>Add a Banner Ad
                        </a>
                    </span>
                </h3>
                @if(session('success'))
                    <div class="notification is-primary">{{session('success')}}</div>
                @endif
            </header>
            <div class="form-content">
                <meta type="hidden" name="csrf-token" content="{{csrf_token()}}">
                @if(count($banner_ads) > 0)
                    <ul class="cms-table-list">
                        @foreach($banner_ads as $banner_ad)
                            <li class="cms-table-list-row level">
                                <div class="level-left">
                                    <div class="level-item"><strong>{{$banner_ad->name}}</strong></div>
                                </div>
                                <div class="level-right" id="banner_ad_{{$banner_ad->id}}">
                                    <div class="level-item switch-label">{{($banner_ad->is_active) ? 'Active' : 'Inactive'}}</div>
                                    <div class="level-item">
                                        <button class="banner-toggle-btn{{($banner_ad->is_active) ? ' is-active' : ''}}" data-id="{{$banner_ad->id}}" data-route="{{url('admin/bannerads/activate')}}" {{($banner_ad->is_active) ? 'disabled' : ''}}><i class="fas {{($banner_ad->is_active) ? 'fa-toggle-on' : 'fa-toggle-off'}}"></i></button>
                                    </div>
                                    <div class="level-item"><span style="font-size: 16px;">&middot;</span></div>
                                    <div class="level-item"><a href="{{ url('admin/bannerads/edit/'.$banner_ad->id) }}" class="cms-cta-link outline-link">Edit</a></div>
                                    <div class="level-item">
                                        {!! Form::open(['action' => ['BannerAdsController@destroy', $banner_ad->id], 'method' => 'POST', 'onsubmit' => 'return confirm("Are you sure?")']) !!}
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button class="cms-cta-link outline-link danger-link">Delete</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    You have not added any banner ads yet.
                @endif
            </div>
        </div>
    </div>
@endsection