@extends('index')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><b>Stock</b></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Stock</li>
                <li class="breadcrumb-item active">Outcoming Stock</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title"><b>Outcoming Stock</b></h2>
                <div class="float-right">
                  <a href="{{ route('incomingStock') }}" class="btn btn-sm btn-success text-decoration-none" type="button">Create new outcoming stock</a>&nbsp;
                  <button href="#" class="btn btn-sm btn-warning text-decoration-none" type="button">print manual invoice</button>
                </div>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-striped table-bordered">
                  <thead>
                      <tr>
                          <th>Transaction ID</th>
                          <th>Incoming Date</th>
                          <th>Outcoming Date</th>
                          <th>Item Code</th>
                          <th>Item Name</th>
                          <th>Unit</th>
                          <th>Quantity</th>
                          <th>Invoice</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($OutcomingGoodsData as $Ocgd)
                      <tr>
                        <td>{{ $Ocgd->id_transaksi }}</td>
                        <td>{{ $Ocgd->tanggal_masuk }}</td>
                        <td>{{ $Ocgd->tanggal_keluar }}</td>
                        <td>{{ $Ocgd->kode_barang }}</td>
                        <td>{{ $Ocgd->nama_barang }}</td>
                        <td>{{ $Ocgd->satuan }}</td>
                        <td>{{ $Ocgd->jumlah }}</td>
                        <td>
                          <div class="d-flex flex-nowrap justify-content-center">
                            <a href="{{ route('printReportpdf', $Ocgd->id_transaksi) }}" type="submit" class="btn btn-primary" target="_blank"><i class="far fa-edit"></i></a>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <script>
      $(document).ready(function() {
          $('#example').DataTable();
      } );

      
    </script>
@endsection