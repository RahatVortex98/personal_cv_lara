@extends('admin.admin_dashboard')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    <div class="card-header bg-warning text-dark py-4">
                        <h3 class="mb-0 text-center">Edit Project</h3>
                    </div>

                    <div class="card-body p-5 bg-dark text-light">
                        <form action="{{ route('admin.project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Title -->
                            <div class="mb-4">
                                <label class="form-label fw-bold">Project Title</label>
                                <input type="text" name="title" class="form-control bg-secondary text-light" required
                                    value="{{ old('title', $project->title) }}">
                            </div>

                            <!-- Current Image -->
                            <div class="mb-4">
                                <label class="form-label fw-bold">Current Image</label>
                                @if ($project->image)
                                    <div class="mb-3">
                                        <img src="{{ Storage::url($project->image) }}" alt="Current" class="img-fluid rounded" style="max-height: 300px;">
                                    </div>
                                @else
                                    <p class="text-muted">No image uploaded</p>
                                @endif

                                <label class="form-label mt-3">Upload New Image (optional)</label>
                                <input type="file" name="image" accept="image/*" class="form-control bg-secondary text-light">
                                <small class="text-muted">Leave blank to keep current</small>
                            </div>

                            <!-- Description -->
                            <div class="mb-4">
                                <label class="form-label fw-bold">Description</label>
                                <textarea name="description" rows="6" class="form-control bg-secondary text-light">
                                    {{ old('description', $project->description) }}
                                </textarea>
                            </div>

                            <!-- Link -->
                            <div class="mb-5">
                                <label class="form-label fw-bold">Live Demo / GitHub Link</label>
                                <input type="url" name="link" class="form-control bg-secondary text-light"
                                    value="{{ old('link', $project->link) }}">
                            </div>

                            <div class="d-flex justify-content-end gap-3">
                                <a href="{{ route('admin.project.view') }}" class="btn btn-secondary btn-lg px-5">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <i class="fa fa-save me-2"></i> Update Project
                                </button>
                            </div>
                        </form>

                        <!-- Delete -->
                        <div class="mt-5 text-end">
                            <form action="{{ route('admin.project.delete', $project->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-lg px-5" onclick="return confirm('Delete this project?')">
                                    <i class="fa fa-trash me-2"></i> Delete Project
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection