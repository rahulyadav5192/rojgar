@extends('admin.layouts.app')

@section('title', $speaker->exists ? 'Edit Speaker' : 'Add Speaker')

@section('content')
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $speaker->exists ? 'Edit Speaker' : 'Add Speaker' }}</h5>
        <a href="{{ route('admin.content.speakers.index') }}" class="btn btn-outline-secondary btn-sm">Back to list</a>
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

        <form action="{{ $speaker->exists ? route('admin.content.speakers.update', $speaker) : route('admin.content.speakers.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @if($speaker->exists)
            @method('PUT')
          @endif
          <div class="mb-4">
            <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $speaker->name) }}" required />
          </div>
          <div class="mb-4">
            <label class="form-label" for="designation">Designation</label>
            <input type="text" class="form-control @error('designation') is-invalid @enderror" id="designation" name="designation" value="{{ old('designation', $speaker->designation) }}" placeholder="e.g. Product Designer, Tesla" />
          </div>
          <div class="mb-4">
            <label class="form-label" for="image">Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp" />
            @if($speaker->exists && $speaker->image)
              <div class="mt-2">
                <img src="{{ \Illuminate\Support\Str::startsWith($speaker->image, ['uploads/', 'assets/']) ? asset($speaker->image) : asset('storage/'.$speaker->image) }}" alt="" class="rounded" style="max-height:120px" />
                <small class="text-body-secondary d-block">Current image. Upload a new one to replace.</small>
              </div>
            @endif
          </div>
          <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('admin.content.speakers.index') }}" class="btn btn-outline-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">{{ $speaker->exists ? 'Update Speaker' : 'Add Speaker' }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
