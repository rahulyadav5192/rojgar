@extends('admin.layouts.app')

@section('title', 'Testimonials – Home Content')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
    <h5 class="mb-0">What People Say (Testimonials)</h5>
    <a href="{{ route('admin.content.testimonials.create') }}" class="btn btn-primary">
      <i class="bx bx-plus me-1"></i> Add Testimonial
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
          <th>Name</th>
          <th>Designation</th>
          <th>Quote</th>
          <th class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse($testimonials as $testimonial)
          <tr>
            <td>
              @if($testimonial->image)
                <img src="{{ \Illuminate\Support\Str::startsWith($testimonial->image, ['uploads/', 'assets/']) ? asset($testimonial->image) : asset('storage/'.$testimonial->image) }}" alt="" class="rounded" style="width:48px;height:48px;object-fit:cover" />
              @else
                <span class="avatar avatar-sm rounded bg-label-secondary d-inline-flex align-items-center justify-content-center">
                  <i class="bx bx-user"></i>
                </span>
              @endif
            </td>
            <td><strong>{{ $testimonial->name }}</strong></td>
            <td>{{ $testimonial->designation ?? '—' }}</td>
            <td class="text-break" style="max-width:280px">{{ Str::limit($testimonial->description, 80) }}</td>
            <td class="text-end">
              <div class="dropdown">
                <button type="button" class="btn btn-sm btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                  <a class="dropdown-item" href="{{ route('admin.content.testimonials.edit', $testimonial) }}">
                    <i class="bx bx-edit-alt me-1"></i> Edit
                  </a>
                  <form action="{{ route('admin.content.testimonials.destroy', $testimonial) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this testimonial?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item text-danger">
                      <i class="bx bx-trash me-1"></i> Delete
                    </button>
                  </form>
                </div>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center py-6 text-body-secondary">No testimonials yet. <a href="{{ route('admin.content.testimonials.create') }}">Add one</a>.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  @if($testimonials->hasPages())
    <div class="card-footer d-flex justify-content-end">
      {{ $testimonials->links('pagination::bootstrap-5') }}
    </div>
  @endif
</div>
@endsection
