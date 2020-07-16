@extends('layouts.admin')
@section('pagetitle')
<h3 class="m-0 text-dark">{{ __('messages.vendor.add') }}</h3>
@endsection
@section('content')
<!-- general form elements -->
<div class="box box-primary">
    <!-- /.box-header -->
    <!-- form start -->
    <form method="POST" action="{{ route('admin.vendor.store') }}"  enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">{{ __('messages.vendor.firstname') }}<span class='required'>*</span></label>
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control" maxlength="100" placeholder="Enter Name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">{{ __('messages.vendor.lastname') }}<span class='required'>*</span></label>
                        <input type="text" value="{{ old('name') }}" name="lastname" class="form-control" maxlength="100" placeholder="Enter last Name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">{{ __('messages.vendor.company') }}<span class='required'>*</span></label>
                        <input type="text" value="{{ old('company') }}" name="company" class="form-control" maxlength="100" placeholder="Enter company" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">{{ __('messages.vendor.email') }}<span class='required'>*</span></label>
                        <input type="email" value="{{ old('email') }}" name="email" class="form-control" maxlength="100" placeholder="Enter Email" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">{{ __('messages.vendor.mobile') }}<span class='required'>*</span></label>
                        <input type="text" value="{{ old('mobile') }}" name="mobile" class="form-control onlynumbervalid" minlength="10" maxlength="15" placeholder="Enter Phone" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">{{ __('messages.vendor.address') }}<span class='required'>*</span></label>
                        <input type="text" value="{{ old('address') }}" name="address" class="form-control" maxlength="200" placeholder="Enter address" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">{{ __('messages.vendor.city') }}<span class='required'>*</span></label>
                        <input type="text" value="{{ old('city') }}" name="city" class="form-control" maxlength="200" placeholder="Enter City" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">{{ __('messages.vendor.bio') }}</label>
                        <textarea name="bio" class="form-control" maxlength="200" placeholder="Enter Bio">{{ old('bio') }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">{{ __('messages.vendor.profile') }}<span class='required'>*</span></label>
                        <input type="file" value="{{ old('profileimage') }}" name="profileimage" class="form-control" placeholder="Enter Profile image" required>
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