@extends('layouts.login')

@section('content')

    <div class="login-box">
        <div class="columns">
            <div class="column">


                <nav class="panel">

                    <div class="panel-heading">
                        KindHub Elementry School
                    </div>

                    <div class="panel-block">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            @csrf


                            <label for="email" >E-Mail Address</label>
                            <input id="email" type="email" class="input is-rounded {{ $errors->has('email') ? ' is-danger' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif

                            <label for="password" >Password</label>

                            <input id="password" type="password" class="input is-rounded {{ $errors->has('password') ? ' is-danger' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif



                            <label class="checkbox">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>


                            <div class="submit-login">
                                <button type="submit" class="button is-theme is-fullwidth" style="color: #000;">
                                    Login
                                </button>
                            </div>


                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection
