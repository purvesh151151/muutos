@extends('layouts.admin')
@section('pagetitle')
<h3 class="m-0 text-dark">{{ __('messages.vendor.manage') }}</h3>
@endsection
@section('breadcrum')
<div class="col-md-12 clearfix text-right">
  @can('vendor-create')
  <a href="{{route('admin.vendor.add')}}" >
    <label><button class="btn btn-primary add">{{ __('messages.vendor.add') }}</button></label>
  </a>
  @endcan
</div>
@endsection
@section('content')
<div class="box box-primary">
  <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="pagedatatable" class="table table-bordered table-striped" style="width: 100%;">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>{{ __('messages.vendor.profile') }}</th>
                  <th>{{ __('messages.vendor.firstname') }}</th>
                  <th>{{ __('messages.vendor.email') }}</th>
                  <th>{{ __('messages.vendor.mobile') }}</th>
                  <th>{{ __('messages.vendor.city') }}</th>
                  <th>{{ __('messages.activate') }}</th>
                  <th>{{ __('messages.action') }}</th>
                  <th>{{ __('messages.vendor.lastname') }}</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
  </div>
</div>
<script>
  $(function () {
    var doctordatatable = $('#pagedatatable').DataTable({
      responsive: true,
      // dom: 'Bfrtip',
      "processing": true,
      "ajax": "{{ route('admin.vendor.array') }}",
      "language": {
        "emptyTable": "No vendor available"
      },
      "order": [[0, "desc"]],
    });
    doctordatatable.columns([0,8,9]).visible(false, false);
  });
</script>
@endsection
