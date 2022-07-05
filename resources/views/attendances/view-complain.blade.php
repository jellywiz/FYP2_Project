@extends("layouts.app")
@php
$title = 'User Attendances';
@endphp
@section('title', $title . 's')

@section('content')
{{-- header --}}
<div class="d-flex justify-content-between flex-md-nowrap align-items-center flex-wrap py-4">
    <div class="d-block mb-md-0 mb-4">
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
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ $title }}s</a>
                </li>
            </ol>
        </nav>
        <h2 class="h4">All {{ $title }}s</h2>
    </div>
</div>

<div class="card card-body table-wrapper table-responsive border-0 shadow">
    <h3 class="text-muted mb-3 text-center"><span class="text-info">{{
            $notification->data["user_name"]}}</span> Attendance Complain </h3>
    <h4 class="text-muted mb-3 text-center">On {{\Carbon\Carbon::parse($notification->data["attendance_date"])->format('l, F d, Y') }}</h4>
    <div class="mt-4">
        <div>
            <div class="row">
                <div class="col-2">
                    <p>Current Status:</p>
                </div>
                <div class="col-3">
                    <p class="fw-bold text-info">{{ $notification->data["current_status"]}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <p>Suggested Status:</p>
                </div>
                <div class="col-3">
                    <p class="fw-bold text-success">{{ $notification->data["status"]}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <p>Message:</p>
                </div>
                <div class="col-3">
                    <p>{{ $notification->data["message"]}}</p>
                </div>
            </div>
        </div>

        <div class="mt-3 d-flex">
            <form action="{{ route('attendances.fix-complain', $notification->id) }}" method="POST">
                @csrf
                <input type="hidden" name="result" value="accept">
                <button type="submit" class="btn btn-sm btn-primary">Accept</button>
            </form>
            <form action="{{ route('attendances.fix-complain', $notification->id) }}" method="POST" class="ms-3">
                @csrf
                <input type="hidden" name="result" value="reject">
                <button type="submit" class="btn btn-sm btn-primary">Reject</button>
            </form>
        </div>
    </div>
</div>
@endsection