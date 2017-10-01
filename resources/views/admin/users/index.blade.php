@extends('admin.layouts.base')

@section('title')
    List Users
    @parent
@stop

@section('header_styles')
    <link href="{{ asset('/css/modal_center.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <section id="page-content">
        <div class="header-content">
            <h2><i class="fa fa-home"></i>Admin Dashboard <span>Users</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">List Users</li>
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
                                <h3 class="panel-title">List Users</h3>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('users.create') }}" class="btn btn-md btn-info"
                                   data-toggle="tooltip" data-placement="top" data-title="Add User"
                                   data-original-title="Add User" title="Add User"><i class="fa fa-plus"></i>
                                    &nbsp;Add User</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive col-xs-12">
                                <table id="users-table" class="table table-striped table-theme">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ ucwords($user->name) }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{!! $user->label_role !!}</td>
                                            <td>{!! $user->label_status !!}</td>
                                            <td class="text-center">
                                                <a href="{{ route('users.edit', $user) }}"
                                                   class="btn btn-primary btn-xs rounded"
                                                   data-toggle="tooltip" data-placement="top"
                                                   data-original-title="Edit"><i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger btn-xs rounded delete-user"
                                                   data-toggle="tooltip" data-placement="top"
                                                   data-original-title="Delete"
                                                   data-user-id="{{ $user->id }}"
                                                   data-url="{{ route('users.destroy', $user->id) }}">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- /.panel -->
                </div>
            </div>
        </div>

        @include('admin.layouts.pagefooter')

    </section>

    <!-- Modal -->
    <div id="delete-user-modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-danger">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p class="modal_message"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="javascript:void(0);" class="btn btn-danger" id="delete-user">Delete</a>
                </div>
            </div>
        </div><!-- /.modal-dialog -->
    </div>

@endsection

@section('footer_scripts')
    <script>
        $(document).ready(function () {

            $(document).on("click", ".delete-user", function (event) {
                $('#delete-user').attr('data-url', $(this).attr('data-url'));

                var user_id = $(this).attr('data-user-id');
                var auth_id = '{{ auth()->user()->id }}';
                $('.modal-title').html('User ID: ' + user_id);

                if (user_id === auth_id) {
                    $('.modal_message').text("Sorry! Can't delete logged in user.");
                    $('#delete-user').addClass('hidden');
                } else {
                    $('.modal_message').text("Are you sure! you want to delete this User ?");
                    $('#delete-user').removeClass('hidden');
                }

                $('#delete-user-modal').modal();
            });

            $(document).on("click", "#delete-user", function (event) {
                event.preventDefault();
                var button = $(this);
                $.ajax({
                    type: "DELETE",
                    cache: false,
                    headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
                    url: button.attr('data-url'),
                    beforeSend: function () {
                        button.attr('disabled', true);
                    },
                    success: function (json) {
                        if (json.status == 'success') {
                            $(button).html('<i class="fa fa-check"></i> ' + json.message).attr('disabled', 'disabled');
                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        } else if (json.status == 'error') {
                            $(button).html('<i class="fa fa-check"></i> ' + json.message).attr('disabled', 'disabled');
                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        }
                    },
                    error: function (json) {
                        location.reload();
                    },
                    dataType: "json"
                });
            });

            $('#users-table').DataTable();
        });
    </script>
@endsection

