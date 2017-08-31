@extends('admin.layouts.base')

@section('title')
    Show Sinking Fund
    @parent
@stop

@section('header_styles')

@endsection

@section('content')
    <section id="page-content">
        <div class="header-content">
            <h2><i class="fa fa-home"></i>Sinking Fund Dashboard <span>Sinking Fund Management</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">Show Sinking Fund</li>
                </ol>
            </div>
        </div>

        <div class="body-content animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel rounded shadow">
                        <div class="panel-heading">
                            <div class="pull-right">
                                <a href="{{ URL::previous() }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" data-title="Go Back" data-original-title="Go Back" title="Go Back">Go Back</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body no-padding">
                            <form class="form-horizontal form-bordered" action="#"
                                  role="form" method="post">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Lot<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <select data-placeholder="Choose an Lot" class="form-control" tabindex="2" disabled>
                                                @foreach($lots as $lot)
                                                    <option @if($lot->lot_id == $fund->lot_id) selected @endif value="{{$lot->lot_id}}" >{{$lot->lot_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Description</label>
                                        <div class="col-sm-7">
                                            <textarea class="form-control" rows="5" readonly="readonly">{{ $fund->description }}</textarea>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Date</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" value="{{ $fund->date ? $fund->date->format('d-m-Y') : null }}" readonly="readonly">
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Amount<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="number" value="{{ $fund->amount }}" class="form-control" readonly="readonly">
                                        </div>
                                    </div><!-- /.form-group -->

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

