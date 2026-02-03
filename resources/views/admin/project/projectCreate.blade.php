@extends('admin.admin_dashboard')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    <div class="card-header bg-success text-white py-4">
                        <h3 class="mb-0 text-center">Add New Project</h3>
                    </div>

                    <div class="card-body p-5 bg-dark text-light">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Title -->
                            <div class="mb-4">
                                <label class="form-label fw-bold">Project Title</label>
                                <input type="text" name="title" class="form-control bg-secondary text-light" required
                                    placeholder="e.g. FlexWear – Full-Stack E-Commerce">
                            </div>

                            <!-- Image -->
                            <div class="mb-4">
                                <label class="form-label fw-bold">Project Image</label>
                                <input type="file" name="image" accept="image/*" class="form-control bg-secondary text-light">
                                <small class="text-muted">Max 2MB (jpg, png, webp)</small>
                            </div>

                            <!-- Description -->
                            <div class="mb-4">
                                <label class="form-label fw-bold">Description</label>
                                <textarea name="description" rows="6" class="form-control bg-secondary text-light"
                                    placeholder="Describe the project, technologies used, features..."></textarea>
                            </div>

                            <!-- Link -->
                            <div class="mb-5">
                                <label class="form-label fw-bold">Live Demo / GitHub Link</label>
                                <input type="url" name="link" class="form-control bg-secondary text-light"
                                    placeholder="https://flexwear-shop.onrender.com/">
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success btn-lg px-5">
                                    <i class="fa fa-save me-2"></i> Add Project
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection