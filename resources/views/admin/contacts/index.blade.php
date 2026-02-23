@extends('admin.layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
    <h5 class="mb-0">Contact Us Submissions</h5>
  </div>

  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Subject</th>
          <th>Message</th>
          <th>Submitted At</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse($contacts as $contact)
          <tr>
            <td>{{ $contact->id }}</td>
            <td><strong>{{ $contact->name }}</strong></td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->subject ?: '—' }}</td>
            <td style="max-width: 420px; white-space: normal;">
              {{ \Illuminate\Support\Str::limit($contact->message, 180) }}
            </td>
            <td>{{ $contact->created_at?->format('M d, Y h:i A') }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center py-6 text-body-secondary">No contact submissions yet.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  @if($contacts->hasPages())
    <div class="card-footer d-flex justify-content-end">
      {{ $contacts->links('pagination::bootstrap-5') }}
    </div>
  @endif
</div>
@endsection

