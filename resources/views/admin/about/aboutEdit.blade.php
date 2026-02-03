@extends('admin.admin_dashboard')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    <div class="card-header bg-warning text-dark py-4">
                        <h3 class="mb-0 text-center">Edit About Section</h3>
                    </div>

                    <div class="card-body p-5 bg-dark text-light">
                        <form action="{{ route('admin.about.update', $about->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label class="form-label fw-bold">Designation / Title</label>
                                <input type="text" name="designation" class="form-control bg-secondary text-light"
                                    value="{{ old('designation', $about->designation) }}">
                            </div>

                            <div class="mb-5">
                                <label class="form-label fw-bold">Description</label>
                                <textarea name="description" rows="8" class="form-control bg-secondary text-light">
                                    {{ old('description', $about->description) }}
                                </textarea>
                            </div>

                            <div class="row g-4 mb-5">
    <div class="col-md-6">
        <h6 class="text-info mb-3 border-bottom border-info pb-2">Frontend</h6>
        @foreach (App\Models\Skill::where('category', 'frontend')->orderBy('name')->get() as $skill)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="skills[]" 
                    value="{{ $skill->id }}" id="skill-{{ $skill->id }}"
                    {{ $about->skills->contains($skill->id) ? 'checked' : '' }}>
                <label class="form-check-label" for="skill-{{ $skill->id }}">
                    {{ $skill->name }}
                </label>
            </div>
        @endforeach
    </div>

    <div class="col-md-6">
        <h6 class="text-info mb-3 border-bottom border-info pb-2">Backend & Tools</h6>
        @foreach (App\Models\Skill::where('category', 'backend')->orderBy('name')->get() as $skill)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="skills[]" 
                    value="{{ $skill->id }}" id="skill-{{ $skill->id }}"
                    {{ $about->skills->contains($skill->id) ? 'checked' : '' }}>
                <label class="form-check-label" for="skill-{{ $skill->id }}">
                    {{ $skill->name }}
                </label>
            </div>
        @endforeach
    </div>
</div>
                            <div class="d-flex justify-content-end gap-3">
                                <a href="{{ route('admin.about.view') }}" class="btn btn-secondary btn-lg px-5">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <i class="fa fa-save me-2"></i> Update About
                                </button>
                            </div>
                        </form>

                        <!-- Delete Button -->
                        <div class="mt-5 text-end">
                            <form action="{{ route('admin.about.delete', $about->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-lg px-5" onclick="return confirm('Delete About section? This cannot be undone.')">
                                    <i class="fa fa-trash me-2"></i> Delete About
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection