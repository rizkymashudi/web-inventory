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
                <button class="btn btn-sm btn-success text-decoration-none" type="button" data-toggle="modal" data-target="#createDataUnit">Create new user</button>
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
                    <tr>
                        <td>abdul</td>
                        <td>Xxx@xxx.x</td>
                        <td>admin</td>
                        <td>12724</td>
                        <td>
                            <div class="d-flex flex-nowrap justify-content-center" style="width: 30%; margin: 0px auto">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateUser"><i class="far fa-edit"></i></button>&nbsp;
                                <button type="submit" class="btn btn-danger" id="delete" data-toggle="modal" data-target="#deleteUser"><i class="far fa-trash-alt"></i></button>
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

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endsection