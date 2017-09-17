@extends('admin.layouts.base')

@section('title')
    List Taxes
    @parent
@stop

@section('content')
    <section id="page-content">
        <div class="header-content">
            <h2><i class="fa fa-home"></i>Taxes Dashboard <span>Taxes</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">List Taxes</li>
                </ol>
            </div>
        </div>

        @include('flash::message')

        <div class="body-content animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel rounded shadow no-overflow">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h3 class="panel-title">List Taxes</h3>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('tax-types.create') }}" class="btn btn-md btn-info"
                                   data-toggle="tooltip" data-placement="top" data-title="Add Tax Types"
                                   data-original-title="Add Invoice" title="Add Tax Type"><i class="fa fa-plus"></i>
                                    &nbsp;Add Tax Type</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div class="container">
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-striped table-theme">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Rate %</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($taxTypes as $taxType)
                                            <tr>
                                                <td>{{ $taxType->id }}</td>
                                                <td>{{ ucwords($taxType->name) }}</td>
                                                <td>{{ $taxType->rate }} %</td>
                                                <td>{!! $taxType->label_status !!}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('tax-types.edit', $taxType) }}"
                                                       class="btn btn-primary btn-xs rounded"
                                                       data-toggle="tooltip" data-placement="top"
                                                       data-original-title="Edit"><i class="fa fa-pencil"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center">
                                    {{ $taxTypes->links() }}
                                </div>
                            </div>
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

