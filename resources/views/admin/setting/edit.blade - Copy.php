@extends('layouts.admin')
@section('pagetitle')
<h3 class="m-0 text-dark">Edit Setting</h3>
@endsection
@section('content')
<!-- general form elements -->
<div class="box box-primary">
    <!-- /.box-header -->
    <!-- form start -->
    <form method="POST" action="{{ route('admin.setting.update',$settingdata->id) }}"  enctype="multipart/form-data">
    @csrf
    @method('PATCH')
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Admin Email<span class='required'>*</span></label>
                        <input type="email" value="{{ $settingdata->adminemail }}" name="adminemail" class="form-control" maxlength="100" placeholder="Enter Admin Email" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Support Email<span class='required'>*</span></label>
                        <input type="email" value="{{ $settingdata->supportemail }}" name="supportemail" class="form-control" maxlength="100" placeholder="Enter Support Email" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Smtp Driver<span class='required'>*</span></label>
                        <input type="text" value="{{ $settingdata->smtpdriver }}" name="smtpdriver" class="form-control" maxlength="100" placeholder="Enter Smtp Driver" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Smtp Host<span class='required'>*</span></label>
                        <input type="text" value="{{ $settingdata->smtphost }}" name="smtphost" class="form-control" maxlength="100" placeholder="Enter Title" required>
                    </div>
                </div>
            </div>
           
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Smtp Port<span class='required'>*</span></label>
                        <input type="text" value="{{ $settingdata->smtpport }}" name="smtpport" class="form-control onlynumbervalid" maxlength="100" placeholder="Enter Title" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Smtp Username<span class='required'>*</span></label>
                        <input type="text" value="{{ $settingdata->smtpusername }}" name="smtpusername" class="form-control" maxlength="100" placeholder="Enter Title" required>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Smtp Password<span class='required'>*</span></label>
                        <input type="text" value="{{ $settingdata->smtppassword }}" name="smtppassword" class="form-control" maxlength="100" placeholder="Enter Title" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Smtp Encrption<span class='required'>*</span></label>
                        <input type="text" value="{{ $settingdata->smtpencrption }}" name="smtpencrption" class="form-control" maxlength="100" placeholder="Enter Title" required>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Corporate Identity No<span class='required'>*</span></label>
                        <input type="text" value="{{ $settingdata->cino }}" name="cino" class="form-control" maxlength="100" placeholder="Enter Title" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Pan No.<span class='required'>*</span></label>
                        <input type="text" value="{{ $settingdata->panno }}" name="panno" class="form-control" maxlength="100" placeholder="Enter Title" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">GSTN<span class='required'>*</span></label>
                        <input type="text" value="{{ $settingdata->gstn }}" name="gstn" class="form-control" maxlength="100" placeholder="Enter Title" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Service Accounting Code<span class='required'>*</span></label>
                        <input type="text" value="{{ $settingdata->servicecode }}" name="servicecode" class="form-control" maxlength="100" placeholder="Enter Title" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">CGST<span class='required'>*</span></label>
                        <input type="text" value="{{ $settingdata->cgst }}" name="cgst" class="form-control onlynumbervalid" maxlength="100" placeholder="Enter Title" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">SGST<span class='required'>*</span></label>
                        <input type="text" value="{{ $settingdata->sgst }}" name="sgst" class="form-control onlynumbervalid" maxlength="100" placeholder="Enter Title" required>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Bank A/C<span class='required'>*</span></label>
                        <input type="text" value="{{ $settingdata->backaccno }}" name="backaccno" class="form-control onlynumbervalid" maxlength="100" placeholder="Enter Title" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Back Name<span class='required'>*</span></label>
                        <input type="text" value="{{ $settingdata->backname }}" name="backname" class="form-control" maxlength="100" placeholder="Enter Title" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Bank IFSC Code<span class='required'>*</span></label>
                        <input type="text" value="{{ $settingdata->ifsccode }}" name="ifsccode" class="form-control onlynumbervalid" maxlength="100" placeholder="Enter Title" required>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- /.box -->
@endsection