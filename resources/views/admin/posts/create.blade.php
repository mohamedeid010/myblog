@extends('admin.adminlayout')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">اضافة موضوع</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">اضافة موضوع</h6>
  </div>
  <div class="card-body">
      <form>
          <div class="form-group">
            <label for="exampleFormControlInput1">العنوان</label>
            <input type="text" class="form-control" id="posttitle" placeholder="ادخل عنوان المقال" name="title">
          </div>

          <div class="form-group">
            <label for="exampleFormControlFile1">صورة الموضوع</label>
            <input type="file" class="form-control-file" id="postfile" name="image">
          </div>

          <div class="form-group">
            <label for="content">المحتوي</label>
            <textarea class="form-control" id="postcontent" rows="3" name="content"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
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
