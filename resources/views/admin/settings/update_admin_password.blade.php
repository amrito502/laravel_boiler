@extends('admin.master')
@section('admin_content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Settings</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Update admin password</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-8">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Change Password</h5>
  
                <!-- General Form Elements -->
                @if (Session::has('message'))
                  <p class="text-success">{{ Session::get('message') }}</p>
                @endif
                <form action="{{ url('admin/update-admin-password') }}" method="post" name="updateAdminPasswordForm" id="updateAdminPasswordForm">
                  @csrf
                  <div class="row mb-3">
                    <label  class="col-sm-2 col-form-label">Admin Email</label>
                    <div class="col-sm-10">
                      <input type="text" value="{{ $adminDetails['email'] }}" readonly class="form-control">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label  class="col-sm-2 col-form-label">Admin Type</label>
                    <div class="col-sm-10">
                      <input type="text" value="{{ $adminDetails['type'] }}" readonly class="form-control">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="old_password" class="col-sm-2 col-form-label">Old Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="old_password" id="old_password" placeholder="Old Password" class="form-control">
                      <div id="check_password"></div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="new_password" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="new_password" id="new_password" placeholder="New Password" class="form-control">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="form-control">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Update Password</button>
                    </div>
                  </div>
  
                </form><!-- End General Form Elements -->
  
              </div>
            </div>
  
          </div>
      </div>
    </section>

</main><!-- End #main -->
{{-- @section('script_buttom')
<script>
    $(document).ready(function(){
        $("#new_password").keyup(function(){
            var new_password = $("#new_password").val();
            alert(new_password);
        });
    });
</script> --}}
@endsection