@extends('layouts.admin')
@section('pagetitle')
<h3 class="m-0 text-dark">{{ __('messages.brand.manage') }}</h3>
@endsection
@section('breadcrum')
<div class="page-title-right">
  @can('brand-create')
  <a href="{{route('admin.brand.add')}}" >
    <label><button class="btn btn-primary add">{{ __('messages.brand.add') }}</button></label>
  </a>
  @endcan
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">          
        <div class="table-responsive">
          <table id="pagedatatable" class="table table-bordered table-striped" style="width: 100%;">
            <thead>
              <tr>
                <th>ID</th>
                <th>{{ __('messages.brand.image') }}</th>
                <th>{{ __('messages.brand.name') }}</th>
                <th>{{ __('messages.activate') }}</th>
                <th>{{ __('messages.action') }}</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(function () {
    var doctordatatable = $('#pagedatatable').DataTable({
      "processing": true,
      "ajax": "{{ route('admin.brand.array') }}",
      "language": {
        "emptyTable": "No Brand available"
      },
      "order": [[0, "desc"]],
    });
    doctordatatable.columns([0]).visible(false, false);
  });
</script>
@endsection
