@extends('admin.admin_dashboard')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    <div class="card-header bg-primary text-white py-4">
                        <h3 class="mb-0 text-center">Add New Hero Section</h3>
                    </div>

                    <div class="card-body p-5 bg-dark text-light">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.hero.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Description -->
                            <div class="mb-4">
                                <label for="description" class="form-label fw-bold">Description</label>
                                <textarea name="description" id="description" rows="6"
                                    class="form-control bg-secondary text-light border-0 @error('description') is-invalid @enderror"
                                    placeholder="Write the hero description here...">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Image -->
                            <div class="mb-4">
                                <label for="image" class="form-label fw-bold">Hero Image</label>
                                <input type="file" name="image" id="image" accept="image/*"
                                    class="form-control bg-secondary text-light border-0 @error('image') is-invalid @enderror">
                                <small class="text-muted">Max 2MB (jpg, png, webp)</small>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Resume -->
                            <div class="mb-5">
                                <label for="resume" class="form-label fw-bold">Resume (PDF)</label>
                                <input type="file" name="resume" id="resume" accept=".pdf"
                                    class="form-control bg-secondary text-light border-0 @error('resume') is-invalid @enderror">
                                <small class="text-muted">Max 5MB</small>
                                @error('resume')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <i class="fa fa-save me-2"></i> Save Hero
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection