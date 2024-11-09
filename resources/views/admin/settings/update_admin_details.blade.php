@extends('admin.master')
@section('admin_content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Settings</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Update admin details</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-8">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Edit Admin Details</h5>
  
                <!-- General Form Elements -->
                @if (Session::has('message'))
                  <p class="text-success">{{ Session::get('message') }}</p>
                @endif
                <form action="{{ url('admin/update-admin-details') }}" method="post" name="updateAdminPasswordForm" id="updateAdminPasswordForm">
                  @csrf
                  <div class="row mb-3">
                    <label  class="col-sm-2 col-form-label">Admin Email</label>
                    <div class="col-sm-10">
                      <input type="text" value="{{ Auth::guard('admin')->user()->email }}" readonly class="form-control">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label  class="col-sm-2 col-form-label">Admin Type</label>
                    <div class="col-sm-10">
                      <input type="text" value="{{ Auth::guard('admin')->user()->type }}" readonly class="form-control">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="admin_name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="admin_name" value="{{ Auth::guard('admin')->user()->name }}" id="admin_name" placeholder="Name" class="form-control">
                      @if ($errors->has('admin_name'))
                        <span class="text-danger">{{ $errors->first('admin_name') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="admin_mobile" class="col-sm-2 col-form-label">Mobile</label>
                    <div class="col-sm-10">
                      <input type="text" name="admin_mobile" value="{{ Auth::guard('admin')->user()->mobile }}" id="admin_mobile" maxlength="11" minlength="11" placeholder="Mobile" class="form-control">
                      @if ($errors->has('admin_mobile'))
                        <span class="text-danger">{{ $errors->first('admin_mobile') }}</span>
                      @endif
                    </div>
                  </div>
    
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Update Details</button>
                    </div>
                  </div>
  
                </form><!-- End General Form Elements -->
  
              </div>
            </div>
  
          </div>
      </div>
    </section>

</main><!-- End #main -->

@endsection