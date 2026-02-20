@extends('admin.layouts.app')

@section('title', 'Footer')

@section('content')
<div class="card">
  <div class="card-header">
    <h5 class="mb-0">Edit Footer</h5>
  </div>
  <div class="card-body">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('admin.content.footer.update') }}" method="post">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label class="form-label">Address</label>
        <textarea name="address" class="form-control" rows="3">{{ old('address', $footer->address) }}</textarea>
      </div>
      <div class="row">
        <div class="col-md-4 mb-3">
          <label class="form-label">Phone</label>
          <input type="text" name="phone" class="form-control" value="{{ old('phone', $footer->phone) }}">
        </div>
        <div class="col-md-4 mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" value="{{ old('email', $footer->email) }}">
        </div>
      </div>
      <h6>Social Links (leave blank to hide)</h6>
      <div class="row">
        <div class="col-md-4 mb-3">
          <label class="form-label">Instagram</label>
          <input type="url" name="instagram" class="form-control" value="{{ old('instagram', $footer->instagram) }}">
        </div>
        <div class="col-md-4 mb-3">
          <label class="form-label">Facebook</label>
          <input type="url" name="facebook" class="form-control" value="{{ old('facebook', $footer->facebook) }}">
        </div>
        <div class="col-md-4 mb-3">
          <label class="form-label">X (Twitter)</label>
          <input type="url" name="x" class="form-control" value="{{ old('x', $footer->x) }}">
        </div>
        <div class="col-md-4 mb-3">
          <label class="form-label">Pinterest</label>
          <input type="url" name="pinterest" class="form-control" value="{{ old('pinterest', $footer->pinterest) }}">
        </div>
      </div>
      <button class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
@endsection
