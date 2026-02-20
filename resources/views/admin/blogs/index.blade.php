@extends('admin.layouts.app')

@section('title', 'Blogs')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
    <h5 class="mb-0">Blogs</h5>
    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
      <i class="icon-base bx bx-plus me-1"></i> Add Blog
    </a>
  </div>
  @if(session('success'))
    <div class="alert alert-success alert-dismissible m-4 mb-0" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Image</th>
          <th>Title</th>
          <th>Status</th>
          <th>Published at</th>
          <th class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse($blogs as $blog)
          <tr>
            <td>
              @if($blog->image)
                <img src="{{ \Illuminate\Support\Str::startsWith($blog->image, ['uploads/', 'assets/']) ? asset($blog->image) : asset('storage/'.$blog->image) }}" alt="" class="rounded" style="width:48px;height:48px;object-fit:cover" />
              @else
                <span class="avatar avatar-sm rounded bg-label-secondary d-inline-flex align-items-center justify-content-center">
                  <i class="icon-base bx bx-news"></i>
                </span>
              @endif
            </td>
            <td><strong>{{ $blog->title }}</strong></td>
            <td>
              @if($blog->status === \App\Models\Blog::STATUS_PUBLISHED)
                <span class="badge bg-label-success">Published</span>
              @else
                <span class="badge bg-label-secondary">Draft</span>
              @endif
            </td>
            <td>{{ $blog->published_at ? $blog->published_at->format('M d, Y') : '—' }}</td>
            <td class="text-end">
              <div class="dropdown">
                <button type="button" class="btn btn-sm btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="icon-base bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                  <a class="dropdown-item" href="{{ route('admin.blogs.edit', $blog) }}">
                    <i class="icon-base bx bx-edit-alt me-1"></i> Edit
                  </a>
                  <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this blog post?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item text-danger">
                      <i class="icon-base bx bx-trash me-1"></i> Delete
                    </button>
                  </form>
                </div>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center py-6 text-body-secondary">No blog posts yet. <a href="{{ route('admin.blogs.create') }}">Add one</a>.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  @if($blogs->hasPages())
    <div class="card-footer d-flex justify-content-end">
      {{ $blogs->links('pagination::bootstrap-5') }}
    </div>
  @endif
</div>
@endsection
