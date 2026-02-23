@extends('admin.layouts.app')

@section('title', 'Registration Details')

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
  <h5 class="mb-0">Registration #{{ $registration->id }}</h5>
  <div class="d-flex gap-2">
    <a href="{{ route('admin.registrations.index') }}" class="btn btn-outline-secondary">Back to list</a>
    <a href="{{ route('admin.registrations.edit', $registration) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('admin.registrations.destroy', $registration) }}" method="POST" onsubmit="return confirm('Delete this registration?');">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-outline-danger">Delete</button>
    </form>
  </div>
</div>

@if(session('success'))
  <div class="alert alert-success alert-dismissible mb-4" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
@endif

<div class="row g-4">
  <div class="col-lg-8">
    <div class="card h-100">
      <div class="card-header">
        <h6 class="mb-0">Candidate Details</h6>
      </div>
      <div class="card-body">
        <div class="row g-3">
          <div class="col-md-6">
            <small class="text-body-secondary d-block">Full Name</small>
            <div>{{ $registration->full_name }}</div>
          </div>
          <div class="col-md-6">
            <small class="text-body-secondary d-block">Gender</small>
            <div>{{ $registration->gender }}</div>
          </div>
          <div class="col-md-6">
            <small class="text-body-secondary d-block">Aadhaar Number</small>
            <div>{{ $registration->aadhaar_number }}</div>
          </div>
          <div class="col-md-6">
            <small class="text-body-secondary d-block">Phone Number</small>
            <div>{{ $registration->phone_number }}</div>
          </div>
          <div class="col-md-6">
            <small class="text-body-secondary d-block">Email Address</small>
            <div>{{ $registration->email_address }}</div>
          </div>
          <div class="col-md-6">
            <small class="text-body-secondary d-block">College/University</small>
            <div>{{ $registration->college_university }}</div>
          </div>
          <div class="col-md-6">
            <small class="text-body-secondary d-block">Qualification</small>
            <div>{{ $registration->qualification }}</div>
          </div>
          <div class="col-md-6">
            <small class="text-body-secondary d-block">Passport Number</small>
            <div>{{ $registration->passport_number ?: '—' }}</div>
          </div>
          <div class="col-md-6">
            <small class="text-body-secondary d-block">Referred By</small>
            <div>{{ $registration->referred_by ?: '—' }}</div>
          </div>
          <div class="col-md-6">
            <small class="text-body-secondary d-block">Has Certifications</small>
            <div>{{ $registration->has_certifications ? 'Yes' : 'No' }}</div>
          </div>
          <div class="col-12">
            <small class="text-body-secondary d-block">Certifications Detail</small>
            <div>{{ $registration->certifications_detail ?: '—' }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card mb-4">
      <div class="card-header">
        <h6 class="mb-0">Event Info</h6>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <small class="text-body-secondary d-block">Event</small>
          <div>{{ $registration->event?->title ?? '—' }}</div>
        </div>
        <div class="mb-3">
          <small class="text-body-secondary d-block">Type</small>
          <div>{{ $registration->event?->type ?? '—' }}</div>
        </div>
        <div class="mb-3">
          <small class="text-body-secondary d-block">Registered At</small>
          <div>{{ $registration->created_at?->format('M d, Y h:i A') }}</div>
        </div>
        <div>
          <small class="text-body-secondary d-block">Last Updated</small>
          <div>{{ $registration->updated_at?->format('M d, Y h:i A') }}</div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h6 class="mb-0">Document</h6>
      </div>
      <div class="card-body">
        @if($registration->resume_url)
          <p class="small text-body-secondary mb-2">Resume / Document</p>
          <div class="d-flex gap-2 mb-3">
            <a href="{{ $registration->resume_url }}" target="_blank" class="btn btn-sm btn-outline-primary">Open</a>
            <a href="{{ $registration->resume_url }}" target="_blank" class="btn btn-sm btn-outline-secondary">Download</a>
          </div>
          <small class="text-body-secondary d-block mb-2">Doc URL (for export)</small>
          <code class="small">{{ $registration->resume_url }}</code>

          @if($registration->resume_is_image)
            <div class="mt-3">
              <img src="{{ $registration->resume_url }}" alt="Resume" class="img-fluid rounded border" />
            </div>
          @endif
        @else
          <span class="text-body-secondary">No document uploaded.</span>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
