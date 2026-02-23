@extends('admin.layouts.app')

@section('title', 'Registrations')

@section('content')
<div class="card mb-4">
  <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
    <h5 class="mb-0">Event Registrations</h5>
    <a href="{{ route('admin.registrations.export', request()->query()) }}" class="btn btn-outline-success">
      <i class="icon-base bx bx-export me-1"></i> Export CSV
    </a>
  </div>
  <div class="card-body border-bottom">
    <form method="GET" action="{{ route('admin.registrations.index') }}" class="row g-3 align-items-end">
      <div class="col-md-3">
        <label class="form-label" for="event_id">Event</label>
        <select class="form-select" id="event_id" name="event_id">
          <option value="">All events</option>
          @foreach($events as $event)
            <option value="{{ $event->id }}" {{ (string)($filters['event_id'] ?? '') === (string)$event->id ? 'selected' : '' }}>
              {{ $event->title }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="col-md-3">
        <label class="form-label" for="date_filter">Date</label>
        <select class="form-select" id="date_filter" name="date_filter">
          <option value="" {{ ($filters['date_filter'] ?? '') === '' ? 'selected' : '' }}>All dates</option>
          <option value="today" {{ ($filters['date_filter'] ?? '') === 'today' ? 'selected' : '' }}>Today</option>
          <option value="yesterday" {{ ($filters['date_filter'] ?? '') === 'yesterday' ? 'selected' : '' }}>Yesterday</option>
          <option value="last_7_days" {{ ($filters['date_filter'] ?? '') === 'last_7_days' ? 'selected' : '' }}>Last 7 days</option>
          <option value="custom" {{ ($filters['date_filter'] ?? '') === 'custom' ? 'selected' : '' }}>Custom date range</option>
        </select>
      </div>

      <div class="col-md-2">
        <label class="form-label" for="from_date">From</label>
        <input type="date" class="form-control custom-date" id="from_date" name="from_date" value="{{ $filters['from_date'] ?? '' }}" />
      </div>

      <div class="col-md-2">
        <label class="form-label" for="to_date">To</label>
        <input type="date" class="form-control custom-date" id="to_date" name="to_date" value="{{ $filters['to_date'] ?? '' }}" />
      </div>

      <div class="col-md-2 d-flex gap-2">
        <button type="submit" class="btn btn-primary flex-fill">
          <i class="icon-base bx bx-filter-alt me-1"></i> Filter
        </button>
        <a href="{{ route('admin.registrations.index') }}" class="btn btn-outline-secondary flex-fill">Reset</a>
      </div>
    </form>
  </div>
</div>

<div class="card">
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
          <th>#</th>
          <th>Candidate</th>
          <th>Event</th>
          <th>Contact</th>
          <th>Qualification</th>
          <th>Resume</th>
          <th>Registered At</th>
          <th class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse($registrations as $registration)
          <tr>
            <td>{{ $registration->id }}</td>
            <td>
              <strong>{{ $registration->full_name }}</strong>
              <div class="small text-body-secondary">{{ $registration->gender }}</div>
            </td>
            <td>
              <span>{{ $registration->event?->title ?? '—' }}</span>
              @if($registration->event?->type)
                <div class="small text-body-secondary">{{ $registration->event->type }}</div>
              @endif
            </td>
            <td>
              <div>{{ $registration->phone_number }}</div>
              <div class="small text-body-secondary">{{ $registration->email_address }}</div>
            </td>
            <td>{{ $registration->qualification ?: '—' }}</td>
            <td>
              @if($registration->resume_url)
                <a href="{{ $registration->resume_url }}" target="_blank" class="btn btn-sm btn-outline-primary">View</a>
              @else
                <span class="text-body-secondary">—</span>
              @endif
            </td>
            <td>{{ $registration->created_at?->format('M d, Y h:i A') }}</td>
            <td class="text-end">
              <div class="dropdown">
                <button type="button" class="btn btn-sm btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="icon-base bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                  <a class="dropdown-item" href="{{ route('admin.registrations.show', $registration) }}">
                    <i class="icon-base bx bx-show me-1"></i> Details
                  </a>
                  <a class="dropdown-item" href="{{ route('admin.registrations.edit', $registration) }}">
                    <i class="icon-base bx bx-edit-alt me-1"></i> Edit
                  </a>
                  <form action="{{ route('admin.registrations.destroy', $registration) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this registration?');">
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
            <td colspan="8" class="text-center py-6 text-body-secondary">No registrations found.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  @if($registrations->hasPages())
    <div class="card-footer d-flex justify-content-end">
      {{ $registrations->links('pagination::bootstrap-5') }}
    </div>
  @endif
</div>
@endsection

@push('scripts')
<script>
  (function () {
    const dateFilter = document.getElementById('date_filter');
    const customDateInputs = document.querySelectorAll('.custom-date');

    function toggleCustomDateFields() {
      const isCustom = dateFilter && dateFilter.value === 'custom';

      customDateInputs.forEach(function (input) {
        input.disabled = !isCustom;
      });
    }

    if (dateFilter) {
      dateFilter.addEventListener('change', toggleCustomDateFields);
      toggleCustomDateFields();
    }
  })();
</script>
@endpush
