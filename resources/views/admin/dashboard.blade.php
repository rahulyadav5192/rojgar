@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="d-flex align-items-start row">
        <div class="col-sm-7">
          <div class="card-body">
            <h5 class="card-title text-primary mb-3">Welcome back, {{ Auth::guard('admin')->user()->name }}! &#127881;</h5>
            <p class="mb-6">You have successfully logged in to the admin panel. Use the sidebar to navigate.</p>
            <a href="{{ url('/') }}" class="btn btn-sm btn-outline-primary" target="_blank">View Site</a>
          </div>
        </div>
        <div class="col-sm-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-6">
            <div class="avatar flex-shrink-0 rounded bg-label-primary mx-auto" style="width:120px;height:120px;line-height:120px;font-size:48px;">
              &#128104;
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row mt-4">
  <div class="col-lg-3 col-md-6 col-12 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="card-title d-flex align-items-start justify-content-between mb-2">
          <span class="avatar flex-shrink-0 rounded bg-label-success"><i class="icon-base bx bx-user icon-lg"></i></span>
        </div>
        <span class="fw-semibold d-block mb-1">Admin Panel</span>
        <h4 class="card-title mb-0">Sneat</h4>
        <small class="text-success">Template</small>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-12 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="card-title d-flex align-items-start justify-content-between mb-2">
          <span class="avatar flex-shrink-0 rounded bg-label-primary"><i class="icon-base bx bx-cog icon-lg"></i></span>
        </div>
        <span class="fw-semibold d-block mb-1">Settings</span>
        <h4 class="card-title mb-0">Configure</h4>
        <small class="text-body-secondary">Your app</small>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-12 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="card-title d-flex align-items-start justify-content-between mb-2">
          <span class="avatar flex-shrink-0 rounded bg-label-info"><i class="icon-base bx bx-shield icon-lg"></i></span>
        </div>
        <span class="fw-semibold d-block mb-1">Secure</span>
        <h4 class="card-title mb-0">Login</h4>
        <small class="text-body-secondary">Protected</small>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-12 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <div class="card-title d-flex align-items-start justify-content-between mb-2">
          <span class="avatar flex-shrink-0 rounded bg-label-warning"><i class="icon-base bx bx-log-out icon-lg"></i></span>
        </div>
        <span class="fw-semibold d-block mb-1">Logout</span>
        <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-sm btn-outline-warning mt-2">Sign out</a>
      </div>
    </div>
  </div>
</div>
@endsection
