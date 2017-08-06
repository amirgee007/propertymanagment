<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
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
                                    <th>Photo</th>
                                    <th class="text-center" style="width: 12%;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($lotTypes as $lotType)
                                    <tr>
                                        <td class="text-center border-right">{{$lotType->lot_type_id ?? ''}}</td>
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
                                        <td><img src="{{url('/')}}/admin/images/user.png" alt="admin"></td>
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
    </body>
</html>
