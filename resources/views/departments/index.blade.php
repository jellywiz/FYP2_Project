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
                <li class="breadcrumb-item"><a href="{{ route('departments.index') }}">{{ $title }}s</a></li>
            </ol>
        </nav>
        <h2 class="h4">All {{ $title }}s</h2>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('departments.create') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center animate-up-2">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            New {{ $title }}
        </a>
    </div>
</div>

<div class="card card-body border-0 shadow table-wrapper table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="border-gray-200">#</th>
                <th class="border-gray-200">Name</th>
                <th class="border-gray-200">Created At</th>
                <th class="border-gray-200">Updated At</th>
                <th class="border-gray-200">Action</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($depts as $dept)
                <tr>
                    <td class="fw-bold">{{ $loop->iteration }}</td>
                    <td><span class="fw-normal">{{ $dept->name }}</span></td>
                    <td><span class="fw-normal">{{ $dept->created_at }}</span></td>
                    <td><span class="fw-normal">{{ $dept->updated_at }}</span></td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="icon icon-sm">
                                    <span class="fas fa-ellipsis-h icon-dark"></span>
                                </span>
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu py-0">
                                <a class="dropdown-item" href="{{ route('departments.edit',$dept->id) }}"><span class="fas fa-edit me-2"></span>Edit</a>
                                <form action="{{ route('departments.destroy', $dept->id) }}" method="POST"
                                    id="myForm_{{ $dept->id }}">
                                    @method("DELETE")
                                    @csrf
                                </form>
                                <a class="dropdown-item text-danger rounded-bottom" href="#" 
                                onclick="Swal.fire({
                                                    title: 'Are you sure?',
                                                    text: `You won't be able to revert this!`,
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonText: 'Yes, delete it'
                                                    }).then((result) => {
                                                    if (result.isConfirmed) {
                                                    document.getElementById('myForm_{{ $dept->id }}').submit();
                                                                            }
                                                    })
                                                ">
                                                <span
                                        class="fas fa-trash-alt me-2"></span>Remove</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                
            @endforelse

           
      
        </tbody>
    </table>
</div>
@endsection