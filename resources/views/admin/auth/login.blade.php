@extends('admin.layouts.auth')

@section('title', 'Login')

@section('content')
<div class="card px-sm-6 px-0">
  <div class="card-body">
    <div class="app-brand justify-content-center">
      <a href="{{ route('admin.dashboard') }}" class="app-brand-link gap-2">
        @include('admin.partials.app-brand-logo')
        <span class="app-brand-text demo text-heading fw-bold">{{ config('app.name') }}</span>
      </a>
    </div>
    <h4 class="mb-1">Welcome back! 👋</h4>
    <p class="mb-6">Please sign-in to your account and start the adventure</p>

    @if(session('error'))
      <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif
    @if($errors->any())
      <div class="alert alert-danger alert-dismissible" role="alert">
        <ul class="mb-0">
          @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
          @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}" class="mb-6" id="formAuthentication">
      @csrf
      <div class="mb-6">
        <label for="email" class="form-label">Email or Username</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
          placeholder="Enter your email or username" value="{{ old('email') }}" autofocus />
      </div>
      <div class="mb-6 form-password-toggle">
        <label class="form-label" for="password">Password</label>
        <div class="input-group input-group-merge">
          <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
            name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
          <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
        </div>
      </div>
      <div class="mb-8">
        <div class="d-flex justify-content-between">
          <div class="form-check mb-0">
            <input class="form-check-input" type="checkbox" id="remember-me" name="remember" />
            <label class="form-check-label" for="remember-me">Remember Me</label>
          </div>
          {{-- <a href="{{ route('admin.password.request') }}"><span>Forgot Password?</span></a> --}}
        </div>
      </div>
      <div class="mb-6">
        <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
      </div>
    </form>

    {{-- <p class="text-center">
      <span>New on our platform?</span>
      <a href="{{ route('admin.register') }}"><span>Create an account</span></a>
    </p> --}}
  </div>
</div>
@endsection
