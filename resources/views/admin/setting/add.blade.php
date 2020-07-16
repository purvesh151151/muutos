@extends('layouts.admin')
@section('pagetitle')
<h3 class="m-0 text-dark">Add Setting</h3>
@endsection
@section('content')
<!-- general form elements -->
<div class="box box-primary">
    <!-- /.box-header -->
    <!-- form start -->
    <form method="POST" action="{{ route('admin.setting.store') }}"  enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Admin Email<span class='required'>*</span></label>
                        <input type="email" value="{{ old('adminemail') }}" name="adminemail" class="form-control" maxlength="100" placeholder="Enter Admin Email" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Support Email<span class='required'>*</span></label>
                        <input type="email" value="{{ old('supportemail') }}" name="supportemail" class="form-control" maxlength="100" placeholder="Enter Support Email" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Smtp Driver<span class='required'>*</span></label>
                        <input type="text" value="{{ old('smtpdriver') }}" name="smtpdriver" class="form-control" maxlength="100" placeholder="Enter Smtp Driver" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Smtp Host<span class='required'>*</span></label>
                        <input type="text" value="{{ old('smtphost') }}" name="smtphost" class="form-control" maxlength="100" placeholder="Enter Title" required>
                    </div>
                </div>
            </div>
           
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Smtp Port<span class='required'>*</span></label>
                        <input type="text" value="{{ old('smtpport') }}" name="smtpport" class="form-control" maxlength="100" placeholder="Enter Title" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Smtp Username<span class='required'>*</span></label>
                        <input type="text" value="{{ old('smtpusername') }}" name="smtpusername" class="form-control" maxlength="100" placeholder="Enter Title" required>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Smtp Password<span class='required'>*</span></label>
                        <input type="text" value="{{ old('smtppassword') }}" name="smtppassword" class="form-control" maxlength="100" placeholder="Enter Title" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Smtp Encrption<span class='required'>*</span></label>
                        <input type="text" value="{{ old('smtpencrption') }}" name="smtpencrption" class="form-control" maxlength="100" placeholder="Enter Title" required>
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