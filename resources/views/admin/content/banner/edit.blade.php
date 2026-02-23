@extends('admin.layouts.app')

@section('title', 'Banner – Home Content')

@section('content')
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header">
        <h5 class="mb-0">Home Hero Banner</h5>
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

        <form action="{{ route('admin.content.banner.update') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="mb-4">
            <label class="form-label" for="image">Banner Image (Desktop)</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp" />
            <small class="text-body-secondary">Leave empty to keep current. Recommended: wide image (e.g. 1920x1080). Max size: 5 MB.</small>
          </div>

          @if($banner->image)
            <div class="mb-4">
              <label class="form-label d-block">Current Desktop Banner</label>
              <img src="{{ \Illuminate\Support\Str::startsWith($banner->image, ['uploads/', 'assets/']) ? asset($banner->image) : asset('storage/'.$banner->image) }}" alt="Current banner" class="rounded" style="max-width:100%;height:auto;max-height:280px;object-fit:cover;" />
            </div>
          @endif

          <div class="mb-4">
            <label class="form-label" for="mobile_image">Mobile Banner Image <span class="text-muted">(optional)</span></label>
            <input type="file" class="form-control @error('mobile_image') is-invalid @enderror" id="mobile_image" name="mobile_image" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp" />
            <small class="text-body-secondary">Shown on small screens instead of desktop banner. Recommended: portrait or square (e.g. 1080x1920). Max size: 5 MB.</small>
          </div>

          @if($banner->mobile_image ?? null)
            <div class="mb-4">
              <label class="form-label d-block">Current Mobile Banner</label>
              <img src="{{ \Illuminate\Support\Str::startsWith($banner->mobile_image, ['uploads/', 'assets/']) ? asset($banner->mobile_image) : asset('storage/'.$banner->mobile_image) }}" alt="Current mobile banner" class="rounded" style="max-width:100%;height:auto;max-height:280px;object-fit:cover;" />
            </div>
          @endif

          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Update Banner</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

