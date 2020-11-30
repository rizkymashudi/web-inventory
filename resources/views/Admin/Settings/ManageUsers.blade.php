@extends('index')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><b>Users management</b></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Settings</li>
            <li class="breadcrumb-item active">Users management</li>
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
              <h2 class="card-title"><b>Users</b></h2>
              <div class="float-right">
                <button class="btn btn-sm btn-success text-decoration-none" type="button" data-toggle="modal" data-target="#createDataUser">Create new user</button>
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Last login</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($user as $usr)
                  <tr>
                    <td>{{ $usr->username }}</td>
                    <td>{{ $usr->email }}</td>
                    <td>{{ convertInt($usr->role) }}</td>
                    <td>{{ $usr->last_login }}</td>
                    <td>
                        <div class="d-flex flex-nowrap justify-content-center" style="width: 30%; margin: 0px auto">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateUser"><i class="far fa-edit"></i></button>&nbsp;
                            <button type="submit" class="btn btn-danger" id="delete" data-toggle="modal" data-target="#deleteUser{{ $usr->id }}"><i class="far fa-trash-alt"></i></button>
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
<div class="modal fade" id="createDataUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Create new user</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </div>

      <div class="card" style="margin: 10px;">
          <div class="card-header bg-dark">
              <h4>form input data</h4>
          </div>
          <div class="card-body">
            <form method="post" action="{{ Route('CreateNewUser') }}" enctype="multipart/form-data" name="createNewUser">
                  @csrf
                  <div class="modal-body">
                    <div class="form-group">
                        <label for="Username">Username</label>
                        <input type="text" class="form-control form-control-sm" name="Username">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control form-control-sm" name="Email">
                    </div>
                    <div class="form-group">
                        <label for="Role">Choose Role</label>
                        <select class="form-control form-control-sm" style="width: 100%;" required name="Role"> 
                          <option selected disabled value="">Choose...</option>
                            <option value="1">Admin</option>
                            <option value="0">User</option>  
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="far fa-save"></i>&nbsp;Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i>&nbsp;Batal</button>
                    </div>
                  </div> 
              </form> 
          </div>
      </div>
       
    </div>
  </div>
</div>





{{-- MODAL DELETE STOCK --}}
@foreach ($user as $usr)
<div class="modal fade" id="deleteUser{{ $usr->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Delete user</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('DeleteUser') }}" method="POST">
        @method('delete')
        @csrf
        <div class="modal-body">
          Are you sure want to delete User {{ $usr->username }} ?
          <input type="hidden" name="id" value="{{ $usr->id }}">
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


<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endsection