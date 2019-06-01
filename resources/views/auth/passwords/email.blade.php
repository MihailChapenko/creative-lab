@extends('layouts.login')

@section('content')
    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="card card-login">
                                    <div class="card-header text-center" data-background-color="rose">
                                        <h4 class="card-title">{{ __('Reset Password') }}</h4>
                                    </div>
                                    <div class="card-content">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert" style="margin-left: 20px">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">{{ __('E-Mail Address') }}</label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer text-center">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

