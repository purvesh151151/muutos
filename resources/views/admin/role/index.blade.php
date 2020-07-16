@extends('layouts.admin')
@section('pagetitle')
<h3 class="m-0 text-dark">{{ __('messages.role.manage') }}</h3>
@endsection
@section('breadcrum')
<div class="col-md-12 clearfix text-right">
  <a href="{{route('admin.role.add')}}" >
    <label><button class="btn btn-primary add">{{ __('messages.role.add') }}</button></label>
  </a>
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
                  <th>{{ __('messages.role.title') }}</th>
                  <th>{{ __('messages.role.created') }}</th>
                  {{-- <th>Activate</th> --}}
                  <th>{{ __('messages.action') }}</th>
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
      "processing": true,
      "ajax": "{{ route('admin.role.array') }}",
      "language": {
        "emptyTable": "No role available"
      },
      "order": [[0, "desc"]],
    });
    doctordatatable.columns([0]).visible(false, false);
  });
</script>
@endsection
