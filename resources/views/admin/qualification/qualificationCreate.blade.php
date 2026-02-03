@extends('admin.admin_dashboard')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    <div class="card-header bg-success text-white py-4">
                        <h3 class="mb-0 text-center">Add New Qualification</h3>
                    </div>

                    <div class="card-body p-5 bg-dark text-light">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('admin.qualification.store') }}" method="POST">
                            @csrf

                            <!-- Type -->
                            <div class="mb-4">
                                <label class="form-label fw-bold">Type</label>
                                <select name="type" class="form-control bg-secondary text-light" required>
                                    <option value="experience">Experience</option>
                                    <option value="education">Education</option>
                                </select>
                            </div>

                            <!-- Designation -->
                            <div class="mb-4">
                                <label class="form-label fw-bold">Designation / Degree</label>
                                <input type="text" name="designation" class="form-control bg-secondary text-light" required
                                    placeholder="e.g. Backend Developer or B.Sc. in Computer Science & Engineering">
                            </div>

                            <!-- Company / University -->
                            <div class="mb-4">
                                <label class="form-label fw-bold">Company / University</label>
                                <input type="text" name="company_name" class="form-control bg-secondary text-light"
                                    placeholder="e.g. Noetic IT or United International University">
                            </div>

                            <!-- Description -->
                            <div class="mb-4">
                                <label class="form-label fw-bold">Description</label>
                                <textarea name="description" rows="5" class="form-control bg-secondary text-light"
                                    placeholder="Key responsibilities, achievements, or details..."></textarea>
                            </div>

                            <!-- Dates -->
                            <div class="row g-4 mb-5">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Start Date</label>
                                    <input type="date" name="start_date" class="form-control bg-secondary text-light" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">End Date (optional)</label>
                                    <input type="date" name="end_date" class="form-control bg-secondary text-light">
                                    <small class="text-muted">Leave blank if ongoing / current</small>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success btn-lg px-5">
                                    <i class="fa fa-save me-2"></i> Add Qualification
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection