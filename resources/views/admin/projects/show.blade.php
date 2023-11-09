@extends('layouts.admin')

@section('content')
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Project Number: # {{ $project->id }}</h1>
            <h5>{{ $project->slug }}</h5>
            <img class="img-fluid" src="{{ asset('storage/' . $project->cover_image) }}" alt="">
            <p class="col-md-8 fs-4">{{ $project->description }}</p>
            <a class="btn btn-primary btn-lg me-2" href="{{ route('admin.dashboard') }}">Back</a>
            <a class="btn btn-warning btn-lg me-2" href="{{ route('admin.projects.edit', $project->id) }}">Edit</a>

            <!-- Modal trigger button -->
            <button type="button" class="btn btn-danger btn-lg me-2" data-bs-toggle="modal"
                data-bs-target="#modalId-{{ $project->id }}">
                Delete
            </button>

            <!-- Modal Body -->
            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
            <div class="modal fade" id="modalId-{{ $project->id }}" tabindex="-1" data-bs-backdrop="static"
                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId-{{ $project->id }}"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId-{{ $project->id }}">Deleting Project</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            This operation cannot be undone!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            {{-- Form inside modal to soft Delete --}}
                            <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
