@extends('admin.adminlayout')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
  <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>الرقم</th>
            <th>العنوان</th>
            <th>Office</th>
          </tr>
        </thead>

      </table>
    </div>
  </div>
</div>

@stop
@push('scripts')
<script>
$(document).ready( function () {
  $('#dataTable').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{{ route('posts.getdata') }}',
      columns: [
          { "data": 'id'},
          { "data": 'title'},
      ]
  });
});
</script>
@endpush
