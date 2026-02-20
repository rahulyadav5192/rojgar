<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
      @include('admin.partials.app-brand-logo')
      <span class="app-brand-text demo menu-text fw-bold ms-2">{{ config('app.name') }}</span>
    </a>
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="bx bx-chevron-left d-block d-xl-none align-middle"></i>
    </a>
  </div>
  <div class="menu-divider mt-0"></div>
  <div class="menu-inner-shadow"></div>
  <ul class="menu-inner py-1">
    <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
      <a href="{{ route('admin.dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-smile"></i>
        <div class="text-truncate" data-i18n="Dashboard">Dashboard</div>
      </a>
    </li>
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Management</span></li>
    <li class="menu-item {{ request()->routeIs('admin.events.*') ? 'active' : '' }}">
      <a href="{{ route('admin.events.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-calendar-event"></i>
        <div class="text-truncate" data-i18n="Events">Events</div>
      </a>
    </li>
    <li class="menu-item {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
      <a href="{{ route('admin.blogs.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-news"></i>
        <div class="text-truncate" data-i18n="Blogs">Blogs</div>
      </a>
    </li>
    <li class="menu-item {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
      <a href="{{ route('admin.gallery.index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-images"></i>
        <div class="text-truncate" data-i18n="Gallery">Gallery</div>
      </a>
    </li>
    <li class="menu-item {{ request()->routeIs('admin.content.*') ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-edit-alt"></i>
        <div class="text-truncate" data-i18n="Content">Content</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ request()->routeIs('admin.content.about.*') ? 'active' : '' }}">
          <a href="{{ route('admin.content.about.edit') }}" class="menu-link">
            <div class="text-truncate" data-i18n="About">About</div>
          </a>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.content.conference.*') ? 'active' : '' }}">
          <a href="{{ route('admin.content.conference.edit') }}" class="menu-link">
            <div class="text-truncate" data-i18n="Conference">Conference</div>
          </a>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.content.why.*') ? 'active' : '' }}">
          <a href="{{ route('admin.content.why.edit') }}" class="menu-link">
            <div class="text-truncate" data-i18n="Why Section">Why Section</div>
          </a>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.content.counter.*') ? 'active' : '' }}">
          <a href="{{ route('admin.content.counter.edit') }}" class="menu-link">
            <div class="text-truncate" data-i18n="Counter">Counter</div>
          </a>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.content.speakers.*') ? 'active' : '' }}">
          <a href="{{ route('admin.content.speakers.index') }}" class="menu-link">
            <div class="text-truncate" data-i18n="Speakers">Speakers</div>
          </a>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.content.footer.*') ? 'active' : '' }}">
          <a href="{{ route('admin.content.footer.edit') }}" class="menu-link">
            <div class="text-truncate" data-i18n="Footer">Footer</div>
          </a>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.content.sponsors.*') ? 'active' : '' }}">
          <a href="{{ route('admin.content.sponsors.index') }}" class="menu-link">
            <div class="text-truncate" data-i18n="Sponsors">Sponsors</div>
          </a>
        </li>
      </ul>
    </li>
    <!-- <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link">
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div class="text-truncate" data-i18n="Users">Users</div>
      </a>
    </li> -->
    <!-- <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-cog"></i>
        <div class="text-truncate" data-i18n="Settings">Settings</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="javascript:void(0);" class="menu-link">
            <div class="text-truncate" data-i18n="Account">Account</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="javascript:void(0);" class="menu-link">
            <div class="text-truncate" data-i18n="Security">Security</div>
          </a>
        </li>
      </ul>
    </li> -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Account</span></li>
    <li class="menu-item">
      <a href="{{ route('admin.logout') }}" class="menu-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="menu-icon tf-icons bx bx-power-off"></i>
        <div class="text-truncate" data-i18n="Logout">Logout</div>
      </a>
    </li>
  </ul>
</aside>
<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">@csrf</form>
