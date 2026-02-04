<section id="project" class="section project">
    <div class="container">
        <div class="section__header">
            <h2 class="section__title">Projects</h2>
            <span class="section__subtitle">My recent work</span>
        </div>

        <div class="d-grid project__wrapper">
            @foreach ($projects as $project)
                <div class="project__content">
                    @if ($project->image)
                        {{-- Change from Storage::url to asset('storage/...') --}}
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="project__img">
                    @else
                        <img src="{{ asset('assets/img/project-placeholder.png') }}" alt="{{ $project->title }}" class="project__img">
                    @endif

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