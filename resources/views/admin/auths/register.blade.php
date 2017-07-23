@extends('admin..auths.loginBase')
@section('title')
    Regester New
    @parent
@stop
@section('forms')

    <!-- Login form -->
    <form class="sign-in form-horizontal shadow no-overflow" method="POST" action="{{ route('register') }}" >
        {{ csrf_field() }}
        <div class="sign-header">
            <div class="form-group">
                <div class="sign-text">
                    <span>Register Here</span>
                </div>
            </div>
        </div>

        <div class="" style="margin-top: 20px">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <div class="input-group input-group-lg rounded no-overflow">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus placeholder="Enter Name Here">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                </div>
                @if ($errors->has('name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif
            </div>


            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="input-group input-group-lg rounded no-overflow">
                    <input id="email" name="email" type="text" class="form-control input-sm" value="{{ old('email') }}" placeholder="Enter Email Here" >
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
                    <input id="password" type="password" class="form-control input-sm"  name="password" value="" placeholder="Password">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                </div>
                @if ($errors->has('password'))
                    <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="input-group input-group-lg rounded no-overflow">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                </div>
            </div>


        </div><!-- /.sign-body -->
        <div class="sign-footer">
            <div class="form-group">
                <button type="submit" class="btn btn-theme btn-lg btn-block no-margin rounded" id="login-btn">Register</button>
            </div><!-- /.form-group -->
        </div><!-- /.sign-footer -->
    </form><!-- /.form-horizontal -->
    <!--/ Login form -->


@endsection

@section('footer_scripts')

@endsection
