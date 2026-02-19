@extends('admin.layouts.app')

@section('title', 'Gallery')

@section('content')
<div class="card mb-4">
  <div class="card-header">
    <h5 class="mb-0">Upload Image</h5>
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
    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="row g-3 align-items-end">
      @csrf
      <div class="col-md-5">
        <label class="form-label" for="image">Image <span class="text-danger">*</span></label>
        <input type="file" class="form-control" id="image" name="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp" required />
      </div>
      <div class="col-md-4">
        <label class="form-label" for="caption">Caption</label>
        <input type="text" class="form-control" id="caption" name="caption" value="{{ old('caption') }}" placeholder="Optional caption" />
      </div>
      <div class="col-md-3">
        <button type="submit" class="btn btn-primary w-100">
          <i class="icon-base bx bx-upload me-1"></i> Upload
        </button>
      </div>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Gallery Images</h5>
  </div>
  @if(session('success'))
    <div class="alert alert-success alert-dismissible m-4 mb-0" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif
  <div class="card-body">
    <div class="row g-4">
      @forelse($images as $image)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="card border h-100">
            <img src="{{ asset('storage/'.$image->image) }}" class="card-img-top" alt="{{ $image->caption ?? 'Gallery' }}" style="height:180px;object-fit:cover" />
            <div class="card-body py-3">
              @if($image->caption)
                <p class="card-text small text-body-secondary mb-2">{{ Str::limit($image->caption, 40) }}</p>
              @endif
              <form action="{{ route('admin.gallery.destroy', $image) }}" method="POST" onsubmit="return confirm('Delete this image?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger w-100">
                  <i class="icon-base bx bx-trash me-1"></i> Delete
                </button>
              </form>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center py-6 text-body-secondary">
          No images yet. Upload one above.
        </div>
      @endforelse
    </div>
    @if($images->hasPages())
      <div class="d-flex justify-content-center mt-4">
        {{ $images->links('pagination::bootstrap-5') }}
      </div>
    @endif
  </div>
</div>
@endsection
