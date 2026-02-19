@extends('admin.layouts.auth')

@section('title', 'Register')

@section('content')
<div class="card px-sm-6 px-0">
  <div class="card-body">
    <div class="app-brand justify-content-center mb-6">
      <a href="{{ route('admin.dashboard') }}" class="app-brand-link gap-2">
        @include('admin.partials.app-brand-logo')
        <span class="app-brand-text demo text-heading fw-bold">{{ config('app.name') }}</span>
      </a>
    </div>
    <h4 class="mb-1">Create your account</h4>
    <p class="mb-6">Make your app management easy and fun!</p>

    @if($errors->any())
      <div class="alert alert-danger alert-dismissible" role="alert">
        <ul class="mb-0">
          @foreach($errors->all() as $err) <li>{{ $err }}</li> @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    <form method="POST" action="{{ route('admin.register.submit') }}" class="mb-6" id="formAuthentication">
      @csrf
      <div class="mb-6">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="{{ old('name') }}" required />
      </div>
      <div class="mb-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required />
      </div>
      <div class="mb-6 form-password-toggle">
        <label class="form-label" for="password">Password</label>
        <div class="input-group input-group-merge">
          <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
          <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
        </div>
      </div>
      <div class="mb-6 form-password-toggle">
        <label class="form-label" for="password_confirmation">Confirm Password</label>
        <div class="input-group input-group-merge">
          <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
          <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
        </div>
      </div>
      <div class="mb-6">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="terms" name="terms" required />
          <label class="form-check-label" for="terms">I agree to <a href="#">privacy policy & terms</a></label>
        </div>
      </div>
      <button class="btn btn-primary d-grid w-100" type="submit">Sign up</button>
    </form>
    <p class="text-center">
      <span>Already have an account?</span>
      <a href="{{ route('admin.login') }}"><span>Sign in instead</span></a>
    </p>
  </div>
</div>
@endsection
