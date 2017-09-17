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
            <h2><i class="fa fa-home"></i>Taxes Dashboard <span>Taxes</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">Add Tax</li>
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
                            <form class="form-horizontal form-bordered" action="{{ route('tax-types.store') }}"
                                  role="form" method="post">
                                <div class="form-body">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Name<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="name">
                                            <label for="name" class="error"></label>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Rate<small> %</small><span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" name="rate">
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Status</label>
                                        <div class="col-sm-7">
                                            <div class="ckbox ckbox-theme rounded">
                                                <input id="checkbox-type-rounded1" type="checkbox" name="status">
                                                <label for="checkbox-type-rounded1"></label>
                                            </div>
                                        </div>
                                    </div><!-- /.form-group -->

                                </div>

                                <div class="form-footer">
                                    <div class="col-sm-offset-3">
                                        <button type="submit" class="btn btn-theme">Save Type</button>
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

