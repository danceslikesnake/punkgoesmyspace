@extends('auth.layout')

@section('content')
    <div class="container">
        <br /><br />
        <div class="form-wrapper">
            <header>
                <h3>
                    Email Captures
                </h3>
                @if(session('success'))
                    <div class="notification is-primary">{{session('success')}}</div>
                @endif
            </header>
            <div class="form-content">
                <table class="table is-striped is-hoverable is-fullwidth">
                    <thead>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Date Signed Up</th>
                    </thead>
                    <tbody>
                    @foreach($signups as $signup)
                        <tr>
                            <td>{{ $signup->first_name.' '.$signup->last_name }}</td>
                            <td>{{ $signup->email_address }}</td>
                            <td>{{ date('F d, Y', strtotime($signup->created_at)) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection