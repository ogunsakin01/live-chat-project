@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-dark">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email"
                                               class="col-form-label text-md-right"><span class="fa fa-envelope"></span> {{ __('E-Mail Address') }}</label>
                                        <input id="email" type="email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" value="{{ $email ?? old('email') }}" required autofocus>
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
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password-confirm"
                                               class="col-form-label text-md-right"><span class="fa fa-lock"></span> {{ __('Confirm Password') }}</label>

                                            <input id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation" required>
                                    </div>
                                </div>

                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12">
                                    <div class="form-group">
                                            <button type="submit" class="btn btn-outline-primary">
                                                {{ __('Reset Password') }}
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
