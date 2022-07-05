@extends("layouts.app")

@section("title", $title."s")

@section("content")
{{-- header --}}
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ $title
                        }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <h2 class="h4">Edit {{ $title }}</h2>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('users.index') }}"
            class="btn btn-sm btn-gray-300 d-inline-flex align-items-center animate-left-5">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Go Back
        </a>
    </div>
</div>

<div class="card card-body border-0 shadow table-wrapper table-responsive">
    <form action="{{ route('users.update',$user->id) }}" method="POST">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col-3">
                <div class="mb-4">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name"
                        value="{{ old("first_name",$user->first_name) }}">
                    @error("first_name")
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-3">
                <div class="mb-4">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name"
                        aria-describedby="last_name" name="last_name" value="{{ old("last_name",$user->last_name)
                        }}">
                    @error("last_name")
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="email"
                        name="email" value="{{ old("email",$user->email) }}" placeholder="">
                    @error("email")
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password"
                        aria-describedby="password" name="password" value="{{ old("password") }}">
                    @error("password")
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <div class="mb-4">
                    <label for="job">Job</label>
                    <select class="form-select" name="job" id="job">
                        <option value>Select Job</option>
                        @foreach ($jobs as $key=>$value)
                        <option value="{{ $key }}" @selected(old('job',$user->job_id)==$key)>{{ $value
                            }}</option>
                        @endforeach
                    </select>
                    @error("job")
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-2">
                <div class="mb-4">
                    <label for="gender">Gender</label>
                    <select class="form-select" name="gender" id="epartment">
                        <option value>Select Gender</option>
                        @php
                        $arr = [
                        "Male",
                        "Female"
                        ];
                        @endphp

                        @foreach ($arr as $key=>$value)
                        <option value="{{ $key }}" @selected(old('gender',$user->gender)==$key)>{{ $value }}
                        </option>
                        @endforeach
                    </select>
                    @error("gender")
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-2">
                <div class="mb-4">
                    <label for="sallary">Sallary</label>
                    <input type="number" class="form-control" id="sallary"
                        aria-describedby="sallary" name="sallary" value="{{ old("sallary",$user->sallary) }}">
                    @error("sallary")
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <div class="mb-4">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" aria-describedby="address"
                        name="address" value="{{ old("address",$user->address) }}">
                    @error("address")
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-3">
                <div class="mb-4">
                    <label for="number">Phone Number</label>
                    <input type="text" class="form-control" id="number" aria-describedby="number"
                        name="number" value="{{ old("number",$user->number) }}">
                    @error("number")
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mt-4 d-flex">
            <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Submit</button>
            <button class="btn btn-gray-300 mt-2 animate-up-2 ms-4" type="reset">Reset</button>
        </div>
    </form>
</div>
@endsection