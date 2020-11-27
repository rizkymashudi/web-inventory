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
                <li class="breadcrumb-item active">Incoming Stock</li>
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
                  <h3 class="card-title"><b>Incoming Stock</b></h3>
                  <button href="#" class="btn btn-sm btn-success text-decoration-none float-right" type="button" data-toggle="modal" data-target="#createDataStock">Create new stock</button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Item Code</th>
                            <th>Item Name</th>
                            <th>Unit</th>
                            <th>Quantity</th>
                            <th>Date created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($items as $itm)
                      <tr>
                        <td>{{ $itm->id_transaksi }}</td>
                        <td>{{ $itm->kode_barang }}</td>
                        <td>{{ $itm->nama_barang }}</td>
                        <td>{{ $itm->satuan }}</td>
                        <td>{{ $itm->jumlah }}</td>
                        <td>{{ $itm->tanggal }}</td>
                        <td>
                            <div class="d-flex flex-nowrap justify-content-center">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateDataStock{{ $itm->id_transaksi }}"><i class="far fa-edit"></i></button>&nbsp;
                                <button type="submit" class="btn btn-danger" id="delete" data-toggle="modal" data-target="#deleteDataStock{{ $itm->id_transaksi}}"><i class="far fa-trash-alt"></i></button>&nbsp;
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#OutcomeStock{{ $itm->id_transaksi }}"><i class="fas fa-sign-out-alt"></i></button> 
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
    

      {{-- MODAL CREATE NEW STOCK --}}
      <div class="modal fade" id="createDataStock" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Create new stock</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </div>

            <div class="card" style="margin: 10px;">
                <div class="card-header">
                    <h4>form input data</h4>
                </div>
                <div class="card-body">
                  <form method="post" action="{{ route('CreateIncomingStock') }}" enctype="multipart/form-data" name="newStock">
                        @csrf
                        <div class="modal-body">
                          <div class="form-group">
                              <label for="TID">Transaction ID</label>
                              <input type="text" class="form-control form-control-sm" id="transactionID" name="TransactionID" value="WI-<?=date('Y');?><?=random_string('numeric', 8)?>" readonly>
                          </div>
                          <div class="form-group">
                              <label for="date">Choose date</label>
                              <input type="date" class="form-control form-control-sm" id="pickDate" name="Date">
                          </div>
                          <div class="form-group">
                              <label for="Code">Code</label>
                              <input type="text" class="form-control form-control-sm" id="CodeBarang" placeholder="Code" name="ItemCode">
                          </div>
                          <div class="form-group">
                              <label for="Nama">Name</label>
                              <input type="text" class="form-control form-control-sm" id="StockName" placeholder="Name" name="ItemName">
                          </div>
                          <div class="form-group">
                              <label for="unitID">Choose unit</label>
                              <select class="form-control form-control-sm" style="width: 100%;" required name="unit"> 
                                <option selected disabled value="">Choose...</option>
                                @foreach ($Unit as $unt)
                                  <option value="{{ $unt->kode_satuan}}">{{ $unt->kode_satuan }}</option>  
                                @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="Qty">Quantity</label>
                              <input type="number" class="form-control form-control-sm" id="qty" placeholder="Input Qty" name="Stockquantity" min="0">
                          </div>
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;Simpan</button>
                              <button type="submit" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i>&nbsp;Batal</button>
                          </div>
                        </div> 
                    </form> 
                </div>
            </div>
             
          </div>
        </div>
      </div>


      {{-- MODAL UPDATE STOCK --}}
      @foreach ($items as $itm)
      <div class="modal fade" id="updateDataStock{{ $itm->id_transaksi }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Update data stock</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </div>

            <div class="card" style="margin: 10px;">
                <div class="card-header">
                    <h4>form input data</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('UpdateIncomingStock') }}" enctype="multipart/form-data" name="updateStock">
                        @csrf
                        <div class="modal-body">
                          <div class="form-group">
                              <label for="TID">Transaction ID</label>
                              <input type="text" class="form-control form-control-sm" id="transactionID" name="TransactionID" value="{{ $itm->id_transaksi }}" readonly>
                          </div>
                          <div class="form-group">
                              <label for="date">Choose date</label>
                              <input type="date" class="form-control form-control-sm" id="pickDate" name="Date" value="{{ $itm->tanggal }}" readonly>
                          </div>
                          <div class="form-group">
                              <label for="Code">Code</label>
                              <input type="text" class="form-control form-control-sm" id="CodeBarang" placeholder="Code" name="ItemCode" value="{{ $itm->kode_barang }}">
                          </div>
                          <div class="form-group">
                              <label for="Nama">Name</label>
                              <input type="text" class="form-control form-control-sm" id="StockName" placeholder="Name" name="ItemName" value="{{ $itm->nama_barang }}">
                          </div>
                          <div class="form-group">
                              <label for="unitID">Choose unit</label>
                              <select class="form-control form-control-sm" style="width: 100%;" name="unit"> 
                                <option selected value="{{ $itm->satuan }}">{{ $itm->satuan }}</option>
                                @foreach ($Unit as $unt)
                                  <option value="{{ $unt->kode_satuan}}">{{ $unt->kode_satuan }}</option>  
                                @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="Qty">Quantity</label>
                              <input type="number" class="form-control form-control-sm" id="qty" placeholder="Input Qty" name="Stockquantity" min="0" value="{{ $itm->jumlah }}">
                          </div>
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;Simpan</button>
                              <button type="submit" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i>&nbsp;Batal</button>
                          </div>
                        </div> 
                    </form> 
                </div>
            </div>
             
          </div>
        </div>
      </div>    
      @endforeach
      

      {{-- MODAL DELETE STOCK --}}
      @foreach ($items as $itm)
      <div class="modal fade" id="deleteDataStock{{ $itm->id_transaksi }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Delete stock</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('DeleteIncomingStock') }}" method="POST">
              @method('delete')
              @csrf
              <div class="modal-body">
                Are you sure want to delete Transaction ID {{ $itm->id_transaksi }}?
                <input type="hidden" name="TransactionID" value="{{ $itm->id_transaksi }}">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      @endforeach
      


      {{-- MODAL OUTCOME STOCK --}}
      @foreach ($items as $itm)
      <div class="modal fade" id="OutcomeStock{{ $itm->id_transaksi }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Update data Outcoming stock</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </div>

            <div class="card" style="margin: 10px;">
                <div class="card-header">
                    <h4>form input data</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('InsertOutcomingStock') }}"  enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                          <div class="form-group">
                              <label for="TID">Transaction ID</label>
                              <input type="text" class="form-control form-control-sm" name="TransactionID" value="{{ $itm->id_transaksi }}" readonly>
                          </div>
                          <div class="form-group">
                              <label for="date">Incoming date</label>
                              <input type="date" class="form-control form-control-sm" name="inComingDate" value="{{ $itm->tanggal }}" readonly>
                          </div>
                          <div class="form-group">
                            <label for="date">Outcoming date</label>
                            <input type="date" class="form-control form-control-sm" name="outcomingDate">
                        </div>
                          <div class="form-group">
                              <label for="Code">Code</label>
                              <input type="text" class="form-control form-control-sm" name="ItemCode" value="{{ $itm->kode_barang }}" readonly>
                          </div>
                          <div class="form-group">
                              <label for="Nama">Name</label>
                              <input type="text" class="form-control form-control-sm" name="ItemName" value="{{ $itm->nama_barang }}" readonly>
                          </div>
                          <div class="form-group">
                              <label for="unitID">Choose unit</label>
                              <input type="text" class="form-control form-control-sm" name="unit" value="{{ $itm->satuan }}" readonly>
                          </div>
                          <div class="form-group">
                              <label for="Qty">Quantity</label>
                              <input type="number" class="form-control form-control-sm" name="Stockquantity" min="0" value="{{ $itm->jumlah }}">
                          </div>
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;Simpan</button>
                              <button type="button    " class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i>&nbsp;Batal</button>
                          </div>
                        </div> 
                    </form> 
                </div>
            </div>
             
          </div>
        </div>
      </div>   
      @endforeach
     


      <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );

        
      </script>
@endsection