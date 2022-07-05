@extends('layouts.app')

@section('title', $title . 's')

@section('content')
  {{-- header --}}
  <div class="d-flex justify-content-between flex-md-nowrap align-items-center flex-wrap py-4">
    <div class="d-block mb-md-0 mb-4">
      <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
          <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">
              <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                </path>
              </svg>
            </a>
          </li>
          <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ $title }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
      </nav>
      <h2 class="h4">Add New {{ $title }}s</h2>
    </div>
    <div class="btn-toolbar mb-md-0 mb-2">
      <a href="{{ route('users.index') }}" class="btn btn-sm btn-gray-300 d-inline-flex align-items-center animate-left-5">
        <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Go Back
      </a>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-12 col-xl-8">

      <div class="card card-body mb-4 border-0 shadow">

        <div>
          <div class="row mb-2">
            <div class="col-md-4">
              <h5 class="text-muted">#ID:</h5>
            </div>
            <div class="col-md-6">
              <h5 class="text-primary">{{ $user->id }}</h5>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <h5 class="text-muted">First Name:</h5>
            </div>
            <div class="col-md-6">
              <h5 class="text-primary">{{ $user->first_name }}</h5>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <h5 class="text-muted">Last Name:</h5>
            </div>
            <div class="col-md-6">
              <h5 class="text-primary">{{ $user->last_name }}</h5>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <h5 class="text-muted">Gender:</h5>
            </div>
            <div class="col-md-6">
              <h5 class="text-primary">{{ $user->gender ? 'Female' : 'Male' }}</h5>
            </div>
          </div>

          <div class="row mb-2">
            <div class="col-md-4">
              <h5 class="text-muted">Email:</h5>
            </div>
            <div class="col-md-6">
              <h5 class="text-primary">{{ $user->email ?? '---' }}</h5>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <h5 class="text-muted">Phone Number:</h5>
            </div>
            <div class="col-md-6">
              <h5 class="text-primary">{{ $user->number }}</h5>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <h5 class="text-muted">Address:</h5>
            </div>
            <div class="col-md-6">
              <h5 class="text-primary">{{ $user->address }}</h5>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <h5 class="text-muted">Sallary:</h5>
            </div>
            <div class="col-md-6">
              <h5 class="text-primary">{{ $user->sallary ?? '---' }}</h5>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="col-12 col-xl-4">
      <div class="row">
        <div class="col-12 mb-4">
          <div class="card border-0 p-0 text-center shadow">
            <div wire:ignore.self class="profile-cover rounded-top" data-background="../assets/img/profile-cover.jpg"></div>
            <div class="card-body pb-5">
              <img class="avatar-xl rounded-circle mt-n7 mx-auto mb-4"
                src="https://ui-avatars.com/api/?background=random&name={{ $user->first_name
                    ? $user->full_name
                    : "
                                                                                                                                User Name" }}"
                alt="{{ $user->first_name
                    ? $user->full_name
                    : "
                                                                                                                                User Name" }}">
              <h4 class="h3">
                {{ $user->first_name ? $user->full_name : 'User Name' }}
              </h4>
              @if ($user->is_admin)
                <h5 class="fw-normal">System Admin</h5>
              @else
                <h5 class="fw-normal">{{ $user->job->title }}</h5>
                <p class="text-gray mb-4">{{ $user->address }}</p>
              @endif
              <div class="d-inline-flex align-items-center">
                <div>
                  <a class="btn btn-outline-info me-3" href="{{ route('users.edit', $user->id) }}">Edit</a>
                </div>
                <div>
                  <form action="{{ route('users.destroy', $user->id) }}" method="POST" id="myForm_{{ $user->id }}">
                    @method('DELETE')
                    @csrf
                  </form>
                  <a class="btn btn-outline-danger" href="javasript:void()" onclick="Swal.fire({
                                                                                              title: 'Are you sure?',
                                                                                              text: `You won't be able to revert this!`,
                                                                                              icon: 'warning',
                                                                                              showCancelButton: true,
                                                                                              confirmButtonText: 'Yes, delete it'
                                                                                              }).then((result) => {
                                                                                              if (result.isConfirmed) {
                                                                                              document.getElementById('myForm_{{ $user->id }}').submit();
                                                                                                                      }
                                                                                              })
                                                                                          ">Delete</a>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
