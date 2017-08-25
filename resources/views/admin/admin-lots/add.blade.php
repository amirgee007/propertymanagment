@extends('admin.layouts.base')

@section('title')
    Add Lot and Lot Type
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
                    <li class="active">Add Lots and Lot type</li>
                </ol>
            </div>
        </div>

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
                                                <h3 class="panel-title">Lot Type<code>Add New Here</code></h3>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="panel-body no-padding">
                                            <form class="form-horizontal form-bordered" method="post" role="form" action="{{route('post.lot.save.lotType')}}">
                                                <div class="form-body">
                                                    {{csrf_field()}}

                                                    <div class="form-group">
                                                        <label for="lot_type_name" class="col-sm-3 control-label">Name</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm" id="lot_type_name" name="lot_type_name" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="lot_type_description" class="col-sm-3 control-label">Description</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm" id="lot_type_description" name="lot_type_description" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="lot_type_code" class="col-sm-3 control-label">Code</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm" id="lot_type_code" name="lot_type_code" maxlength="2" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="lot_type_size" class="col-sm-3 control-label">Size</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control input-sm" id="lot_type_size" name="lot_type_size" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="lot_type_qty" class="col-sm-3 control-label">Quantity</label>
                                                        <div class="col-sm-7">
                                                            <input type="number" class="form-control input-sm" id="lot_type_qty" name="lot_type_qty" required>
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

            <div class="body-content animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h3 class="panel-title">All lot Types</h3>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body no-padding">
                                <div class="table-responsive" style="margin-top: -1px;">
                                    <table class="table table-striped table-primary">
                                        <thead>
                                        <tr>
                                            <th class="text-center border-right" style="width: 1%;">ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Code</th>
                                            <th>Size</th>
                                            <th>Quantity</th>
                                            <th>Created At</th>
                                            <th class="text-center" style="width: 12%;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($lotTypes as $lotType)
                                        <tr>
                                            <td class="text-center border-right">{{$lotType->lot_type_id}}</td>
                                            <td>{{$lotType->lot_type_name}}</td>
                                            <td>{{$lotType->lot_type_description}}</td>
                                            <td>{{$lotType->lot_type_code}}</td>
                                            <td>{{$lotType->lot_type_size}}</td>
                                            <td>{{$lotType->lot_type_qty}}</td>
                                            <td>{{ isset($lotType->created_at) ? $lotType->created_at->diffForHumans() :  ''  }}</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="View detail"><i class="fa fa-eye"></i></a>
                                                <a href="#" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                <a onclick="return confirm('Are you sure you want to delete this record?')" href="{{ route('lot.type.delete', $lotType->lot_type_id) }}"  class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div><!-- /.table-responsive -->
                            </div><!-- /.panel-body -->
                        </div><!-- /.panel -->
                        <!--/ End basic color table -->

                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->

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

