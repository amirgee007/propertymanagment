@extends('admin.layouts.base')

@section('title')
    Add Tax
    @parent
@stop

@section('header_styles')

@endsection

@section('content')
    <section id="page-content">
        <div class="header-content">
            <h2><i class="fa fa-home"></i>Admin Dashboard <span>Users</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">Edit User</li>
                </ol>
            </div>
        </div>

        @include('flash::error_message')
        @include('flash::message')
        <div class="body-content animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel rounded shadow">
                        <div class="panel-body no-padding">
                            <form class="form-horizontal form-bordered" action="{{ route('users.update', $user) }}"
                                  role="form" method="post">
                                <div class="form-body">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="put"/>

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-3 control-label">Name</label>

                                        <div class="col-md-7">
                                            <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-3 control-label">E-Mail Address</label>

                                        <div class="col-md-7">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                                        <label class="col-sm-3 control-label">Assign Role</label>
                                        <div class="col-sm-7">
                                            <select id="role_id" data-placeholder="Choose a Role"
                                                    class="form-control chosen-select mb-15" tabindex="2"
                                                    name="role_id">
                                                <option value="">Choose a Role</option>
                                                @foreach($roles as $role)
                                                    <option @if($role->id == $user->role_id) selected @endif value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('role_id'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('role_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-3 control-label">Password</label>

                                        <div class="col-md-7">
                                            <input id="password" type="password" class="form-control" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password-confirm" class="col-md-3 control-label">Confirm Password</label>

                                        <div class="col-md-7">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Status</label>
                                        <div class="col-sm-7">
                                            <div class="ckbox ckbox-theme rounded">
                                                <input id="checkbox-type-rounded1" type="checkbox" {{ $user->is_verify == 1 ? 'checked' : null }} name="is_verify">
                                                <label for="checkbox-type-rounded1"></label>
                                            </div>
                                        </div>
                                    </div><!-- /.form-group -->

                                </div>

                                <div class="form-footer">
                                    <div class="col-sm-offset-3">
                                        <button type="submit" class="btn btn-theme">Update User</button>
                                        <a href="{{ URL::previous() }}" class="btn">Cancel</a>
                                    </div>
                                </div>

                            </form>
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel -->
                </div>
            </div>

        </div>

        @include('admin.layouts.pagefooter')
    </section>

@endsection

@section('footer_scripts')

@endsection

