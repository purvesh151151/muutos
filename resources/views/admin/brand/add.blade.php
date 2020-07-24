@extends('layouts.admin')
@section('pagetitle')
<h3 class="m-0 text-dark">{{ __('messages.brand.add') }}</h3>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card ">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.brand.store') }}"  enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">{{ __('messages.brand.name') }}<span class='required'>*</span></label>
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" maxlength="100" placeholder="Enter Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">{{ __('messages.brand.image') }}</label>
                                    <input type="file" value="{{ old('brandlogo') }}" name="brandlogo" class="form-control">
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
        </div>
    </div>
</div>
@endsection