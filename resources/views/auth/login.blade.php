@extends('layouts.app')
@section('content')

    <div class="login-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card">
                            <div class="card-body">
                                <div class="logo text-center">
                                    <a href="{{url('/')}}">
                                        <img src="{{ asset('assets/images/f-logo.png') }}" alt="">
                                    </a>
                                </div>
                                <h4 class="text-center m-t-15">Log into Your Account</h4>
                                @if(\Session::has('message'))
                                    <p class="alert alert-info">
                                        {{ \Session::get('message') }}
                                    </p>
                                @endif
                                <form action="{{ route('login') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input id="email" name="email" type="text"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               required
                                               autocomplete="email" autofocus placeholder="Email"
                                               value="{{ old('email', null) }}">
                                    </div>
                                    <div class="form-group">
                                        <input id="password" name="password" type="password"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               required
                                               placeholder="{{ trans('global.login_password') }}">

                                        @if($errors->has('password'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('password') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="text-center m-b-15 m-t-15">
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
    <!-- Common JS -->
    <script src="{{ asset('assets/plugins/common/common.min.js') }}"></script>
    <!-- Custom script -->
    <script src="{{ asset('main/js/custom.min.js') }}"></script>

@endsection
