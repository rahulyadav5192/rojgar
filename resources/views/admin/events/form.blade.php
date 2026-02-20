@extends('admin.layouts.app')

@section('title', $event->exists ? 'Edit Event' : 'Add Event')

@section('content')
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $event->exists ? 'Edit Event' : 'Add Event' }}</h5>
        <a href="{{ route('admin.events.index') }}" class="btn btn-outline-secondary btn-sm">Back to list</a>
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

        <form action="{{ $event->exists ? route('admin.events.update', $event) : route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @if($event->exists)
            @method('PUT')
          @endif

          <div class="mb-4">
            <label class="form-label" for="title">Event Title <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $event->title) }}" placeholder="Event title" required />
          </div>

          <div class="mb-4">
            <label class="form-label" for="description">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" placeholder="Event description">{{ old('description', $event->description) }}</textarea>
          </div>

          <div class="mb-4">
            <label class="form-label" for="location">Location</label>
            <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location', $event->location) }}" placeholder="Venue or address" />
          </div>

          <div class="mb-4">
            <label class="form-label" for="type">Type</label>
            <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
              @foreach(\App\Models\Event::typeOptions() as $value => $label)
                <option value="{{ $value }}" {{ old('type', $event->type ?? 'Domestic') === $value ? 'selected' : '' }}>{{ $label }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-4">
            <label class="form-label" for="image">Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp" />
            @if($event->exists && $event->image)
              <div class="mt-2">
                <img src="{{ asset('storage/'.$event->image) }}" alt="" class="rounded" style="max-height:120px" />
                <small class="text-body-secondary d-block">Current image. Upload a new one to replace.</small>
              </div>
            @endif
          </div>

          <div class="row">
            <div class="col-md-6 mb-4">
              <label class="form-label" for="start_date">Start Date <span class="text-danger">*</span></label>
              <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date', $event->start_date?->format('Y-m-d')) }}" required />
            </div>
            <div class="col-md-6 mb-4">
              <label class="form-label" for="end_date">End Date <span class="text-body-secondary">(optional, for multi-day)</span></label>
              <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date', $event->end_date?->format('Y-m-d')) }}" />
            </div>
          </div>

          <div class="mb-4">
            <label class="form-label" for="timing">Timing</label>
            <input type="text" class="form-control @error('timing') is-invalid @enderror" id="timing" name="timing" value="{{ old('timing', $event->timing) }}" placeholder="e.g. 10:00 AM - 5:00 PM" />
          </div>

          <div class="row">
            <div class="col-md-6 mb-4">
              <label class="form-label" for="status">Status <span class="text-danger">*</span></label>
              <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                @foreach(\App\Models\Event::statusOptions() as $value => $label)
                  <option value="{{ $value }}" {{ old('status', $event->status) === $value ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6 mb-4">
              <label class="form-label" for="who_can_apply">Who can apply <span class="text-danger">*</span></label>
              <select class="form-select @error('who_can_apply') is-invalid @enderror" id="who_can_apply" name="who_can_apply" required>
                @foreach(\App\Models\Event::whoCanApplyOptions() as $value => $label)
                  <option value="{{ $value }}" {{ old('who_can_apply', $event->who_can_apply) === $value ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="mb-4">
            <div class="form-check">
              <input class="form-check-input @error('featured') is-invalid @enderror" type="checkbox" id="featured" name="featured" value="1" {{ old('featured', $event->featured) ? 'checked' : '' }} />
              <label class="form-check-label" for="featured">Featured event</label>
            </div>
          </div>

          <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('admin.events.index') }}" class="btn btn-outline-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">{{ $event->exists ? 'Update Event' : 'Create Event' }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
