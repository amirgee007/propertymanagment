@extends('admin..auths.loginBase')
@section('forms')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <!-- Login form -->
    <form class="sign-in form-horizontal shadow no-overflow" action="{{ route('password.email') }}" method="POST">
        {{ csrf_field() }}
        <div class="sign-header">
            <div class="form-group">
                <div class="sign-text">
                    <span>Send Passwors reset link</span>
                </div>
            </div><!-- /.form-group -->
        </div><!-- /.sign-header -->

        <div class="sign-body">

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="input-group input-group-lg rounded no-overflow">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    {{--@if ($errors->has('email'))--}}
                    {{--<span class="help-block">--}}
                    {{--<strong>{{ $errors->first('email') }}</strong>--}}
                    {{--</span>--}}
                    {{--@endif--}}

                </div>
            </div><!-- /.form-group -->



        </div><!-- /.sign-body -->
        <div class="sign-footer">
            <div class="form-group">
            </div><!-- /.form-group -->
            <div class="form-group">
                <button type="submit" class="btn btn-theme btn-lg btn-block no-margin rounded" id="login-btn"> Send Password Reset Link</button>
            </div><!-- /.form-group -->

        </div><!-- /.sign-footer -->
    </form><!-- /.form-horizontal -->
    <!--/ Login form -->




@endsection

@section('footer_scripts')

@endsection
