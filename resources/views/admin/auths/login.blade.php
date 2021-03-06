@extends('admin.auths.loginBase')
@section('title')
    Login Area
    @parent
@stop
@section('forms')
    @include('admin.auths.notifications')

    <form class="sign-in form-horizontal shadow no-overflow" action="{{ route('login') }}" method="POST">
        {{ csrf_field() }}
        <div class="sign-header">
            <div class="form-group">
                <div class="sign-text">
                    <span>Member Area</span>
                </div>
            </div>
        </div>
        <div class="sign-body">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="input-group input-group-lg rounded no-overflow">
                    <input id="email" type="email" name="email" class="form-control input-sm" value="{{ old('email') }}"
                           required autofocus placeholder="Enter Email Here">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                </div>
                @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div><!-- /.form-group -->


            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="input-group input-group-lg rounded no-overflow">
                    <input id="password" type="password" class="form-control input-sm" placeholder="Password"
                           name="password" value="" required>
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                </div>
                @if ($errors->has('password'))
                    <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
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
                </div>
            </div><!-- /.form-group -->
            <div class="form-group">
                <button type="submit" class="btn btn-theme btn-lg btn-block no-margin rounded" id="login-btn">Sign In
                </button>
            </div><!-- /.form-group -->

            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6 text-right">
                        <a class="btn btn-link" href="{{ route('password-reset') }}" style="color: darkgreen">
                            Forgot Password?
                        </a>
                    </div>
                </div>

                <div class="col-xs-6 text-right">
                    <a class="btn btn-link" href="{{ route('register') }}" style="color: darkgreen">
                        Create An Account
                    </a>
                </div>
            </div><!-- /.form-group -->
        </div><!-- /.sign-footer -->
    </form><!-- /.form-horizontal -->
    <!--/ Login form -->


@endsection

@section('footer_scripts')

@endsection
