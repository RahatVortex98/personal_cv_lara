@extends('admin.admin_dashboard')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    <div class="card-header bg-warning text-dark py-4">
                        <h3 class="mb-0 text-center">Edit Qualification</h3>
                    </div>

                    <div class="card-body p-5 bg-dark text-light">
                        <form action="{{ route('admin.qualification.update', $qualification->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Type -->
                            <div class="mb-4">
                                <label class="form-label fw-bold">Type</label>
                                <select name="type" class="form-control bg-secondary text-light" required>
                                    <option value="experience" {{ $qualification->type === 'experience' ? 'selected' : '' }}>Experience</option>
                                    <option value="education" {{ $qualification->type === 'education' ? 'selected' : '' }}>Education</option>
                                </select>
                            </div>

                            <!-- Designation -->
                            <div class="mb-4">
                                <label class="form-label fw-bold">Designation / Degree</label>
                                <input type="text" name="designation" class="form-control bg-secondary text-light" required
                                    value="{{ old('designation', $qualification->designation) }}">
                            </div>

                            <!-- Company / University -->
                            <div class="mb-4">
                                <label class="form-label fw-bold">Company / University</label>
                                <input type="text" name="company_name" class="form-control bg-secondary text-light"
                                    value="{{ old('company_name', $qualification->company_name) }}">
                            </div>

                            <!-- Description -->
                            <div class="mb-4">
                                <label class="form-label fw-bold">Description</label>
                                <textarea name="description" rows="5" class="form-control bg-secondary text-light">
                                    {{ old('description', $qualification->description) }}
                                </textarea>
                            </div>

                            <!-- Dates -->
                            <div class="row g-4 mb-5">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Start Date</label>
                                    <input type="date" name="start_date" class="form-control bg-secondary text-light" required
                                        value="{{ $qualification->start_date->format('Y-m-d') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">End Date (optional)</label>
                                    <input type="date" name="end_date" class="form-control bg-secondary text-light"
                                        value="{{ $qualification->end_date ? $qualification->end_date->format('Y-m-d') : '' }}">
                                    <small class="text-muted">Leave blank if ongoing / current</small>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-3">
                                <a href="{{ route('admin.qualification.view') }}" class="btn btn-secondary btn-lg px-5">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <i class="fa fa-save me-2"></i> Update Qualification
                                </button>
                            </div>
                        </form>

                        <!-- Delete -->
                        <div class="mt-5 text-end">
                            <form action="{{ route('admin.qualification.delete', $qualification->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-lg px-5" onclick="return confirm('Delete this qualification?')">
                                    <i class="fa fa-trash me-2"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection