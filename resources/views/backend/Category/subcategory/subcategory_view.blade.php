@extends('backend.master')


@section('content')

<div class="content-wrapper" style="min-height: 1203.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <button><a href="{{ url('add-subcategory') }}">Add More SubCategory</a></button>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
                </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Categories List </h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ url('all-subcategory-delete') }}" method="POST">
                  @csrf
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th><input type="checkbox" id="CheckAll">All</th>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Parents Category</th>
                      <th>Slug</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @foreach ( $subcats as $key => $cat )
                    <tr>
                      <td><input type="checkbox" name="scat_id[]" value="{{ $cat->id }}"></td>
                      <td>{{ $subcats->firstItem() + $key }}</td>
                      <td>{{ $cat->subcategory_name }}</td>
                      <td>{{ $cat->category->category_name}}</td>
                      <td>{{ $cat->slug }}</td>
                      <td>{{ $cat->created_at->format('d - m - Y . h:i :s  a')}}  ({{ $cat->created_at->diffforHumans() }})</td>
                      <td>{{ $cat->updated_at->format('d - m - Y . h:i :s  a')}}  ({{ $cat->created_at->diffforHumans() }})</td>
                      <td class="text-center">
                          <a  class="btn btn-success" href="{{ url('sub-category-edit')}}/ {{ $cat->id }}">Edit</a>
                          <a  class="btn btn-danger" href="{{ url('sub-delete-category')}}/ {{ $cat->id }}">Delete</a>
                      </td>
                     
                    </tr>              
                   @endforeach
                   
                  </tbody>
                  
                </table>
                


                <div class="text-center">
                  <input type="submit" value="submit" class="btn btn-primary">
                </div>
              </form> 

              </div>
             
              
              <!-- /.card-body -->
              {{ $subcats->links() }}
              {{-- <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
            </div> --}}
            <!-- /.card -->


          </div>
          
          <!-- /.col -->
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    
@endsection

@section('footer_js')
    <script> 
   @if (session('success'))
     

Command: toastr["success"]("{{ session('success') }}")

@endif
toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
 $('#checkAll').click(function(){
      $('input:checkbox').not(this).prop('checked', this.checked);
 });
 
    </script>
@endsection
<th>
  <button class="btn btn-danger" type="submit">Delete</button>
  <input type="checkbox" id="checkAll">
</th>
