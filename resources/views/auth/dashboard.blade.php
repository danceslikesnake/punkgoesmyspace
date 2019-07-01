@extends('auth.layout')

@section('content')
    <div class="container">
        <br /><br />
        <div class="form-wrapper">
            <header><h3>Dashboard</h3></header>
            <div class="form-content">
                <p>Welcome, <span>{{ Auth::user()->name }}</span>!</p>
                <p>You can edit the Punk Goes Acoustic site using any of the links to the left!</p>
            </div>
        </div>
    </div>
@endsection
