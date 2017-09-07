@extends('admin.layouts.base')

@section('title')
    Edit Lot Type
    @parent
@stop

@section('header_styles')

@endsection

@section('content')
    <section id="page-content">
        <div class="header-content">
            <h2><i class="fa fa-home"></i>Projects Dashboard <span>Owner Management</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">Edit Lot type</li>
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

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel rounded shadow">
                                        <div class="panel-heading">
                                            <div class="pull-left">
                                                <h3 class="panel-title">Lot Type <small>Edit here</small></h3>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="panel-body no-padding">
                                            <form class="form-horizontal form-bordered" method="post" action="{{route('get.lot.update' , $lotType->lot_type_id)}}">
                                                <div class="form-body">
                                                    {{csrf_field()}}

                                                    <div class="form-group">
                                                        <label for="lot_type_name" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-7">
                                                            <input type="text"
                                                                   value="{{!isset($lotType)?:$lotType->lot_type_name}}"
                                                                   class="form-control input-sm" id="lot_type_name"
                                                                   name="lot_type_name" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="lot_type_description" class="col-sm-3 control-label">Description</label>
                                                        <div class="col-sm-7">
                                                            <textarea class="form-control input-sm"
                                                                      rows="4" id="lot_type_description"
                                                                      name="lot_type_description"
                                                                      required>{{!isset($lotType)?:$lotType->lot_type_description}}</textarea>
                                                        </div>
                                                    </div>

                                                    {{--<div class="form-group">--}}
                                                        {{--<label for="lot_type_code" class="col-sm-3 control-label">Code</label>--}}
                                                        {{--<div class="col-sm-7">--}}
                                                            {{--<input type="text"--}}
                                                                   {{--value="{{!isset($lotType)?:$lotType->lot_type_code}}"--}}
                                                                   {{--class="form-control input-sm"--}}
                                                                   {{--id="lot_type_code"--}}
                                                                   {{--name="lot_type_code"--}}
                                                                   {{--maxlength="2" required>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}

                                                    <div class="form-group">
                                                        <label for="lot_type_size" class="col-sm-3 control-label">Size</label>
                                                        <div class="col-sm-7">
                                                            <input type="text"
                                                                   value="{{!isset($lotType)?:$lotType->lot_type_size}}"
                                                                   class="form-control input-sm"
                                                                   id="lot_type_size"
                                                                   name="lot_type_size"
                                                                   required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="lot_type_qty" class="col-sm-3 control-label">Quantity</label>
                                                        <div class="col-sm-7">
                                                            <input type="number"
                                                                   value="{{!isset($lotType)?:$lotType->lot_type_qty}}"
                                                                   class="form-control input-sm"
                                                                   id="lot_type_qty"
                                                                   name="lot_type_qty" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-footer">
                                                    <div class="col-sm-offset-3">
                                                        <button type="submit" class="btn btn-success">Save Lot Type</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div><!-- /.panel-body -->
                                    </div><!-- /.panel -->
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel -->
                </div>
            </div>

        @include('admin.layouts.pagefooter')
    </section>

@endsection

@section('footer_scripts')

    <script>
        $(document).ready(function () {


        });
    </script>

@endsection

