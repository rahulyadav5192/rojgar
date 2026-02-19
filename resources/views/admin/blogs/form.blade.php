@extends('admin.layouts.app')

@section('title', $blog->exists ? 'Edit Blog' : 'Add Blog')

@section('content')
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $blog->exists ? 'Edit Blog' : 'Add Blog' }}</h5>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary btn-sm">Back to list</a>
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

        <form action="{{ $blog->exists ? route('admin.blogs.update', $blog) : route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @if($blog->exists)
            @method('PUT')
          @endif

          <div class="mb-4">
            <label class="form-label" for="title">Title <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $blog->title) }}" required />
          </div>

          <div class="mb-4">
            <label class="form-label" for="excerpt">Short description</label>
            <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt" rows="2" placeholder="Optional short summary shown in lists.">{{ old('excerpt', $blog->excerpt) }}</textarea>
          </div>

          <div class="mb-4">
            <label class="form-label" for="body">Content <span class="text-danger">*</span></label>
            <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="12">{{ old('body', $blog->body) }}</textarea>
            <small class="text-body-secondary">This uses the same TinyMCE editor key from your .env (TINY_API_KEY).</small>
          </div>

          <div class="mb-4">
            <label class="form-label" for="image">Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp" />
            @if($blog->exists && $blog->image)
              <div class="mt-2">
                <img src="{{ asset('storage/'.$blog->image) }}" alt="" class="rounded" style="max-height:140px" />
                <small class="text-body-secondary d-block">Current image. Upload a new one to replace.</small>
              </div>
            @endif
          </div>

          <div class="mb-4">
            <label class="form-label" for="status">Status <span class="text-danger">*</span></label>
            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
              @foreach(\App\Models\Blog::statusOptions() as $value => $label)
                <option value="{{ $value }}" {{ old('status', $blog->status ?? \App\Models\Blog::STATUS_DRAFT) === $value ? 'selected' : '' }}>{{ $label }}</option>
              @endforeach
            </select>
          </div>

          <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">{{ $blog->exists ? 'Update Blog' : 'Create Blog' }}</button>
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
      selector: '#body',
      height: 450,
      menubar: false,
      plugins: 'lists link code image table',
      toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist | link | table | code',
      content_style: 'body { font-family: inherit; font-size: 14px; }',
    });
  });
</script>
@endpush
