@extends('admin.adminlayout')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">المقالات</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"></h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>الرقم</th>
            <th>العنوان</th>
            <th>التحكم</th>
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
    "language": {
      "search": "ابحث : ",
      "sLengthMenu": "عرض _MENU_ سجلات",
      "info": "عرض _START_ الي _END_ من _TOTAL_ نتيجة",
      "paginate": {
      "previous": "السابق",
      "next":"التالي",
    }
 },
      processing: true,
      serverSide: true,
      ajax: '{{ route('posts.getdata') }}',
      columns: [
          { data: 'id', name:"id"},
          { data: 'title' , name : "title"},
          {data: 'action', name: 'action', orderable: false, searchable: false},
      ]
  });
});
</script>
@endpush
