<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register - EventUp</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/line-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nivo-lightbox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        /* Registration page custom styles */
        /* Sticky white header */
        #header-wrap {
            position: sticky;
            top: 0;
            z-index: 1050;
            background: #fff !important;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        #header-wrap .navbar {
            background: #fff !important;
            padding: 0.5rem 0;
            box-shadow: none;
        }
        #header-wrap .navbar-brand img {
            max-height: 32px;
        }
        #header-wrap .navbar-nav .nav-link {
            font-size: 15px;
            padding: 0.5rem 1rem;
        }
        /* Hamburger menu background */
        .navbar-collapse.collapse.show {
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            z-index: 999;
        }
        /* Card header and form text smaller */
        .card-header h4 {
            font-size: 1.3rem;
            font-weight: 600;
        }
        .card {
            border-radius: 12px;
        }
        /* Form input alignment and spacing */
        .form-row {
            margin-bottom: 0.5rem;
        }
        .form-group label {
            font-size: 0.95rem;
            font-weight: 500;
        }
        .form-control {
            font-size: 0.95rem;
            border-radius: 6px;
            padding: 0.5rem 0.75rem;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .card-body {
            padding: 2rem;
        }
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .card-body {
                padding: 1rem;
            }
            .card-header h4 {
                font-size: 1.1rem;
            }
            /* Fix for select dropdown position on iOS/mobile */
            .card,
            .card-body {
                box-shadow: none !important;
                border-radius: 0 !important;
                overflow: visible !important;
                transform: none !important;
                will-change: auto !important;
            }
            .container,
            body {
                overflow: visible !important;
                transform: none !important;
                will-change: auto !important;
            }
        }
    </style>
</head>
<body>
@include('partials.header-inner')

<div class="container mt-5 mb-5 py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Register for {{ $event->title }}</h4>
                </div>
                <div class="card-body">
                    {{-- SweetAlert will handle success message --}}
                    <form id="registrationForm" action="{{ route('event-registration.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="event_id" value="{{ $event->id }}">

                        <h6 class="mb-3 text-primary font-weight-bold">Personal Details</h6>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" placeholder="Enter your full name" required>
                                @error('full_name')<span class="invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Gender <span class="text-danger">*</span></label>
                                <select class="form-control @error('gender') is-invalid @enderror" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male" {{ old('gender') === 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender') === 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ old('gender') === 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('gender')<span class="invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Aadhaar Number</label>
                                <input type="text" class="form-control @error('aadhaar_number') is-invalid @enderror" name="aadhaar_number" value="{{ old('aadhaar_number') }}" placeholder="12-digit Aadhaar">
                                @error('aadhaar_number')<span class="invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Phone Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" placeholder="10-digit number" required>
                                @error('phone_number')<span class="invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email_address') is-invalid @enderror" name="email_address" value="{{ old('email_address') }}" placeholder="your@email.com" required>
                            @error('email_address')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>

                        <hr>
                        <h6 class="mb-3 text-primary font-weight-bold">Educational Details</h6>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>College/University</label>
                                <input type="text" class="form-control @error('college_university') is-invalid @enderror" name="college_university" value="{{ old('college_university') }}" placeholder="Institution name">
                                @error('college_university')<span class="invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Qualification</label>
                                <select class="form-control @error('qualification') is-invalid @enderror" name="qualification">
                                    <option value="">Select Qualification</option>
                                    <option value="10th" {{ old('qualification') === '10th' ? 'selected' : '' }}>10th Pass</option>
                                    <option value="12th" {{ old('qualification') === '12th' ? 'selected' : '' }}>12th Pass</option>
                                    <option value="Diploma" {{ old('qualification') === 'Diploma' ? 'selected' : '' }}>Diploma</option>
                                    <option value="Bachelor" {{ old('qualification') === 'Bachelor' ? 'selected' : '' }}>Bachelor's Degree</option>
                                    <option value="Master" {{ old('qualification') === 'Master' ? 'selected' : '' }}>Master's Degree</option>
                                </select>
                                @error('qualification')<span class="invalid-feedback">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <hr>
                        <h6 class="mb-3 text-primary font-weight-bold">Additional Information</h6>
                        <div class="form-group">
                            <label>Referred By</label>
                            <input type="text" class="form-control" name="referred_by" value="{{ old('referred_by') }}" placeholder="Who referred you?">
                        </div>
                        <div class="form-group">
                            <label>Upload Resume <small class="text-muted">(PDF, DOC, DOCX - Max 5MB)</small></label>
                            <input type="file" class="form-control @error('resume') is-invalid @enderror" name="resume" accept=".pdf,.doc,.docx">
                            @error('resume')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                        @if($event->type === 'International')
                        <div class="form-group">
                            <label>Passport Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('passport_number') is-invalid @enderror" name="passport_number" value="{{ old('passport_number') }}" placeholder="Enter passport number" required>
                            @error('passport_number')<span class="invalid-feedback">{{ $message }}</span>@enderror
                        </div>
                        @endif
                        <div class="form-group text-right">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit Registration</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.footer')
<script src="{{ asset('assets/js/jquery-min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nav.js') }}"></script>
<script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/js/wow.js') }}"></script>
<script src="{{ asset('assets/js/nivo-lightbox.js') }}"></script>
<script src="{{ asset('assets/js/video.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
<script src="{{ asset('assets/js/contact-form-script.min.js') }}"></script>
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('registration_success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Registration Successful',
            text: @json(session('registration_success')),
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    });
</script>
@endif
</body>
</html>
