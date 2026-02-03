@extends('admin.admin_dashboard')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-white">Qualifications</h2>
            <a href="{{ route('admin.qualification.create') }}" class="btn btn-success">
                <i class="fa fa-plus me-2"></i> Add New Qualification
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($qualifications->isEmpty())
            <div class="alert alert-info text-center py-5">
                <h4>No qualifications added yet</h4>
                <p>Add your experience and education now.</p>
                <a href="{{ route('admin.qualification.create') }}" class="btn btn-primary mt-3">
                    <i class="fa fa-plus"></i> Add Qualification
                </a>
            </div>
        @else
            <div class="card bg-dark text-light shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary py-3">
                    <h4 class="mb-0">All Qualifications</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-dark table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Designation</th>
                                    <th>Company / University</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($qualifications as $qual)
                                    <tr>
                                        <td>
                                            @if ($qual->type === 'experience')
                                                <span class="badge bg-success">Experience</span>
                                            @else
                                                <span class="badge bg-info">Education</span>
                                            @endif
                                        </td>
                                        <td>{{ $qual->designation }}</td>
                                        <td>{{ $qual->company_name ?? '-' }}</td>
                                        <td>{{ Str::limit($qual->description ?? '-', 80) }}</td>
                                        <td>
                                            {{ $qual->start_date ? \Carbon\Carbon::parse($qual->start_date)->format('M Y') : '-' }}
                                            - 
                                            {{ $qual->end_date ? \Carbon\Carbon::parse($qual->end_date)->format('M Y') : 'Present' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.qualification.edit', $qual->id) }}" class="btn btn-sm btn-warning">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.qualification.delete', $qual->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this qualification?')">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection