@extends('admin.layouts.base')

@section('title')
    Add Invoice
    @parent
@stop

@section('header_styles')

@endsection

@section('content')
    <section id="page-content">
        <div class="header-content">
            <h2><i class="fa fa-home"></i>Invoicing Dashboard <span>Invoice Management</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">Add Invoice</li>
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
                            <form class="form-horizontal form-bordered" action="{{ route('invoices.store') }}"
                                  role="form" method="post">
                                <div class="form-body">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Owner<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <select id="select_owner" data-placeholder="Choose an Owner"
                                                    class="form-control chosen-select mb-15" tabindex="2"
                                                    name="owner_id" required>
                                                <option value="">Choose an Owner</option>
                                                @foreach($owners as $owner)
                                                    <option value="{{$owner->owner_id}}">{{$owner->owner_name}}</option>
                                                @endforeach
                                            </select>
                                            <label for="owner_id" class="error"></label>
                                        </div>
                                    </div>

                                    <div id="owner_lots">

                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Transaction Description<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <textarea class="form-control" name="invoice_trans_des" rows="5"
                                                      required></textarea>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Date<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="date" id="dp1">

                                            <label for="date" class="error"></label>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Quantity<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" name="invoice_quantity">
                                            {{--<label for="invoice_quantity" class="error @if($errors->has('invoice_quantity')) show @endif">{{ @$errors->get('invoice_quantity')[0] }}</label>--}}
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">UOM<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="invoice_uom">
                                            <label for="invoice_uom" class="error"></label>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Charge Rate<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control"
                                                   name="invoice_charge_rate"> <label for="invoice_uom"
                                                                                      class="error"></label>
                                            <label for="invoice_charge_rate" class="error"></label>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Amount<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="number" class="form-control" name="invoice_amount">
                                            <label for="invoice_amount" class="error"></label>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Type<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="type" required>
                                                <option value="">Choose Type</option>
                                                <option value="utility">Utility</option>
                                                <option value="sinking">Sinking</option>
                                                <option value="maintenance">Maintenance</option>
                                            </select>
                                            <label for="type" class="error"></label>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Status<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="invoice_status" required>
                                                <option value="">Choose Status</option>
                                                <option value="paid">Paid</option>
                                                <option value="unpaid">Unpaid</option>
                                                <option value="partial">Partial</option>
                                                <option value="overdue">Overdue</option>
                                            </select>
                                            <label for="invoice_status" class="error"></label>
                                        </div>
                                    </div><!-- /.form-group -->

                                </div>

                                <div class="form-footer">
                                    <div class="col-sm-offset-3">
                                        <button type="submit" class="btn btn-theme">Save Invoice</button>
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
        window.owner_filter_url = '{{ route('filter.owner.lots') }}'
    </script>
    <script src="{{ url('/js/invoices/invoice.js') }}"></script>
@endsection

