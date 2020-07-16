@extends('layouts.admin')
@section('pagetitle')
<h3 class="m-0 text-dark">{{ __('messages.setting.edit_setting') }}</h3>
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
                <div class="col-md-12">
                  <!-- Custom Tabs -->
                  <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">{{ __('messages.setting.general') }}</a></li>
                        <li><a href="#tab_2" data-toggle="tab">{{ __('messages.setting.smtp') }}</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">{{ __('messages.setting.admin_email') }}<span class='required'>*</span></label>
                                        <input type="email" value="{{ $settingdata->adminemail }}" name="adminemail" class="form-control" maxlength="100" placeholder="Enter Admin Email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">{{ __('messages.setting.support_email') }}<span class='required'>*</span></label>
                                        <input type="email" value="{{ $settingdata->supportemail }}" name="supportemail" class="form-control" maxlength="100" placeholder="Enter Support Email" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">{{ __('messages.setting.smtp_driver') }}<span class='required'>*</span></label>
                                        <input type="text" value="{{ $settingdata->smtpdriver }}" name="smtpdriver" class="form-control" maxlength="100" placeholder="Enter Smtp Driver" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">{{ __('messages.setting.smtp_host') }}<span class='required'>*</span></label>
                                        <input type="text" value="{{ $settingdata->smtphost }}" name="smtphost" class="form-control" maxlength="100" placeholder="Enter Title" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">{{ __('messages.setting.smtp_port') }}<span class='required'>*</span></label>
                                        <input type="text" value="{{ $settingdata->smtpport }}" name="smtpport" class="form-control onlynumbervalid" maxlength="100" placeholder="Enter Title" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">{{ __('messages.setting.smtp_user') }}<span class='required'>*</span></label>
                                        <input type="text" value="{{ $settingdata->smtpusername }}" name="smtpusername" class="form-control" maxlength="100" placeholder="Enter Title" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">{{ __('messages.setting.smtp_password') }}<span class='required'>*</span></label>
                                        <input type="text" value="{{ $settingdata->smtppassword }}" name="smtppassword" class="form-control" maxlength="100" placeholder="Enter Title" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">{{ __('messages.setting.smtp_encryption') }}<span class='required'>*</span></label>
                                        <input type="text" value="{{ $settingdata->smtpencrption }}" name="smtpencrption" class="form-control" maxlength="100" placeholder="Enter Title" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>
            <!-- /.col -->
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