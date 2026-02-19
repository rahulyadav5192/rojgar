@extends('admin.layouts.auth')

@section('title', 'Forgot Password')

@section('content')
<div class="card px-sm-6 px-0">
  <div class="card-body">
    <div class="app-brand justify-content-center mb-6">
      <a href="{{ route('admin.login') }}" class="app-brand-link gap-2">
        @include('admin.partials.app-brand-logo')
        <span class="app-brand-text demo text-heading fw-bold">{{ config('app.name') }}</span>
      </a>
    </div>
    <h4 class="mb-1">Forgot Password? &#128274;</h4>
    <p class="mb-6">Enter your email and we'll send you instructions to reset your password</p>

    @if(session('status'))
      <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif
    @if($errors->any())
      <div class="alert alert-danger alert-dismissible" role="alert">
        @foreach($errors->all() as $err) {{ $err }} @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    <form method="POST" action="{{ route('admin.password.email') }}" class="mb-6" id="formAuthentication">
      @csrf
      <div class="mb-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required autofocus />
      </div>
      <button class="btn btn-primary d-grid w-100" type="submit">Send Reset Link</button>
    </form>
    <div class="text-center">
      <a href="{{ route('admin.login') }}" class="d-flex justify-content-center">
        <i class="icon-base bx bx-chevron-left me-1"></i> Back to login
      </a>
    </div>
  </div>
</div>
@endsection
