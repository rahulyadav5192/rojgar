@extends('admin.layouts.app')

@section('title', 'Conference – Home Content')

@section('content')
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header">
        <h5 class="mb-0">Conference (Ready-to-play & Information bar)</h5>
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

        <form action="{{ route('admin.content.conference.update') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="mb-4">
            <label class="form-label" for="image">Image (ready-to-play section)</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp" />
            @if($conference->image)
              <div class="mt-2">
                <img src="{{ asset('storage/'.$conference->image) }}" alt="" class="rounded" style="max-height:160px" />
                <small class="text-body-secondary d-block">Current image. Upload a new one to replace.</small>
              </div>
            @else
              <small class="text-body-secondary">If empty, home page will use a default image.</small>
            @endif
          </div>
          <div class="mb-4">
            <label class="form-label" for="location">Location</label>
            <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location', $conference->location) }}" placeholder="e.g. Maria Hall, NY, USA" />
          </div>
          <div class="mb-4">
            <label class="form-label" for="date_time">Date & Time</label>
            <input type="text" class="form-control @error('date_time') is-invalid @enderror" id="date_time" name="date_time" value="{{ old('date_time', $conference->date_time) }}" placeholder="e.g. 10am - 7pm, 15th Oct" />
          </div>
          <div class="mb-4">
            <label class="form-label" for="speakers_text">Speakers (text)</label>
            <input type="text" class="form-control @error('speakers_text') is-invalid @enderror" id="speakers_text" name="speakers_text" value="{{ old('speakers_text', $conference->speakers_text) }}" placeholder="e.g. 25 Professionals" />
          </div>
          <div class="mb-4">
            <label class="form-label" for="seats_text">Seats (text)</label>
            <input type="text" class="form-control @error('seats_text') is-invalid @enderror" id="seats_text" name="seats_text" value="{{ old('seats_text', $conference->seats_text) }}" placeholder="e.g. 100 People" />
          </div>
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Update Conference</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
