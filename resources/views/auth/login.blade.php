@extends('layouts.app')

@section('content')
<style>
        .styled-input{
            margin: 10px 0px;
        }
    </style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal col-md-8 col-md-offset-2" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="styled-input">
                                <input type="email" class="input" id="email" name="email" value="{{ old('email') }}" required autofocus/>
                                <label>Email</label>
                                <span></span> 
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div> 
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="styled-input">
                                <input type="password" class="input" id="password" name="password" value="{{ old('password') }}" required />
                                <label>Password</label>
                                <span></span> 
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div> 
                        </div>

                        <div class="form-group">
                            <div class="">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Biarkan saya tetap masuk
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link pull-right" href="{{ route('password.request') }}">
                                    Lupa Password ?
                                </a>
                                                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
