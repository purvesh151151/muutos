@extends('layouts.admin')
@section('pagetitle')
<h3 class="m-0 text-dark">{{ __('messages.user.change_password') }}</h3>
@endsection
@section('content')
<style type="text/css">
    .changepassword{
        margin: 50px 0;
        padding: 80px 0;  
    }
</style>
<!-- general form elements -->
<div class="box box-primary">
    <!-- /.box-header -->
    <!-- form start -->
    <div class="box-body changepassword">
        <div class="col-md-6 col-md-offset-3">
            <form class="sortserach" id="changepassword" action="{{ route('admin.user.changepassword.success') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <input type="password" class="form-control" name="oldpassword"  maxlength="100"  placeholder="Old Password">
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <input type="password" class="form-control" name="newpassword"  maxlength="100" placeholder="New Password">
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <input type="password" class="form-control" name="confirmpassword"  maxlength="100" placeholder="Confirm Password">
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <button type="submit" class="btn btn-warning  pull-right">Submit</button>
            </div>
          </form>
        </div>
    </div>
</div>
<!-- /.box -->
@endsection