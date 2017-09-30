<form class="form-horizontal form-bordered" action="{{route('owner.company.update')}}"
      role="form" id="sample-validation-2" method="post">

    <div class="form-body">
        <div class="form-group form-group-divider">
            <div class="form-inner">
                <h4 class="no-margin"><span
                            class="label label-success label-circle">1</span> Company Information</h4>
            </div>
        </div>
        {{ csrf_field() }}

        <input type="hidden" name="owner_id" value="{{ $owner->owner_id or 'null' }}">

        <input type="hidden" name="company_id" value="{{ $company->comp_id }}">

        <div class="form-group">
            <label class="col-sm-3 control-label">Company Name <span
                        class="asterisk"></span></label>
            <div class="col-sm-7">
                <input name="comp_name" type="text" class="form-control input-sm" value="{{$company->comp_name}}">

            </div>
        </div><!-- /.form-group -->

        <div class="form-group">
            <label class="col-sm-3 control-label">Company Address</label>
            <div class="col-sm-7">
                <textarea name="comp_address" class="form-control input-sm">{{ $company->comp_address }}</textarea>
            </div>
        </div><!-- /.form-group -->

        <div class="form-group">
            <label class="col-sm-3 control-label">Company Registration Number</label>
            <div class="col-sm-7">
                <input name="comp_reg_no" type="text" class="form-control input-sm" value="{{$company->comp_reg_no}}">

            </div>
        </div><!-- /.form-group -->

        <div class="form-group">
            <label class="col-sm-3 control-label">Company Telephone No.</label>
            <div class="col-sm-7">
                <input name="comp_telephone_no" type="text" class="form-control input-sm" value="{{$company->comp_telephone_no}}">

            </div>
        </div><!-- /.form-group -->

        <div class="form-group">
            <label class="col-sm-3 control-label">Company Fax No.</label>
            <div class="col-sm-7">
                <input name="comp_fax_no" type="text" class="form-control input-sm" value="{{$company->comp_fax_no}}">

            </div>
        </div><!-- /.form-group -->

        <div class="form-group">
            <label class="col-sm-3 control-label">Contact Person</label>
            <div class="col-sm-7">
                <input name="comp_contact_person" type="text" class="form-control input-sm" value="{{$company->comp_contact_person}}">

            </div>
        </div><!-- /.form-group -->

        <div class="form-group">
            <label class="col-sm-3 control-label">Contact</label>
            <div class="col-sm-7">
                <input name="comp_contact_no" type="text" class="form-control input-sm" value="{{$company->comp_contact_no}}">
            </div>
        </div>
    </div>

    <div class="form-footer">
        <div class="col-sm-offset-3">
            <button type="submit" class="btn btn-theme">Update Company</button>
        </div>
    </div>

</form>