@extends('admin.layouts.app')

@section('title', 'Counter – Home Content')

@section('content')
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header">
        <h5 class="mb-0">Counter Area (Speakers, Seats, Sponsors, Sessions)</h5>
      </div>
      <div class="card-body">
        @if(session('success'))
          <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
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

        <form action="{{ route('admin.content.counter.update') }}" method="POST">
          @csrf
          @method('PUT')
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label" for="speakers_count">Speakers count <span class="text-danger">*</span></label>
              <input type="number" min="0" class="form-control @error('speakers_count') is-invalid @enderror" id="speakers_count" name="speakers_count" value="{{ old('speakers_count', $counter->speakers_count) }}" required />
            </div>
            <div class="col-md-6">
              <label class="form-label" for="seats_count">Seats count <span class="text-danger">*</span></label>
              <input type="number" min="0" class="form-control @error('seats_count') is-invalid @enderror" id="seats_count" name="seats_count" value="{{ old('seats_count', $counter->seats_count) }}" required />
            </div>
            <div class="col-md-6">
              <label class="form-label" for="sponsors_count">Sponsors count <span class="text-danger">*</span></label>
              <input type="number" min="0" class="form-control @error('sponsors_count') is-invalid @enderror" id="sponsors_count" name="sponsors_count" value="{{ old('sponsors_count', $counter->sponsors_count) }}" required />
            </div>
            <div class="col-md-6">
              <label class="form-label" for="sessions_count">Sessions count <span class="text-danger">*</span></label>
              <input type="number" min="0" class="form-control @error('sessions_count') is-invalid @enderror" id="sessions_count" name="sessions_count" value="{{ old('sessions_count', $counter->sessions_count) }}" required />
            </div>
          </div>
          <div class="mt-4 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Update Counter</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
