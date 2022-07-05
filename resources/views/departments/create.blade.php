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
                <li class="breadcrumb-item"><a href="{{ route('departments.index') }}">{{ $title
                        }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
        <h2 class="h4">Create New {{ $title }}s</h2>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('departments.index') }}"
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
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-4">
                    <label for="name">Department Name</label>
                    <input type="name" class="form-control" id="name" aria-describedby="name"
                        name="name">
                    @error("name")
                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
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