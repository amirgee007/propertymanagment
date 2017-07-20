@extends('admin.layouts.base')

@section('title')
    Main
    @parent
@stop
@section('content')

    <!-- START @PAGE CONTENT -->
    <section id="page-content">
        <!-- Start page header -->
        <div class="header-content">
            <h2><i class="fa fa-home"></i>Projects Dashboard <span>dashboard & statistics</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div><!-- /.header-content -->
        <!--/ End page header -->


        <!-- Start body content -->
        <div class="body-content animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel rounded shadow">
                        <div class="panel-body no-padding">
                            <form class="form-horizontal form-bordered" action="{{route('post.owner.store')}}" role="form" id="sample-validation-2" method="post">
                                <div class="form-body">
                                    <div class="form-group form-group-divider">
                                        <div class="form-inner">
                                            <h4 class="no-margin"><span
                                                        class="label label-success label-circle">1</span> General
                                                Information</h4>
                                        </div>
                                    </div><!-- /.form-group -->
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Owner Type <span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="sv2_state">
                                                <option value="">Choose type:</option>
                                                <option value="a">A</option>
                                                <option value="b">B</option>
                                                <option value="c">C</option>
                                            </select>
                                            <label for="sv2_state" class="error"></label>
                                            <input type="text" class="hide" id="sv2_state"/>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Identity Card No. <span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" name="sv2_company_name">
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Owner Name <span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" name="sv2_company_name">
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Date of Birth <span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="date" class="form-control input-sm" name="sv2_company_name">
                                        </div>
                                    </div><!-- /.form-group -->


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Gender<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="sv2_state">
                                                <option value="">Choose Gender:</option>
                                                <option value="m">M</option>
                                                <option value="f">F</option>
                                            </select>
                                            <label for="sv2_state" class="error"></label>
                                            <input type="text" class="hide" id="sv2_state"/>
                                        </div>
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Owner Address</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm">
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Phone 1<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" name="sv2_phone">
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Phone 2<span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" name="sv2_phone">
                                        </div>
                                    </div><!-- /.form-group -->






                                    <div class="form-group form-group-divider">
                                        <div class="form-inner">
                                            <h4 class="no-margin"><span class="label label-danger label-circle">3</span>
                                                Company Information</h4>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Company Name <span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" name="sv2_company_name">
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Company Address</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm">
                                        </div>
                                    </div><!-- /.form-group -->


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Company Registration Number</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" value="">
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Company Telephone No. <span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" name="sv2_phone">
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Company Fax No.</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm">
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Contact Person <span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" name="sv2_phone">
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Contact <span
                                                    class="asterisk">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" name="sv2_phone">
                                        </div>
                                    </div><!-- /.form-group -->





                                </div><!-- /.form-body -->
                                <div class="form-footer">
                                    <div class="col-sm-offset-3">
                                        <button type="submit" class="btn btn-theme">Save</button>
                                    </div>
                                </div><!-- /.form-footer -->
                            </form>

                        </div><!-- /.panel-body -->
                    </div><!-- /.panel -->
                    <!--/ End sample validation 2 -->


                </div>
            </div><!-- /.row -->

        </div><!-- /.body-content -->
        <!--/ End body content -->


        <!-- Start footer content -->
        <footer class="footer-content">
            2014 - <span id="copyright-year"></span> &copy; Blankon Admin. Created by <a href="http://djavaui.com/"
                                                                                         target="_blank">Djava UI</a>,
            Yogyakarta ID
            <span class="pull-right">0.01 GB(0%) of 15 GB used</span>
        </footer><!-- /.footer-content -->
        <!--/ End footer content -->

    </section><!-- /#page-content -->
    <!--/ END PAGE CONTENT -->




@endsection

@section('footer_scripts')

@endsection

