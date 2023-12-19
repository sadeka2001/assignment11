<!-- Content Wrapper. Contains page content -->
@extends('backend.master')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sale product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Sale product</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"><a href="{{ route('product.index') }}"><i class="nav-icon fas fa-arrow-left"></i> Product list</a></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('product.sale.update',$products->id) }}" method="post">
              @csrf
              @method('post')
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Product Name</label>
                  <input disabled type="name" class="form-control" name="name" id="name" value="{{ $products->name }}" >
                </div>
                <div class="form-group">
                  <label for="price">Product Price</label>
                  <input disabled type="price" class="form-control" name="price" id="price" value="{{ $products->price }}">
                </div>
                <div class="form-group">
                  <label for="quantity">Product Quantity</label>
                  <input type="quantity" class="form-control" name="quantity" id="quantity" value="1">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Place order</button>
              </div>
            </form>
          </div>


        </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
{{-- <script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script> --}}
<!-- Page specific script -->
<script>
$(function () {
bsCustomFileInput.init();
});
</script>


@endsection
