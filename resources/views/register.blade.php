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
        #header-wrap {
            position: sticky;
            top: 0;
            z-index: 1050;
            background: #fff !important;
            box-shadow: 0 2px 10px rgba(15, 23, 42, 0.08);
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

        .header-inner-spacer {
            height: 78px;
        }

        .navbar-collapse.collapse.show {
            background: #fff;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            z-index: 999;
        }

        body {
            background: linear-gradient(180deg, #f6f9ff 0%, #f4f8fb 45%, #eef4ff 100%);
        }

        .register-page {
            padding: 44px 0 70px;
            margin-top: 10px;
        }

        .register-shell {
            max-width: 940px;
        }

        .register-card {
            border: 0;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 24px 50px rgba(15, 23, 42, 0.14);
            background: #fff;
        }

        .register-card .card-header {
            border: 0;
            padding: 22px 28px;
            background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 45%, #3b82f6 100%);
        }

        .register-card .card-header h4 {
            font-size: 1.45rem;
            font-weight: 700;
            margin-bottom: 0;
        }

        .register-card .card-body {
            padding: 28px;
        }

        .form-section {
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 18px 18px 8px;
            margin-bottom: 18px;
            background: #f8fbff;
        }

        .form-section-title {
            font-size: 0.96rem;
            font-weight: 700;
            color: #1e3a8a;
            letter-spacing: 0.03em;
            text-transform: uppercase;
            margin-bottom: 14px;
        }

        .form-row {
            margin-bottom: 0;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            font-size: 0.95rem;
            padding: 0.62rem 0.85rem;
            box-shadow: none;
            transition: border-color .18s ease, box-shadow .18s ease;
            background: #fff;
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.16);
        }

        .form-group {
            margin-bottom: 1.1rem;
        }

        .form-group label {
            display: block;
            font-size: 0.9rem;
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.45rem;
        }

        .form-group .text-muted {
            font-size: 0.78rem;
        }

        .form-control[type="file"] {
            height: auto;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .form-actions {
            margin-top: 8px;
            text-align: right;
        }

        .form-actions .btn {
            border-radius: 10px;
            font-weight: 600;
            padding: 0.55rem 1.1rem;
            min-width: 130px;
        }

        .form-actions .btn + .btn {
            margin-left: 10px;
        }

        .form-actions .btn-outline-secondary {
            color: #000 !important;
            border-color: #94a3b8;
            background: #fff;
        }

        .form-actions .btn-outline-secondary:hover,
        .form-actions .btn-outline-secondary:focus {
            color: #000 !important;
            background: #f1f5f9;
            border-color: #64748b;
        }

        @media (min-width: 768px) {
            .form-row .form-group {
                display: flex;
                flex-direction: column;
            }

            .form-row .form-group label {
                min-height: 42px;
            }

            .form-row .form-group .form-control:not([type="file"]) {
                height: 44px;
            }
        }

        @media (max-width: 768px) {
            .register-page {
                padding: 24px 0 40px;
            }

            .register-card .card-header {
                padding: 18px 18px;
            }

            .register-card .card-header h4 {
                font-size: 1.1rem;
            }

            .register-card .card-body {
                padding: 16px;
            }

            .form-section {
                padding: 14px 12px 4px;
            }

            .form-actions .btn {
                min-width: 120px;
            }
        }
    </style>
</head>
<body>
@include('partials.header-inner')

<div class="register-page">
    <div class="container register-shell">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card register-card">
                    <div class="card-header text-white">
                    <h4 class="mb-0">Register for {{ $event->title }}</h4>
                    </div>
                    <div class="card-body">
                        {{-- SweetAlert will handle success message --}}
                        <form id="registrationForm" action="{{ route('event-registration.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="event_id" value="{{ $event->id }}">

                            <section class="form-section">
                                <h6 class="form-section-title">Personal Details</h6>
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
                                        <label>Aadhaar Number <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('aadhaar_number') is-invalid @enderror" name="aadhaar_number" value="{{ old('aadhaar_number') }}" placeholder="12-digit Aadhaar" required>
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
                            </section>

                            <section class="form-section">
                                <h6 class="form-section-title">Educational Details</h6>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>College/University <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('college_university') is-invalid @enderror" name="college_university" value="{{ old('college_university') }}" placeholder="Institution name" required>
                                        @error('college_university')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Qualification <span class="text-danger">*</span></label>
                                        <select class="form-control @error('qualification') is-invalid @enderror" name="qualification" required>
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
                            </section>

                            <section class="form-section">
                                <h6 class="form-section-title">Additional Information</h6>
                                <div class="form-group">
                                    <label>Referred By</label>
                                    <input type="text" class="form-control" name="referred_by" value="{{ old('referred_by') }}" placeholder="Who referred you?">
                                </div>
                                <div class="form-group">
                                    <label>Upload Resume <span class="text-danger">*</span> <small class="text-muted">(PDF or Image - Max 5MB)</small></label>
                                    <input type="file" class="form-control @error('resume') is-invalid @enderror" name="resume" accept=".pdf,.jpg,.jpeg,.png,.webp" required>
                                    @error('resume')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                                @if($event->type === 'International')
                                <div class="form-group">
                                    <label>Passport Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('passport_number') is-invalid @enderror" name="passport_number" value="{{ old('passport_number') }}" placeholder="Enter passport number" required>
                                    @error('passport_number')<span class="invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                                @endif
                            </section>

                            <div class="form-actions">
                                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Submit Registration</button>
                            </div>
                        </form>
                    </div>
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
