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
            <li class="breadcrumb-item active">Unit Stock</li>
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
              <h2 class="card-title"><b>Unit</b></h2>
              <div class="float-right">
                <button class="btn btn-sm btn-success text-decoration-none" type="button" data-toggle="modal" data-target="#createDataUnit">Create new unit</button>
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Unit code</th>
                        <th>Unit name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>4</td>
                        <td>X</td>
                        <td>234234</td>
                        <td>
                            <div class="d-flex flex-nowrap justify-content-center" style="width: 30%; margin: 0px auto">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateUnit"><i class="far fa-edit"></i>Update</button>&nbsp;
                                <button type="submit" class="btn btn-danger" id="delete" data-toggle="modal" data-target="#deleteDataUnit"><i class="far fa-trash-alt"></i>Delete</button>
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


{{-- MODAL CREATE NEW UNIT --}}
<div class="modal fade" id="createDataUnit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Create data unit</h3>
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
                          <label for="Cname">Unit code</label>
                          <input type="text" class="form-control form-control-sm" id="Ucode" name="UnitCode">
                      </div>
                      <div class="form-group">
                          <label for="Unitname">Unit name</label>
                          <input type="text" class="form-control form-control-sm" id="Uname" name="UnitName">
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


{{-- MODAL UPDATE UNIT --}}
<div class="modal fade" id="updateUnit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Update data unit</h3>
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
                          <label for="Cname">Unit code</label>
                          <input type="text" class="form-control form-control-sm" id="Ucode" name="UnitCode">
                      </div>
                      <div class="form-group">
                          <label for="Unitname">Unit name</label>
                          <input type="text" class="form-control form-control-sm" id="Uname" name="UnitName">
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
<div class="modal fade" id="deleteDataUnit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Delete unit</h3>
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



<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endsection