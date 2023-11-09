@extends('layouts.admin')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li><strong>Error! </strong> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.update', ['project' => $project]) }}" method="POST" enctype="multipart/form-data"
        class="my-5">

        @csrf
        @method('PUT')
        <h2 class="mb-4">Edit Project</h2>

        <div class="mb-4">
            <label for="title" class="form-label">Edit Titolo</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                placeholder="Insert a project title" aria-describedby="helpId" value="{{ old('title', $project->title) }}">
        </div>
        <div class="mb-4">
            <label for="cover_image" class="form-label">Edit Image</label>
            <input type="file" name="cover_image" id="cover_image"
                class="form-control @error('cover_image') is-invalid @enderror" placeholder="Insert a project title"
                aria-describedby="helpId">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label @error('description') is-invalid @enderror">Edit
                Description</label>
            <textarea class="form-control" name="description" id="description" rows="5"
                placeholder="Insert a project description">{{ old('descritpion', $project->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-warning">Edit Project</button>

    </form>
@endsection


@section('content')

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                <strong>Error! </strong> {{ $error }}
            @endforeach
        </div>
    @endif




    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="my-5">

        @csrf

        <h2 class="mb-4">Add New Project</h2>

        <div class="mb-4">
            <label for="title" class="form-label">Add Titolo</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Insert a project title"
                aria-describedby="helpId" value="{{ old('title') }}">
        </div>
        <div class="mb-4">
            <label for="cover_image" class="form-label">Add Image</label>
            <input type="file" name="cover_image" id="cover_image" class="form-control"
                placeholder="Insert a project title" aria-describedby="helpId">
        </div>
        <div class="mb-4">
            <label for="description" class="form-label">Add Description</label>
            <input type="text" name="description" id="description" class="form-control"
                placeholder="Insert a project title" aria-describedby="helpId">
        </div>

        <button type="submit" class="btn btn-primary">Create New Project</button>

    </form>
@endsection
