
  @extends('backend.master')
  @section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Sale transactions</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Sale transactions</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"><a href="{{ route('product.index') }}"><i class="nav-icon fas fa-arrow-left"></i>  Product list</a></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Sales Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($sales as $key=>$product)
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td> {{ $product->product->name }}</td>
                        <td>
                          {{ $product->quantity }}
                        </td>
                        <td>{{ $product->total_price }}</td>
                        <td>{{ $product->created_at->format('d M, Y') }} </td>

                      </tr>
                      @empty
                      @endforelse
                      </tbody>
                  </table>
                </div>

              </div>

            </div>

          </div>

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
  {{-- <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script> --}}
  @endsection
