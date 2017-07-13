@extends('admin..auths.loginBase')
@section('forms')

    <!-- Login form -->
    <form class="sign-in form-horizontal shadow no-overflow" action="{{ route('login') }}" method="post">
        {{ csrf_field() }}
        <div class="sign-header">
            <div class="form-group">
                <div class="sign-text">
                    <span>Register Here</span>
                </div>
            </div><!-- /.form-group -->
        </div><!-- /.sign-header -->
        <div class="sign-body">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="input-group input-group-lg rounded no-overflow">
                    <input id="email" type="text" class="form-control input-sm" value="{{ old('email') }}" required autofocus placeholder="Enter Email Here">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                </div>
            </div><!-- /.form-group -->

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="input-group input-group-lg rounded no-overflow">
                    <input id="email" type="text" class="form-control input-sm" value="{{ old('email') }}" required autofocus placeholder="Enter Email Here">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                </div>
            </div><!-- /.form-group -->


            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="input-group input-group-lg rounded no-overflow">
                    <input id="email" type="text" class="form-control input-sm" value="{{ old('email') }}" required autofocus placeholder="Enter Email Here">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                </div>
            </div><!-- /.form-group -->


            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="input-group input-group-lg rounded no-overflow">
                    <input id="password" type="password" class="form-control input-sm" placeholder="Password" name="password" value="" required>
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    {{--@if ($errors->has('password'))--}}
                    {{--<span class="help-block">--}}
                    {{--<strong>{{ $errors->first('password') }}</strong>--}}
                    {{--</span>--}}
                    {{--@endif--}}
                </div>
            </div>



        </div><!-- /.sign-body -->
        <div class="sign-footer">
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="ckbox ckbox-theme">
                            <input id="rememberme" type="checkbox">
                            <label for="rememberme" class="rounded" style="color: darkgreen">Remember me</label>
                        </div>
                    </div>
                    <div class="col-xs-6 text-right">
                        <a class="btn btn-link" href="{{ route('password.request') }}" style="color: darkgreen">
                            Forgot Your Password?
                        </a>
                    </div>
                </div>
            </div><!-- /.form-group -->
            <div class="form-group">
                <button type="submit" class="btn btn-theme btn-lg btn-block no-margin rounded" id="login-btn">Sign In</button>
            </div><!-- /.form-group -->
        </div><!-- /.sign-footer -->
    </form><!-- /.form-horizontal -->
    <!--/ Login form -->


@endsection

@section('footer_scripts')

@endsection
