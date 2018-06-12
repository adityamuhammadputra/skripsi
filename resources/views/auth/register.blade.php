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
                <div class="panel-heading">Bergabung</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="styled-input">
                                    <input type="text" class="input" id="name" name="name" value="{{ old('name') }}" required autofocus/>
                                    <label>Nama</label>
                                    <span></span> 
                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div> 
                            </div>

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

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="styled-input">
                                    <input type="password" class="input" id="password-confirm" name="password_confirmation" required />
                                    <label>Konfirmasi Password</label>
                                    <span></span> 
                                </div> 
                            </div>

                            <div class="form-group">
                                <div class="">
                                    <button type="submit" class="btn btn-primary">
                                        Bergabung
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
