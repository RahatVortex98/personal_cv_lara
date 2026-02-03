@extends('admin.admin_dashboard')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    <div class="card-header bg-primary text-white py-4">
                        <h3 class="mb-0 text-center">Edit Hero Section #{{ $hero->id }}</h3>
                    </div>

                    <div class="card-body p-5 bg-dark text-light">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('admin.hero.update', $hero->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')  <!-- Important: tells Laravel this is an update -->

                            <!-- Description -->
                            <div class="mb-4">
                                <label for="description" class="form-label fw-bold">Description</label>
                                <textarea name="description" id="description" rows="6"
                                    class="form-control bg-secondary text-light border-0 @error('description') is-invalid @enderror"
                                    placeholder="Write the hero description here...">{{ old('description', $hero->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Current Image + Upload New -->
                            <div class="mb-4">
                                <label class="form-label fw-bold">Current Hero Image</label>
                                @if ($hero->image)
                                    <div class="mb-2">
                                        <img src="{{ Storage::url($hero->image) }}" alt="Current Hero Image" style="max-width: 300px; border-radius: 8px;">
                                    </div>
                                @else
                                    <p class="text-muted">No image uploaded yet.</p>
                                @endif

                                <label for="image" class="form-label mt-3">Upload New Image (optional)</label>
                                <input type="file" name="image" id="image" accept="image/*"
                                    class="form-control bg-secondary text-light border-0 @error('image') is-invalid @enderror">
                                <small class="text-muted">Leave blank to keep current image</small>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Current Resume + Upload New -->
                            <div class="mb-5">
                                <label class="form-label fw-bold">Current Resume</label>
                                @if ($hero->resume)
                                    <div class="mb-2">
                                        <a href="{{ Storage::url($hero->resume) }}" target="_blank" class="btn btn-sm btn-outline-light">
                                            <i class="fa fa-file-pdf-o me-2"></i> View Current Resume
                                        </a>
                                    </div>
                                @else
                                    <p class="text-muted">No resume uploaded yet.</p>
                                @endif

                                <label for="resume" class="form-label mt-3">Upload New Resume (optional)</label>
                                <input type="file" name="resume" id="resume" accept=".pdf"
                                    class="form-control bg-secondary text-light border-0 @error('resume') is-invalid @enderror">
                                <small class="text-muted">Leave blank to keep current resume</small>
                                @error('resume')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end gap-3">
                                <a href="{{ route('admin.hero') }}" class="btn btn-secondary btn-lg px-5">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <i class="fa fa-save me-2"></i> Update Hero
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection