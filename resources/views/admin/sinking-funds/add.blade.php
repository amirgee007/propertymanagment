@extends('admin.layouts.base')

@section('title')
    Add Sinking Funds
    @parent
@stop

@section('header_styles')

@endsection

@section('content')
    <section id="page-content">
        <div class="header-content">
            <h2><i class="fa fa-home"></i>Sinking Dashboard <span>Sinking Management</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">Add Sinking Funds</li>
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
                            <form class="form-horizontal form-bordered" action="{{ route('sinking-funds.store') }}"
                                  role="form" method="post">
                                <div class="form-body">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Lot<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <select id="select_lot" data-placeholder="Choose an Lot"
                                                    class="form-control chosen-select mb-15" tabindex="2"
                                                    name="lot_id" required>
                                                <option value="">Choose an Lot</option>
                                                @foreach($lots as $lot)
                                                    <option value="{{$lot->lot_id}}">{{$lot->lot_name}}</option>
                                                @endforeach
                                            </select>
                                            <label for="lot_id" class="error"></label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Description</label>
                                        <div class="col-sm-7">
                                            <textarea class="form-control" name="description" rows="5"></textarea>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Date</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="date" id="dp1">

                                            <label for="date" class="error"></label>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Amount<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" name="amount" required>
                                            <label for="amount" class="error"></label>
                                        </div>
                                    </div><!-- /.form-group -->

                                </div>

                                <div class="form-footer">
                                    <div class="col-sm-offset-3">
                                        <button type="submit" class="btn btn-theme">Save Fund</button>
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
<script>
    $('#dp1').datepicker({
        format: 'dd-mm-yyyy'
    }).on('changeDate', function (e) {
        $(this).datepicker('hide');
    });
</script>
@endsection

