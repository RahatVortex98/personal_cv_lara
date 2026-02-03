@extends('admin.admin_dashboard')
@php
    use App\Models\About;
@endphp
@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-white">About Section</h2>
            @if (!About::exists())
                <a href="{{ route('admin.about.create') }}" class="btn btn-success">
                    <i class="fa fa-plus me-2"></i> Add About Section
                </a>
            @endif
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($about = About::first())
            <div class="card bg-dark text-light shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary py-3">
                    <h4 class="mb-0">Current About Information</h4>
                </div>
                <div class="card-body p-4">
                    <h5 class="text-info mb-3">{{ $about->designation ?? 'No designation set' }}</h5>
                    <p class="lead mb-4">{{ $about->description ?? 'No description yet' }}</p>

                    <!-- Skills Lists -->
                  <!-- Replace this entire block inside the card-body -->
<div class="row mt-4">
    <div class="col-md-6">
        <h6 class="text-primary mb-2 fw-bold">Frontend Skills</h6>
        @php $frontendSkills = $about->skills()->where('category', 'frontend')->get(); @endphp
        @forelse ($frontendSkills as $skill)
            <li class="mb-2 list-unstyled">
                <i class="fa fa-check-circle text-success me-2"></i>{{ $skill->name }}
            </li>
        @empty
            <p class="text-muted">Not specified</p>
        @endforelse
    </div>

    <div class="col-md-6">
        <h6 class="text-primary mb-2 fw-bold">Backend Skills</h6>
        @php $backendSkills = $about->skills()->where('category', 'backend')->get(); @endphp
        @forelse ($backendSkills as $skill)
            <li class="mb-2 list-unstyled">
                <i class="fa fa-check-circle text-success me-2"></i>{{ $skill->name }}
            </li>
        @empty
            <p class="text-muted">Not specified</p>
        @endforelse
    </div>
</div>
                    <div class="mt-5">
                        <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-warning me-3">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.about.delete', $about->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete the About section?')">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info text-center py-5">
                <h4>No About section found</h4>
                <p>Create your professional summary now.</p>
                <a href="{{ route('admin.about.create') }}" class="btn btn-primary mt-3">
                    <i class="fa fa-plus"></i> Add About Section
                </a>
            </div>
        @endif
    </div>
@endsection