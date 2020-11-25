@extends('index')
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><b>User settings</b></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Settings</li>
            <li class="breadcrumb-item active">User settings</li>
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
        <!-- left column -->
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{ asset('me.jpg')}}" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>Sleepless junkie</h4>
                      <p class="text-secondary mb-1">Full Stack Developer wanna be inshaallah</p>
                      <p class="text-muted font-size-sm">Batam, Riau islands, ID</p>
                      <button class="btn btn-outline-primary">Change photo</button>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-7">
            <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Change password</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form">
              <div class="card-body">
                <div class="form-group">
                  <label for="Username">Username</label>
                  <input type="text" class="form-control form-control-sm" placeholder="Enter username">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control form-control-sm" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">New Password</label>
                  <input type="password" class="form-control form-control-sm" id="exampleInputPassword1" placeholder="Enter new Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm new Password</label>
                    <input type="password" class="form-control form-control-sm" id="exampleInputPassword1" placeholder="Enter confirm new password">
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="far fa-paper-plane"></i>Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
  <!-- /.content -->

@endsection