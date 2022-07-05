<nav id="sidebarMenu" class="sidebar d-lg-block collapse bg-gray-800 text-white" data-simplebar>
  <div class="sidebar-inner px-2 pt-3">
    <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
      <div class="d-flex align-items-center">
        <div class="avatar-lg me-4">
          <img src="/assets/img/team/profile-picture-3.jpg" class="card-img-top rounded-circle border-white" alt="Bonnie Green">
        </div>
        <div class="d-block">
          <h2 class="h5 mb-3">Hi, Jane</h2>
          <a href="/login" class="btn btn-secondary btn-sm d-inline-flex align-items-center">
            <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
              </path>
            </svg>
            Sign Out
          </a>
        </div>
      </div>
      <div class="collapse-close d-md-none">
        <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
          <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </a>
      </div>
    </div>
    <ul class="nav flex-column pt-md-0 pt-3">
      {{-- <li class="nav-item">
        <a href="/dashboard" class="nav-link d-flex align-items-center">
          <span class="sidebar-icon me-3">
            <img src="/assets/img/brand/light.svg" height="20" width="20" alt="Volt Logo">
          </span>
          <span class="ms-1 sidebar-text mt-1">
            Volt Laravel
          </span>
        </a>
      </li> --}}

      {{-- USER ROUTES --}}
      @if (!auth()->user()->is_admin)
        <li class="nav-item {{ Request::routeIs('profile') ? 'active' : '' }}">
          <a href="{{ route('profile') }}" class="nav-link">
            <span class="sidebar-icon">
              <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
            </span>
            <span class="sidebar-text">Profile</span>
          </a>
        </li>

        <li class="nav-item {{ Request::routeIs('attendances.user-attendance') ? 'active' : '' }}">
          <a href="{{ route('attendances.user-attendance', auth()->id()) }}" class="nav-link">
            <span class="sidebar-icon">
              <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
              </svg>
            </span>
            <span class="sidebar-text">View Attendance</span>
          </a>
        </li>
      @endif

      @if (auth()->user()->is_admin)
        <li class="nav-item {{ Request::routeIs('dashboard') ? 'active' : '' }}">
          <a href="{{ route('dashboard') }}" class="nav-link">
            <span class="sidebar-icon"> <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
              </svg></span></span>
            <span class="sidebar-text">Dashboard</span>
          </a>
        </li>
        
        <li class="nav-item {{ Request::routeIs(' departments.*') ? 'active' : '' }}">
          <a href="{{ route('departments.index') }}" class="nav-link">
            <span class="sidebar-icon">
              <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                </path>
              </svg>
            </span>
            <span class="sidebar-text">Departments</span>
          </a>
        </li>

        <li class="nav-item {{ Request::routeIs(' jobs.*') ? 'active' : '' }}">
          <a href="{{ route('jobs.index') }}" class="nav-link">
            <span class="sidebar-icon">
              <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path>
              </svg>
            </span>
            <span class="sidebar-text">Jobs</span>
          </a>
        </li>

        <li class="nav-item {{ Request::routeIs('users.*') ? 'active' : '' }}">
          <a href="{{ route('users.index') }}" class="nav-link">
            <span class="sidebar-icon">
              <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                </path>
              </svg>
            </span>
            <span class="sidebar-text">Employees</span>
          </a>
        </li>

        <li class="nav-item {{ Request::routeIs('attendances.*') ? 'active' : '' }}">
          <span class="nav-link collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#submenu-pages">
            <span>
              <span class="sidebar-icon">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
              </span>
              <span class="sidebar-text">Attendances</span>
            </span>
            <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
              </svg></span>
          </span>
          <div class="multi-level {{ Request::routeIs('attendances.*') ? '' : 'collapse' }}" role="list" id="submenu-pages" aria-expanded="false">
            <ul class="flex-column nav">
              <li class="nav-item {{ Request::routeIs('attendances.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('attendances.index') }}">
                  <span class="sidebar-text">Attendances</span>
                </a>
              </li>
              <li class="nav-item {{ Request::routeIs('attendances.take-attendance') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('attendances.take-attendance') }}">
                  <span class="sidebar-text">Take Attendance</span>
                </a>
              </li>

            </ul>
          </div>
        </li>
      @endif
    </ul>
  </div>
</nav>
