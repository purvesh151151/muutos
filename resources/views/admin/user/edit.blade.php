@extends('layouts.admin')
@section('pagetitle')
<h3 class="m-0 text-dark">{{ __('messages.user.edit') }}</h3>
@endsection
@section('content')
<!-- general form elements -->
<div class="box box-primary">
    <!-- /.box-header -->
    <!-- form start -->
    <form method="POST" action="{{ route('admin.user.update',$usersdata->id) }}"  enctype="multipart/form-data">
    @csrf
    @method('PATCH')
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">{{ __('messages.user.firstname') }}<span class='required'>*</span></label>
                        <input type="text" value="{{ $usersdata->name }}" name="name" class="form-control" maxlength="100" placeholder="Enter Name" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">{{ __('messages.user.lastname') }}<span class='required'>*</span></label>
                        <input type="text" value="{{ $usersdata->lastname }}" name="lastname" class="form-control" maxlength="100" placeholder="Enter last Name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">{{ __('messages.user.email') }}<span class='required'>*</span></label>
                        <input type="email" value="{{ $usersdata->email }}" name="email" class="form-control" maxlength="100" placeholder="Enter Email" required readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">{{ __('messages.user.mobile') }}<span class='required'>*</span></label>
                        <input type="text" value="{{ $usersdata->mobile }}" name="mobile" class="form-control onlynumbervalid" maxlength="15" placeholder="Enter Phone" required readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">{{ __('messages.user.address') }}<span class='required'>*</span></label>
                        <input type="text" value="{{ $usersdata->address }}" name="address" class="form-control" maxlength="200" placeholder="Enter address" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">{{ __('messages.user.city') }}<span class='required'>*</span></label>
                        <input type="text" value="{{ $usersdata->city }}" name="city" class="form-control" maxlength="200" placeholder="Enter City" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">{{ __('messages.user.profile') }}</label>
                        <input type="file" name="profileimage" class="form-control" placeholder="Enter Profile image">
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