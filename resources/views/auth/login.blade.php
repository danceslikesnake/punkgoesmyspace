@extends('auth.layout')

@section('content')
<div class="container">
    <br /><br />
    <div class="form-wrapper">
        <header>
            <h3>Login</h3>
        </header>
        <div class="form-content">
            <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
                <div class="field">
                    <label class="label">Email Address</label>
                    <div class="control">
                        <input class="input" id="email" name="email" type="email" value="{{ old('email') }}" required autofocus />
                        @if ($errors->has('email'))
                            <p class="help is-danger">
                                {{ $errors->first('email') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="field">
                    <label class="label">Password</label>
                    <div class="control">
                        <input class="input" id="password" name="password" type="password" required />
                        @if ($errors->has('password'))
                            <p class="help is-danger">
                                {{ $errors->first('password') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="field">
                    <div class="control has-text-right">
                        <button class="button submit">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
