@extends('admin.layouts.app')

@section('title', $testimonial->exists ? 'Edit Testimonial' : 'Add Testimonial')

@section('content')
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $testimonial->exists ? 'Edit Testimonial' : 'Add Testimonial' }}</h5>
        <a href="{{ route('admin.content.testimonials.index') }}" class="btn btn-outline-secondary btn-sm">Back to list</a>
      </div>
      <div class="card-body">
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

        <form action="{{ $testimonial->exists ? route('admin.content.testimonials.update', $testimonial) : route('admin.content.testimonials.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @if($testimonial->exists)
            @method('PUT')
          @endif
          <div class="mb-4">
            <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $testimonial->name) }}" required />
          </div>
          <div class="mb-4">
            <label class="form-label" for="designation">Designation</label>
            <input type="text" class="form-control @error('designation') is-invalid @enderror" id="designation" name="designation" value="{{ old('designation', $testimonial->designation) }}" placeholder="e.g. CEO, Company Name" />
          </div>
          <div class="mb-4">
            <label class="form-label" for="description">Quote / Testimonial <span class="text-danger">*</span></label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description', $testimonial->description) }}</textarea>
            <small class="text-body-secondary">What this person said (shown on the homepage).</small>
          </div>
          <div class="mb-4">
            <label class="form-label" for="image">Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp" />
            @if($testimonial->exists && $testimonial->image)
              <div class="mt-2">
                <img src="{{ \Illuminate\Support\Str::startsWith($testimonial->image, ['uploads/', 'assets/']) ? asset($testimonial->image) : asset('storage/'.$testimonial->image) }}" alt="" class="rounded" style="max-height:120px" />
                <small class="text-body-secondary d-block">Current image. Upload a new one to replace.</small>
              </div>
            @endif
          </div>
          <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('admin.content.testimonials.index') }}" class="btn btn-outline-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">{{ $testimonial->exists ? 'Update Testimonial' : 'Add Testimonial' }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
