@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-dark text-light"> Be UniQue !!!</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label text-md-right"><span
                                                    class="fa fa-user"></span> {{ __('Name') }}</label>
                                        <input id="name" type="text"
                                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="name" value="{{ old('name') }}" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email"
                                               class="col-form-label text-md-right"><span class="fa fa-envelope"></span> {{ __('E-Mail Address') }}</label>
                                        <input id="email" type="email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password"
                                               class="col-form-label text-md-right"><span class="fa fa-lock"></span> {{ __('Password') }}</label>
                                        <input id="password" type="password"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password-confirm"
                                               class="col-form-label text-md-right"><span class="fa fa-lock"></span> {{ __('Confirm Password') }}</label>
                                            <input id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row mb-0">
                                        <button type="submit" class="btn btn-secondary btn-block">
                                            <span class="fa fa-user-plus"></span> Join Us
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p class="font-weight-normal"> Already a unique member ? </p>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row mb-0">
                                        <a href="{{url('/login')}}" class="btn btn-outline-secondary btn-block">
                                            <span class="fa fa-sign-in"></span> Login
                                        </a>
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
