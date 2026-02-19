@extends('admin.layouts.app')

@section('title', 'Speakers – Home Content')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
    <h5 class="mb-0">Our Speakers</h5>
    <a href="{{ route('admin.content.speakers.create') }}" class="btn btn-primary">
      <i class="bx bx-plus me-1"></i> Add Speaker
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
          <th class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse($speakers as $speaker)
          <tr>
            <td>
              @if($speaker->image)
                <img src="{{ asset('storage/'.$speaker->image) }}" alt="" class="rounded" style="width:48px;height:48px;object-fit:cover" />
              @else
                <span class="avatar avatar-sm rounded bg-label-secondary d-inline-flex align-items-center justify-content-center">
                  <i class="bx bx-user"></i>
                </span>
              @endif
            </td>
            <td><strong>{{ $speaker->name }}</strong></td>
            <td>{{ $speaker->designation ?? '—' }}</td>
            <td class="text-end">
              <div class="dropdown">
                <button type="button" class="btn btn-sm btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                  <a class="dropdown-item" href="{{ route('admin.content.speakers.edit', $speaker) }}">
                    <i class="bx bx-edit-alt me-1"></i> Edit
                  </a>
                  <form action="{{ route('admin.content.speakers.destroy', $speaker) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this speaker?');">
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
            <td colspan="4" class="text-center py-6 text-body-secondary">No speakers yet. <a href="{{ route('admin.content.speakers.create') }}">Add one</a>.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  @if($speakers->hasPages())
    <div class="card-footer d-flex justify-content-end">
      {{ $speakers->links('pagination::bootstrap-5') }}
    </div>
  @endif
</div>
@endsection
