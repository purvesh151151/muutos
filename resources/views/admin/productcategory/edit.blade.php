@extends('layouts.admin')
@section('pagetitle')
<h3 class="m-0 text-dark">{{ __('messages.productcategory.edit') }}</h3>
@endsection
@section('content')
<!-- general form elements -->
<div class="box box-primary">
    <!-- /.box-header -->
    <!-- form start -->
    <form method="POST" action="{{ route('admin.productcategory.update',$productcategorydata->id) }}"  enctype="multipart/form-data">
    @csrf
    @method('PATCH')
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">{{ __('messages.productcategory.name') }}<span class='required'>*</span></label>
                        <input type="text" value="{{ $productcategorydata->name }}" name="name" class="form-control" maxlength="100" placeholder="Enter Name" required="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">{{ __('messages.productcategory.description') }}</label>
                        <textarea name="description" class="form-control" maxlength="100">{{ $productcategorydata->description }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">{{ __('messages.productcategory.categoryimage') }}</label>
                        <input type="file" name="categoryimage" class="form-control">
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