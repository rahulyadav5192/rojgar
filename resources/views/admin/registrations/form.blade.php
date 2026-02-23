@extends('admin.layouts.app')

@section('title', 'Edit Registration')

@section('content')
<div class="row">
  <div class="col-xl-10">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Edit Registration #{{ $registration->id }}</h5>
        <a href="{{ route('admin.registrations.show', $registration) }}" class="btn btn-outline-secondary btn-sm">Back to details</a>
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

        <form action="{{ route('admin.registrations.update', $registration) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="row">
            <div class="col-md-6 mb-4">
              <label class="form-label" for="event_id">Event <span class="text-danger">*</span></label>
              <select class="form-select @error('event_id') is-invalid @enderror" id="event_id" name="event_id" required>
                @foreach($events as $event)
                  <option value="{{ $event->id }}" data-type="{{ $event->type }}" {{ (string) old('event_id', $registration->event_id) === (string) $event->id ? 'selected' : '' }}>
                    {{ $event->title }} ({{ $event->type }})
                  </option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6 mb-4">
              <label class="form-label" for="full_name">Full Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name" value="{{ old('full_name', $registration->full_name) }}" required />
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-4">
              <label class="form-label" for="gender">Gender <span class="text-danger">*</span></label>
              <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender" required>
                @foreach(['Male', 'Female', 'Other'] as $gender)
                  <option value="{{ $gender }}" {{ old('gender', $registration->gender) === $gender ? 'selected' : '' }}>{{ $gender }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6 mb-4">
              <label class="form-label" for="aadhaar_number">Aadhaar Number <span class="text-danger">*</span></label>
              <input type="text" class="form-control @error('aadhaar_number') is-invalid @enderror" id="aadhaar_number" name="aadhaar_number" value="{{ old('aadhaar_number', $registration->aadhaar_number) }}" required />
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-4">
              <label class="form-label" for="phone_number">Phone Number <span class="text-danger">*</span></label>
              <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number', $registration->phone_number) }}" required />
            </div>
            <div class="col-md-6 mb-4">
              <label class="form-label" for="email_address">Email Address <span class="text-danger">*</span></label>
              <input type="email" class="form-control @error('email_address') is-invalid @enderror" id="email_address" name="email_address" value="{{ old('email_address', $registration->email_address) }}" required />
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-4">
              <label class="form-label" for="college_university">College/University <span class="text-danger">*</span></label>
              <input type="text" class="form-control @error('college_university') is-invalid @enderror" id="college_university" name="college_university" value="{{ old('college_university', $registration->college_university) }}" required />
            </div>
            <div class="col-md-6 mb-4">
              <label class="form-label" for="qualification">Qualification <span class="text-danger">*</span></label>
              <input type="text" class="form-control @error('qualification') is-invalid @enderror" id="qualification" name="qualification" value="{{ old('qualification', $registration->qualification) }}" required />
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-4">
              <label class="form-label" for="passport_number">Passport Number</label>
              <input type="text" class="form-control @error('passport_number') is-invalid @enderror" id="passport_number" name="passport_number" value="{{ old('passport_number', $registration->passport_number) }}" />
              <small id="passport_help" class="text-body-secondary d-block mt-1"></small>
            </div>
            <div class="col-md-6 mb-4">
              <label class="form-label" for="referred_by">Referred By</label>
              <input type="text" class="form-control @error('referred_by') is-invalid @enderror" id="referred_by" name="referred_by" value="{{ old('referred_by', $registration->referred_by) }}" />
            </div>
          </div>

          <div class="mb-4">
            <div class="form-check">
              <input class="form-check-input @error('has_certifications') is-invalid @enderror" type="checkbox" id="has_certifications" name="has_certifications" value="1" {{ old('has_certifications', $registration->has_certifications) ? 'checked' : '' }}>
              <label class="form-check-label" for="has_certifications">Has Certifications</label>
            </div>
          </div>

          <div class="mb-4">
            <label class="form-label" for="certifications_detail">Certifications Detail</label>
            <textarea class="form-control @error('certifications_detail') is-invalid @enderror" id="certifications_detail" name="certifications_detail" rows="3">{{ old('certifications_detail', $registration->certifications_detail) }}</textarea>
          </div>

          <div class="mb-4">
            <label class="form-label" for="resume">Resume / Document (PDF or Image, Max 5MB)</label>
            <input type="file" class="form-control @error('resume') is-invalid @enderror" id="resume" name="resume" accept=".pdf,.jpg,.jpeg,.png,.webp" />
            @if($registration->resume_url)
              <div class="mt-2">
                <a href="{{ $registration->resume_url }}" target="_blank" class="btn btn-sm btn-outline-primary">View current document</a>
              </div>
            @endif
          </div>

          <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('admin.registrations.show', $registration) }}" class="btn btn-outline-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Registration</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  (function () {
    const eventSelect = document.getElementById('event_id');
    const passportInput = document.getElementById('passport_number');
    const passportLabel = document.querySelector('label[for="passport_number"]');
    const passportHelp = document.getElementById('passport_help');
    const hasCertifications = document.getElementById('has_certifications');
    const certificationsDetail = document.getElementById('certifications_detail');

    function syncPassportRule() {
      const selected = eventSelect.options[eventSelect.selectedIndex];
      const isInternational = selected && selected.dataset.type === 'International';

      passportInput.required = !!isInternational;
      passportHelp.textContent = isInternational ? 'Required for International events.' : 'Optional for Domestic events.';

      if (isInternational) {
        passportLabel.innerHTML = 'Passport Number <span class="text-danger">*</span>';
      } else {
        passportLabel.textContent = 'Passport Number';
      }
    }

    function syncCertificationDetail() {
      if (!hasCertifications) {
        return;
      }

      const enabled = hasCertifications.checked;
      certificationsDetail.disabled = !enabled;

      if (!enabled) {
        certificationsDetail.value = '';
      }
    }

    if (eventSelect) {
      eventSelect.addEventListener('change', syncPassportRule);
      syncPassportRule();
    }

    if (hasCertifications && certificationsDetail) {
      hasCertifications.addEventListener('change', syncCertificationDetail);
      syncCertificationDetail();
    }
  })();
</script>
@endpush
