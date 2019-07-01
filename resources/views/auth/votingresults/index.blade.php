@extends('auth.layout')

@section('content')
    <div class="container">
        <br /><br />
        <div class="form-wrapper">
            <header>
                <h3>Voting Results ({{$total_votes}} Total Votes)</h3>
            </header>
            <div class="form-content">
               @if(isset($total_votes) && $total_votes > 0)
                <ul class="columns">
                   @foreach($votes as $key => $vote)
                   <li class="column bar-chart">
                       <div class="bar-chart-track">
                           <span class="bar-chart-fill vertical" style="height: {{($vote/$total_votes) * 100}}%;"></span>
                           <span class="bar-chart-fill horizontal" style="width: {{($vote/$total_votes) * 100}}%;"></span>
                       </div>
                       <div class="has-text-centered-tablet">
                           <img class="band-img" src="{{asset('img/'.str_replace(' ', '-', strtolower($key)).'.png')}}" /><br />
                           <strong>{{$key}}</strong><br />
                           {{$vote}} Votes
                       </div>
                   </li>
                   @endforeach
                </ul>
               @else
                <p>No votes have been cast yet</p>
               @endif
            </div>
        </div>
    </div>
@endsection