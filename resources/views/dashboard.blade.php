@extends("layouts.app")
@section('title', 'Dashboard')
@section('content')
  <div class="py-4">
    <div iv class="dropdown">
      <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
        <a class="dropdown-item d-flex align-items-center" href="#">
          <svg class="dropdown-icon me-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
          </svg>
          Add User
        </a>
        <a class="dropdown-item d-flex align-items-center" href="#">
          <svg class="dropdown-icon me-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
          </svg>
          Add Widget
        </a>
        <a class="dropdown-item d-flex align-items-center" href="#">
          <svg class="dropdown-icon me-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z">
            </path>
            <path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path>
          </svg>
          Upload Files
        </a>
        <a class="dropdown-item d-flex align-items-center" href="#">
          <svg class="dropdown-icon me-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
              clip-rule="evenodd"></path>
          </svg>
          Preview Security
        </a>
        <div role="separator" class="dropdown-divider my-1"></div>
        <a class="dropdown-item d-flex align-items-center" href="#">
          <svg class="dropdown-icon text-danger me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z"
              clip-rule="evenodd"></path>
          </svg>
          Upgrade to Pro
        </a>
      </div>
    </div>
  </div>
  <div class="row">

    <div class="col-12 col-sm-6 col-xl-4 mb-4">
      <div class="card border-0 shadow">
        <div class="card-body">
          <div class="row d-block d-xl-flex align-items-center">
            <div class="col-12 col-xl-5 text-xl-center mb-xl-0 d-flex align-items-center justify-content-xl-center mb-3">
              <div class="icon-shape icon-shape-primary me-4 me-sm-0 rounded">
                <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                  </path>
                </svg>
              </div>
              <div class="d-sm-none">
                <h2 class="h5">Employees</h2>
                <h3 class="fw-extrabold mb-1">{{ $usersCount }}</h3>
              </div>
            </div>
            <div class="col-12 col-xl-7 px-xl-0">
              <div class="d-none d-sm-block">
                <h2 class="h6 mb-0 text-gray-400">Employees</h2>
                <h3 class="fw-extrabold mb-2">{{ $usersCount }}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-4 mb-4">
      <div class="card border-0 shadow">
        <div class="card-body">
          <div class="row d-block d-xl-flex align-items-center">
            <div class="col-12 col-xl-5 text-xl-center mb-xl-0 d-flex align-items-center justify-content-xl-center mb-3">
              <div class="icon-shape icon-shape-secondary me-4 me-sm-0 rounded">
                <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                    clip-rule="evenodd"></path>
                </svg>
              </div>
              <div class="d-sm-none">
                <h2 class="fw-extrabold h5">Departments</h2>
                <h3 class="mb-1">{{ $deptsCount }}</h3>
              </div>
            </div>
            <div class="col-12 col-xl-7 px-xl-0">
              <div class="d-none d-sm-block">
                <h2 class="h6 mb-0 text-gray-400">Departments</h2>
                <h3 class="fw-extrabold mb-2">{{ $deptsCount }}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-4 mb-4">
      <div class="card border-0 shadow">
        <div class="card-body">
          <div class="row d-block d-xl-flex align-items-center">
            <div class="col-12 col-xl-5 text-xl-center mb-xl-0 d-flex align-items-center justify-content-xl-center mb-3">
              <div class="icon-shape icon-shape-tertiary me-4 me-sm-0 rounded">
                <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd"></path>
                </svg>
              </div>
              <div class="d-sm-none">
                <h2 class="fw-extrabold h5"> Jobs</h2>
                <h3 class="mb-1">{{ $jobsCount }}</h3>
              </div>
            </div>
            <div class="col-12 col-xl-7 px-xl-0">
              <div class="d-none d-sm-block">
                <h2 class="h6 mb-0 text-gray-400"> Jobs</h2>
                <h3 class="fw-extrabold mb-2">{{ $jobsCount }}</h3>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12 col-xl-12">
      <div class="row">
        <div class="col-12 mb-4">
          <div class="card border-0 shadow">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col">
                  <h2 class="fs-5 fw-bold mb-0">Employees</h2>
                </div>
                <div class="col text-end">
                  <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="align-items-center table-flush table">
                <thead>
                  <tr>
                    <th class="border-gray-200">#</th>
                    <th class="border-gray-200">Full Name</th>
                    <th class="border-gray-200">Email</th>
                    <th class="border-gray-200">Job</th>
                    <th class="border-gray-200">Department</th>
                  </tr>
                </thead>
                <tbody>

                  @forelse ($users as $user)
                    <tr>
                      <td class="fw-bold">{{ $loop->iteration }}</td>
                      <td><span class="fw-normal">{{ $user->full_name }}</span></td>
                      <td><span class="fw-normal">{{ $user->email }}</span></td>
                      <td><span class="fw-normal text-success">{{ $user->job->title ?? 'Null' }}</span></td>
                      <td><span class="fw-normal text-info">{{ $user->job->department->name ?? 'Null' }}</span></td>
                    </tr>
                  @empty
                  @endforelse



                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
