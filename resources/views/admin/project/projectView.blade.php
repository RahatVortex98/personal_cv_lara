@extends('admin.admin_dashboard')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-white">Projects</h2>
            <a href="{{ route('admin.project.create') }}" class="btn btn-success">
                <i class="fa fa-plus me-2"></i> Add New Project
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($projects->isEmpty())
            <div class="alert alert-info text-center py-5">
                <h4>No projects added yet</h4>
                <p>Add your portfolio projects now.</p>
                <a href="{{ route('admin.project.create') }}" class="btn btn-primary mt-3">
                    <i class="fa fa-plus"></i> Add Project
                </a>
            </div>
        @else
            <div class="row g-4">
                @foreach ($projects as $project)
                    <div class="col-lg-6">
                        <div class="card bg-dark text-light shadow-lg border-0 rounded-4 h-100">
                            <div class="card-body p-4">
                                @if ($project->image)
                                    <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" 
                                         class="img-fluid rounded mb-3" style="max-height: 200px; object-fit: cover;">
                                @endif

                                <h5 class="text-white fw-bold">{{ $project->title }}</h5>
                                <p class="text-light mb-3">{{ Str::limit($project->description ?? 'No description', 150) }}</p>

                                @if ($project->link)
                                    <a href="{{ $project->link }}" target="_blank" class="btn btn-primary btn-sm me-2">
                                        <i class="fa fa-external-link"></i> View Live
                                    </a>
                                @endif

                                <div class="mt-3">
                                    <a href="{{ route('admin.project.edit', $project->id) }}" class="btn btn-warning btn-sm me-2">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.project.delete', $project->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this project?')">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection