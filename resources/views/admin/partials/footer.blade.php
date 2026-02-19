<footer class="content-footer footer bg-footer-theme">
  <div class="container-xxl">
    <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
      <div class="mb-2 mb-md-0">
        &copy; {{ date('Y') }}, made with &hearts; by <a href="{{ url('/') }}" target="_blank" class="footer-link">{{ config('app.name') }}</a>
      </div>
      <div class="d-none d-lg-inline-block">
        <a href="{{ route('admin.dashboard') }}" class="footer-link me-4">Dashboard</a>
        <a href="{{ route('admin.logout') }}" class="footer-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
      </div>
    </div>
  </div>
</footer>
