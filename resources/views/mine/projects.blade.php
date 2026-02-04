<section id="project" class="section project">
    <div class="container">
        <div class="section__header">
            <h2 class="section__title">Projects</h2>
            <span class="section__subtitle">My recent work</span>
        </div>

        <div class="d-grid project__wrapper">
            @foreach ($projects as $project)
                <div class="project__content">
                    @php
                        $title = strtolower($project->title);
                        $imagePath = asset('assets/img/project-placeholder.png');

                        // 1. Check if a fresh upload exists in storage
                        if ($project->image && file_exists(public_path('storage/' . $project->image))) {
                            $imagePath = asset('storage/' . $project->image);
                        } 
                        // 2. Fallback to permanent GitHub assets by keyword
                        elseif (Str::contains($title, 'well')) {
                            $imagePath = asset('assets/img/projects/all_well.webp');
                        }
                        elseif (Str::contains($title, 'hr')) {
                            $imagePath = asset('assets/img/projects/hrms.png');
                        }
                        elseif (Str::contains($title, 'med')) {
                            $imagePath = asset('assets/img/projects/medconnect.png');
                        }
                        elseif (Str::contains($title, 'flex')) {
                            $imagePath = asset('assets/img/projects/Logo.png');
                        }
                    @endphp

                    <img src="{{ $imagePath }}" alt="{{ $project->title }}" class="project__img">

                    <a href="{{ $project->link }}" class="project__link" target="_blank">
                        <h3 class="project__title">{{ $project->title }}</h3>
                    </a>

                    <p class="project__description">
                        {{ $project->description }}
                    </p>

                    <a href="{{ $project->link }}" class="project__link" target="_blank">
                        View Project <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            @endforeach
        </div>

        <div style="text-align:center; margin-top:40px;">
            <a href="https://github.com/RahatVortex98?tab=repositories" class="btn--primary" style="padding:1.5rem 4rem;" target="_blank">
                View More Projects <i class="fa-solid fa-angle-down fa-bounce"></i>
            </a>
        </div>
    </div>
</section>