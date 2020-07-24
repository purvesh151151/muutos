@extends('layouts.admin')
@section('pagetitle')
<h3 class="m-0 text-dark">{{ __('messages.product.manage') }}</h3>
@endsection
@section('breadcrum')
<div class="page-title-right">
  @can('product-create')
  <a href="{{route('admin.product.add')}}" >
    <label><button class="btn btn-primary add">{{ __('messages.product.add') }}</button></label>
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
                <th>{{ __('messages.product.image') }}</th>
                <th>{{ __('messages.product.name') }}</th>
                <th>{{ __('messages.product.price') }}</th>
                <th>{{ __('messages.product.brand') }}</th>
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
      "ajax": "{{ route('admin.product.array') }}",
      "language": {
        "emptyTable": "No Product available"
      },
      "order": [[0, "desc"]],
    });
    doctordatatable.columns([0]).visible(false, false);
  });
</script>
@endsection
