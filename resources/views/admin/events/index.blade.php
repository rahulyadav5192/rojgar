@extends('admin.layouts.app')

@section('title', 'Events')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
    <h5 class="mb-0">Events</h5>
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
      <i class="icon-base bx bx-plus me-1"></i> Add Event
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
          <th>Location</th>
          <th>Date</th>
          <th>Timing</th>
          <th>Status</th>
          <th>Who can apply</th>
          <th>Featured</th>
          <th class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse($events as $event)
          <tr>
            <td>
              @if($event->image)
                <img src="{{ \Illuminate\Support\Str::startsWith($event->image, ['uploads/', 'assets/']) ? asset($event->image) : asset('storage/'.$event->image) }}" alt="" class="rounded" style="width:48px;height:48px;object-fit:cover" />
              @else
                <span class="avatar avatar-sm rounded bg-label-secondary d-inline-flex align-items-center justify-content-center">
                  <i class="icon-base bx bx-calendar"></i>
                </span>
              @endif
            </td>
            <td><strong>{{ $event->title }}</strong></td>
            <td>{{ $event->location ?? '—' }}</td>
            <td>
              {{ $event->start_date->format('M d, Y') }}
              @if($event->end_date && $event->end_date->ne($event->start_date))
                – {{ $event->end_date->format('M d, Y') }}
              @endif
            </td>
            <td>{{ $event->timing ?? '—' }}</td>
            <td>
              @if($event->status === 'published')
                <span class="badge bg-label-success">Published</span>
              @elseif($event->status === 'cancelled')
                <span class="badge bg-label-danger">Cancelled</span>
              @else
                <span class="badge bg-label-secondary">Draft</span>
              @endif
            </td>
            <td>{{ \App\Models\Event::whoCanApplyOptions()[$event->who_can_apply] ?? $event->who_can_apply }}</td>
            <td>
              @if($event->featured)
                <span class="badge bg-label-warning">Featured</span>
              @else
                <span class="text-body-secondary">—</span>
              @endif
            </td>
            <td class="text-end">
              <div class="dropdown">
                <button type="button" class="btn btn-sm btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="icon-base bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                  <a class="dropdown-item" href="{{ route('admin.events.edit', $event) }}">
                    <i class="icon-base bx bx-edit-alt me-1"></i> Edit
                  </a>
                  <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this event?');">
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
            <td colspan="9" class="text-center py-6 text-body-secondary">No events yet. <a href="{{ route('admin.events.create') }}">Add one</a>.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  @if($events->hasPages())
    <div class="card-footer d-flex justify-content-end">
      {{ $events->links('pagination::bootstrap-5') }}
    </div>
  @endif
</div>
@endsection
