@extends('layouts.login')

@section('content')
    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="card card-login">
                                    <div class="card-header text-center" data-background-color="rose">
                                        <h4 class="card-title">{{__('Register')}}</h4>
{{--                                        <div class="social-line">--}}
{{--                                            <a href="#btn" class="btn btn-just-icon btn-simple">--}}
{{--                                                <i class="fa fa-facebook-square"></i>--}}
{{--                                            </a>--}}
{{--                                            <a href="#pablo" class="btn btn-just-icon btn-simple">--}}
{{--                                                <i class="fa fa-twitter"></i>--}}
{{--                                            </a>--}}
{{--                                            <a href="#eugen" class="btn btn-just-icon btn-simple">--}}
{{--                                                <i class="fa fa-google-plus"></i>--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
                                    </div>
{{--                                    <p class="category text-center">--}}
{{--                                        Or Be Classical--}}
{{--                                    </p>--}}
                                    <div class="card-content">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">{{ __('Name') }}</label>
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
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
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">{{ __('Password') }}</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label for="password-confirm" class="control-label">{{ __('Confirm Password') }}</label>
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="optionsCheckboxes" checked> I agree to the
                                                <a href="#">terms and conditions</a>.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="footer text-center">
                                        <button type="submit" class="btn btn-primary btn-round">Get Started</button>
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
