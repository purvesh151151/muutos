@extends('layouts.admin')
@section('pagetitle')
<h3 class="m-0 text-dark">{{ __('messages.setting.manage') }}</h3>
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
                <th>{{ __('messages.setting.admin_email') }}</th>
                <th>{{ __('messages.setting.support_email') }}</th>
                <th>{{ __('messages.setting.smtp_driver') }}</th>
                <th>{{ __('messages.setting.smtp_user') }}</th>
                <th>{{ __('messages.setting.smtp_host') }}</th>
                <th>{{ __('messages.setting.smtp_port') }}</th>
                <th>{{ __('messages.setting.smtp_encryption') }}</th>
                {{-- <th>Activate</th> --}}
                @can('setting-edit')
                <th>{{ __('messages.action') }}</th>
                @endcan
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
      responsive: true,
      "processing": true,
      "ajax": "{{ route('admin.setting.array') }}",
      "language": {
        "emptyTable": "No setting Available"
      },
      "order": [[0, "desc"]],
    });
    doctordatatable.columns([0]).visible(false, false);
  });
</script>
@endsection
