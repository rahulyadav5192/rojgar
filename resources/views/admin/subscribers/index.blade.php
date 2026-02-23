@extends('admin.layouts.app')

@section('title', 'Subscribers')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
    <h5 class="mb-0">Email Subscribers</h5>
  </div>

  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Email</th>
          <th>Subscribed At</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse($subscribers as $subscriber)
          <tr>
            <td>{{ $subscriber->id }}</td>
            <td><strong>{{ $subscriber->email }}</strong></td>
            <td>{{ $subscriber->created_at?->format('M d, Y h:i A') }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="3" class="text-center py-6 text-body-secondary">No subscribers yet.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  @if($subscribers->hasPages())
    <div class="card-footer d-flex justify-content-end">
      {{ $subscribers->links('pagination::bootstrap-5') }}
    </div>
  @endif
</div>
@endsection

