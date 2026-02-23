@extends('admin.layouts.app')

@section('title', 'About – Home Content')

@section('content')
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header">
        <h5 class="mb-0">About The Conference</h5>
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

        <form action="{{ route('admin.content.about.update') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="mb-4">
            <label class="form-label" for="title">Title <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $about->title) }}" required />
          </div>
          <div class="mb-4">
            <label class="form-label" for="description">Description <span class="text-danger">*</span></label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="12">{{ old('description', $about->description) }}</textarea>
            <small class="text-body-secondary">Rich text supported. This content is shown in the About section on the home page.</small>
          </div>
          <div class="mb-4">
            <label class="form-label" for="image">About Section Image <span class="text-muted">(optional)</span></label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp" />
            <small class="text-body-secondary">Image shown in the About The Conference section. Max size: 5 MB.</small>
          </div>
          @if($about->image ?? null)
            <div class="mb-4">
              <label class="form-label d-block">Current Image</label>
              <img src="{{ \Illuminate\Support\Str::startsWith($about->image, ['uploads/', 'assets/']) ? asset($about->image) : asset('storage/'.$about->image) }}" alt="About section" class="rounded" style="max-width:100%;height:auto;max-height:280px;object-fit:cover;" />
            </div>
          @endif
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Update About</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.tiny.cloud/1/{{ env('TINY_API_KEY') }}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    tinymce.init({
      selector: '#description',
      height: 400,
      menubar: false,
      plugins: 'lists link code',
      toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist | link | code',
      content_style: 'body { font-family: inherit; font-size: 14px; }',
    });
  });
</script>
@endpush
