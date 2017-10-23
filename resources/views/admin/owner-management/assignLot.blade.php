@extends('admin.layouts.base')

@section('title')
    Assign Lot to Owner
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
                    <li class="active">Assign Lot</li>
                </ol>
            </div>
        </div>

        @include('flash::message')
        <div class="body-content animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel rounded shadow">
                        <div class="panel-body no-padding">
                            <form class="form-horizontal form-bordered" action="{{route('post.owner.assign.lot')}}"
                                  role="form" id="owner-assign-lot" method="post">
                                <div class="form-body">
                                    <div class="form-group form-group-divider">
                                        <div class="form-inner">
                                            <h4 class="no-margin"><span
                                                        class="label label-success label-circle">1</span> General
                                                Information of Lot Assign</h4>
                                        </div>
                                    </div>
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Owner</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="lot_owner_id" required>
                                                <option value="">Choose Owner</option>
                                                @foreach($owners as $owner)
                                                    <option value="{{$owner->owner_id}}">{{$owner->owner_name}}</option>
                                                @endforeach
                                            </select>
                                            <label for="sv2_state" class="error"></label>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Lot Type<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="lot_type_id" required id="lot_type_id">
                                                <option value="">Choose Lot Type</option>
                                                @foreach($lotsTypes as $lot)
                                                    <option value="{{$lot->lot_type_id}}">{{$lot->lot_type_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Lot Number<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">

                                            <select class="form-control" name="lot_id[]" multiple id="lot_id" disabled>
                                                <option value="">Choose Lot</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-footer">
                                        <div class="col-sm-offset-3">
                                            <button type="submit" class="btn btn-theme">Assign Lot</button>
                                            <a type="button" href="{{route('owner.list.assign.lot')}}"
                                               class="btn btn-warning">See All Assigned</a>

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
    <!-- START @PAGE LEVEL PLUGINS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script>

        $(document).ready(function () {
            $("#lot_type_id").on('change', function () {
                $("#lot_id").prop('disabled', true);
                var type_id = $(this).val();
                var id_String = 'id=' + type_id;
                $('#lot_id').empty();
                $.ajax({
                    type: "GET",
                    url: '{{url("/dashboard/owner/assign-lot/ajaxCall")}}',
                    data: id_String,
                    cache: false,
                    success: function (data) {
                        $("#lot_id").prop('disabled', false);

                        $.each(data, function (key, value) {
                            $("#lot_id")
                                .append($("<option></option>")
                                    .attr("value", key)
                                    .text(value));
                        });
                    }
                });
            });
            {{--$('#owner-assign-lot').on('submit', function (e) {--}}
                {{--e.preventDefault();--}}
                {{--form = $(this);--}}
                {{--var action = form.attr('action');--}}
                {{--$.ajax({--}}
                    {{--url: action,--}}
                    {{--data: form.serialize(),--}}
                    {{--headers: {'X-XSRF-TOKEN': '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}'},--}}
                    {{--error: function () {--}}

                    {{--},--}}
                    {{--success: function (response) {--}}
                        {{--if (response.status == 'saved') {--}}
                            {{--toastr.success("Lot Assigned to Owner", "Asign Lot");--}}
                            {{--window.location.reload(); //jquery--}}

                        {{--} else {--}}
                            {{--toastr.error("Some Thing went wrong", "Not Saved");--}}
                        {{--}--}}
                    {{--},--}}

                    {{--type: 'POST'--}}
                {{--});--}}

            {{--});--}}


        });

        $('select').select2();
        $('#lot_id').select2();

    </script>

@endsection

