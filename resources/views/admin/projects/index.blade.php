@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="fs-4 text-secondary my-4">
                    {{ __('Dashboard') }}
                </h2>
            </div>

            <div class="col">
                <div class="new_project text-end">
                    <a class="btn btn-primary my-4" href="{{ route('admin.projects.create') }}">Add Project</a>
                    <a class="btn btn-success my-4" href="{{ route('admin.trash') }}">Trashed Projects</a>
                </div>
            </div>
        </div>

        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }} 🤩
            </div>
        @endif





        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <h5 class="card-header">{{ __('Project List') }}</h5>

                    <div class="card-body p-0">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="table-responsive dashboard_table">
                            <table class="table table-primary m-0 align-middle text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">DATE</th>
                                        <th scope="col">TITLE</th>
                                        <th scope="col">COVER IMAGE</th>
                                        <th scope="col">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($projects as $project)
                                        <tr class="">
                                            <td>{{ $project->id }}</td>
                                            <td>{{ date($project->created_at) }}</td>
                                            <td>{{ $project->title }}</td>
                                            <td><img src="{{ asset('storage/' . $project->cover_image) }}" alt="">
                                            </td>
                                            <td>
                                                <a class="btn btn-primary m-1"
                                                    href="{{ route('admin.projects.show', $project->id) }}">More</a>
                                                <a class="btn btn-warning m-1"
                                                    href="{{ route('admin.projects.edit', $project->id) }}">Edit</a>
                                                <!-- Modal trigger button -->
                                                <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal"
                                                    data-bs-target="#modalId-{{ $project->id }}">
                                                    Delete
                                                </button>

                                                <!-- Modal Body -->
                                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                                <div class="modal fade" id="modalId-{{ $project->id }}" tabindex="-1"
                                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                                    aria-labelledby="modalTitleId-{{ $project->id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="modalTitleId-{{ $project->id }}">Deleting
                                                                    project
                                                                    #{{ $project->id }}</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Danger! This cannot be undone.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <form
                                                                    action="{{ route('admin.projects.destroy', $project) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Confirm</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>There aren't projects! 😒</td>
                                        </tr>
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
