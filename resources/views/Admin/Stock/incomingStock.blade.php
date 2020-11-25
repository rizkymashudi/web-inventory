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
                        <tr>
                            <td>Trident</td>
                            <td>Internet Explorer 4.0</td>
                            <td>Win 95+</td>
                            <td> 4</td>
                            <td>X</td>
                            <td>234234</td>
                            <td>
                                <div class="d-flex flex-nowrap justify-content-center">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateDataStock"><i class="far fa-edit"></i></button>&nbsp;
                                    <button type="submit" class="btn btn-danger" id="delete" data-toggle="modal" data-target="#deleteDataStock"><i class="far fa-trash-alt"></i></button>&nbsp;
                                    <button class="btn btn-success" data-toggle="modal" data-target="#OutcomeStock"><i class="fas fa-sign-out-alt"></i></button> 
                                </div>
                            </td>
                        </tr>
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
                    <form method="post" action="#" id="formAddNewStock" name="newStock">
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
                              <input type="text" class="form-control form-control-sm" id="CodeBarang" placeholder="Code" name="CodeBarang">
                          </div>
                          <div class="form-group">
                              <label for="Nama">Name</label>
                              <input type="text" class="form-control form-control-sm" id="StockName" placeholder="Name" name="StockName">
                          </div>
                          <div class="form-group">
                              <label for="unitID">Choose unit</label>
                              <select class="form-control form-control-sm" style="width: 100%;" required name="unit_id"> 
                                <option selected disabled value="">Choose...</option>
                                
                                  <option value="satu">Test</option>
                               
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="Qty">Quantity</label>
                              <input type="number" class="form-control form-control-sm" id="qty" placeholder="Input Qty" name="Stockquantity" min="0">
                          </div>
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" form="formAddNewStock"><i class="far fa-save"></i>&nbsp;Simpan</button>
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
      <div class="modal fade" id="updateDataStock" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                    <form method="post" action="#" id="formAddNewStock" name="updateStock">
                        @csrf
                        <div class="modal-body">
                          <div class="form-group">
                              <label for="TID">Transaction ID</label>
                              <input type="text" class="form-control form-control-sm" id="transactionID" name="TransactionID" value="WI-<?=date('Y');?><?=random_string('numeric', 8)?>" readonly>
                          </div>
                          <div class="form-group">
                              <label for="date">Choose date</label>
                              <input type="date" class="form-control form-control-sm" id="pickDate" name="Date" readonly>
                          </div>
                          <div class="form-group">
                              <label for="Code">Code</label>
                              <input type="text" class="form-control form-control-sm" id="CodeBarang" placeholder="Code" name="CodeBarang">
                          </div>
                          <div class="form-group">
                              <label for="Nama">Name</label>
                              <input type="text" class="form-control form-control-sm" id="StockName" placeholder="Name" name="StockName">
                          </div>
                          <div class="form-group">
                              <label for="unitID">Choose unit</label>
                              <select class="form-control form-control-sm" style="width: 100%;" required name="unit_id"> 
                                <option selected disabled value="">Choose...</option>
                                
                                  <option value="satu">Test</option>
                               
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="Qty">Quantity</label>
                              <input type="number" class="form-control form-control-sm" id="qty" placeholder="Input Qty" name="Stockquantity" min="0">
                          </div>
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" form="formAddNewStock"><i class="far fa-save"></i>&nbsp;Simpan</button>
                              <button type="submit" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i>&nbsp;Batal</button>
                          </div>
                        </div> 
                    </form> 
                </div>
            </div>
             
          </div>
        </div>
      </div>


      {{-- MODAL DELETE STOCK --}}
      <div class="modal fade" id="deleteDataStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Delete stock</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are you sure want to delete?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Yes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>


      {{-- MODAL OUTCOME STOCK --}}
      <div class="modal fade" id="OutcomeStock" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Update data exit stock</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </div>

            <div class="card" style="margin: 10px;">
                <div class="card-header">
                    <h4>form input data</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="#" id="formAddNewStock" name="updateStock">
                        @csrf
                        <div class="modal-body">
                          <div class="form-group">
                              <label for="TID">Transaction ID</label>
                              <input type="text" class="form-control form-control-sm" id="transactionID" name="TransactionID" value="WI-<?=date('Y');?><?=random_string('numeric', 8)?>" readonly>
                          </div>
                          <div class="form-group">
                              <label for="date">Incoming date</label>
                              <input type="date" class="form-control form-control-sm" id="pickDate" name="inComingDate" readonly>
                          </div>
                          <div class="form-group">
                            <label for="date">Exit date</label>
                            <input type="date" class="form-control form-control-sm" id="pickDate" name="exitDate">
                        </div>
                          <div class="form-group">
                              <label for="Code">Code</label>
                              <input type="text" class="form-control form-control-sm" id="CodeBarang" placeholder="Code" name="CodeBarang" readonly>
                          </div>
                          <div class="form-group">
                              <label for="Nama">Name</label>
                              <input type="text" class="form-control form-control-sm" id="StockName" placeholder="Name" name="StockName" disabled>
                          </div>
                          <div class="form-group">
                              <label for="unitID">Choose unit</label>
                              <select class="form-control form-control-sm" style="width: 100%;" required name="unit_id" readonly> 
                                <option selected disabled value="">Choose...</option>
                                
                                  <option value="satu">Test</option>
                               
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="Qty">Quantity</label>
                              <input type="number" class="form-control form-control-sm" id="qty" placeholder="Input Qty" name="Stockquantity" min="0">
                          </div>
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" form="formAddNewStock"><i class="far fa-save"></i>&nbsp;Simpan</button>
                              <button type="submit" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i>&nbsp;Batal</button>
                          </div>
                        </div> 
                    </form> 
                </div>
            </div>
             
          </div>
        </div>
      </div>


      <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );

        
      </script>
@endsection