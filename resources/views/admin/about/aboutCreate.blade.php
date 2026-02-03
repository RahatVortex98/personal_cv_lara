@extends('admin.admin_dashboard')
@php
    use App\Models\Skill;
@endphp
@section('content')
    @section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    <div class="card-header bg-primary text-white py-4">
                        <h3 class="mb-0 text-center">Manage About Section</h3>
                    </div>

                    <div class="card-body p-5 bg-dark text-light">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('admin.about.store') }}" method="POST">
                            @csrf

                            <!-- Designation -->
                            <div class="mb-4">
                                <label class="form-label fw-bold">Designation</label>
                                <input type="text" name="designation" class="form-control bg-secondary text-light"
                                    value="{{ old('designation') }}" placeholder="e.g. Backend Engineer">
                            </div>

                            <!-- Description -->
                            <div class="mb-5">
                                <label class="form-label fw-bold">About Description</label>
                                <textarea name="description" rows="6" class="form-control bg-secondary text-light">
                                    {{ old('description') }}
                                </textarea>
                            </div>

                            <!-- Skills – Checkboxes -->
                            <div class="mb-5">
                                <h5 class="fw-bold mb-3">Select Your Skills</h5>

                                <div class="row g-4">
                                    <!-- Frontend Skills -->
                                    <div class="col-md-6">
                                        <h6 class="text-info mb-3 border-bottom border-info pb-2">Frontend</h6>
                                        @foreach (Skill::where('category', 'frontend')->orderBy('name')->get() as $skill)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="skills[]" 
                                                    value="{{ $skill->id }}" id="frontend-{{ $skill->id }}"
                                                    {{ old('skills') && in_array($skill->id, old('skills')) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="frontend-{{ $skill->id }}">
                                                    {{ $skill->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <!-- Backend Skills -->
                                    <div class="col-md-6">
                                        <h6 class="text-info mb-3 border-bottom border-info pb-2">Backend & Tools</h6>
                                        @foreach (Skill::where('category', 'backend')->orderBy('name')->get() as $skill)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="skills[]" 
                                                    value="{{ $skill->id }}" id="backend-{{ $skill->id }}"
                                                    {{ old('skills') && in_array($skill->id, old('skills')) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="backend-{{ $skill->id }}">
                                                    {{ $skill->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <i class="fa fa-save me-2"></i> Save About
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection