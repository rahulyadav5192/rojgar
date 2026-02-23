@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-12 mb-4">
    <div class="card">
      <div class="d-flex align-items-start row">
        <div class="col-sm-8">
          <div class="card-body">
            <h5 class="card-title text-primary mb-2">Welcome back, {{ Auth::guard('admin')->user()->name }}!</h5>
            <p class="mb-3">Overview of events, registrations, blogs, and engagement in one place.</p>
            <a href="{{ url('/') }}" class="btn btn-sm btn-outline-primary" target="_blank">View Site</a>
          </div>
        </div>
        <div class="col-sm-4 text-center">
          <div class="card-body pb-0">
            <span class="avatar avatar-xl rounded bg-label-primary">
              <i class="icon-base bx bx-line-chart fs-1"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-3 col-md-6 col-12 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <span class="avatar rounded bg-label-primary mb-3"><i class="icon-base bx bx-calendar-event"></i></span>
        <h6 class="mb-1">Total Events</h6>
        <h4 class="mb-1">{{ $stats['total_events'] }}</h4>
        <small class="text-body-secondary">Published: {{ $stats['published_events'] }} | Draft: {{ $stats['draft_events'] }} | Cancelled: {{ $stats['cancelled_events'] }}</small>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 col-12 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <span class="avatar rounded bg-label-success mb-3"><i class="icon-base bx bx-user-plus"></i></span>
        <h6 class="mb-1">Total Registrations</h6>
        <h4 class="mb-1">{{ $stats['total_registrations'] }}</h4>
        <small class="text-body-secondary">Today: {{ $stats['today_registrations'] }} | This month: {{ $stats['month_registrations'] }}</small>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 col-12 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <span class="avatar rounded bg-label-info mb-3"><i class="icon-base bx bx-news"></i></span>
        <h6 class="mb-1">Total Blogs</h6>
        <h4 class="mb-1">{{ $stats['total_blogs'] }}</h4>
        <small class="text-body-secondary">Published: {{ $stats['published_blogs'] }} | Draft: {{ $stats['draft_blogs'] }}</small>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 col-12 mb-4">
    <div class="card h-100">
      <div class="card-body">
        <span class="avatar rounded bg-label-warning mb-3"><i class="icon-base bx bx-message-dots"></i></span>
        <h6 class="mb-1">Other Insights</h6>
        <h4 class="mb-1">{{ $stats['total_contacts'] }}</h4>
        <small class="text-body-secondary">Contacts | Subscribers: {{ $stats['total_subscribers'] }} | Gallery: {{ $stats['total_gallery_images'] }} | Speakers: {{ $stats['total_speakers'] }} | Sponsors: {{ $stats['total_sponsors'] }}</small>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-8 col-12 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Events vs Registrations (Last 6 Months)</h5>
      </div>
      <div class="card-body">
        <div id="eventsRegistrationsTrendChart" style="min-height: 320px;"></div>
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-12 mb-4">
    <div class="card h-100">
      <div class="card-header">
        <h5 class="mb-0">Registrations by Event</h5>
      </div>
      <div class="card-body">
        <div id="registrationsByEventChart" style="min-height: 320px;"></div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12 mb-4">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Recent Registrations</h5>
        <a href="{{ route('admin.registrations.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
      </div>
      <div class="table-responsive text-nowrap">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Name</th>
              <th>Event</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @forelse($recentRegistrations as $registration)
              <tr>
                <td><strong>{{ $registration->full_name }}</strong></td>
                <td>{{ $registration->event?->title ?? '—' }}</td>
                <td>{{ $registration->phone_number }}</td>
                <td>{{ $registration->email_address }}</td>
                <td>{{ $registration->created_at?->format('M d, Y h:i A') }}</td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="text-center text-body-secondary py-5">No registrations yet.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('admin/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script>
  (function () {
    if (typeof ApexCharts === 'undefined') {
      return;
    }

    const monthLabels = @json($chartMonthLabels);
    const eventsSeries = @json($chartEventSeries);
    const registrationsSeries = @json($chartRegistrationSeries);
    const eventLabels = @json($eventRegistrationLabels);
    const eventRegistrationCounts = @json($eventRegistrationCounts);

    const trendOptions = {
      chart: {
        type: 'line',
        height: 320,
        toolbar: { show: false },
      },
      stroke: {
        width: [0, 3],
        curve: 'smooth',
      },
      series: [
        { name: 'Events', type: 'column', data: eventsSeries },
        { name: 'Registrations', type: 'line', data: registrationsSeries },
      ],
      xaxis: {
        categories: monthLabels,
      },
      yaxis: {
        labels: {
          formatter: function (value) {
            return Math.round(value);
          }
        }
      },
      colors: ['#696cff', '#71dd37'],
      dataLabels: { enabled: false },
      legend: { position: 'top' },
      grid: { borderColor: '#eceef1' },
      plotOptions: {
        bar: { borderRadius: 4, columnWidth: '45%' }
      },
      tooltip: { shared: true }
    };

    const byEventOptions = {
      chart: {
        type: 'bar',
        height: 320,
        toolbar: { show: false },
      },
      series: [{
        name: 'Registrations',
        data: eventRegistrationCounts
      }],
      xaxis: {
        categories: eventLabels,
        labels: {
          rotate: -35,
          trim: true,
        }
      },
      colors: ['#03c3ec'],
      dataLabels: { enabled: false },
      plotOptions: {
        bar: {
          borderRadius: 4,
          horizontal: false,
          columnWidth: '55%',
        },
      },
      grid: { borderColor: '#eceef1' },
      yaxis: {
        labels: {
          formatter: function (value) {
            return Math.round(value);
          }
        }
      }
    };

    new ApexCharts(document.querySelector('#eventsRegistrationsTrendChart'), trendOptions).render();
    new ApexCharts(document.querySelector('#registrationsByEventChart'), byEventOptions).render();
  })();
</script>
@endpush
