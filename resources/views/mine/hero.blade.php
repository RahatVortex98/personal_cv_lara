<section id="hero" class="hero">
    <div class="container">
        <div class="d-grid hero__wrapper">
            <div class="hero__content">
                <h1 class="hero__title">
                    Hi, I am {{ $hero->name ?? 'MD. Raisul Islam' }}
                </h1>

                <h2 id="typewriter" style="font-size: 25px; font-weight: bold; color: #1e90ff; border-right: 2px solid #1e90ff; white-space: nowrap; overflow: hidden; display: inline-block;"></h2>

                <p style="margin-top:15px;" class="hero__description">
                    {{ $hero->description ?? 'Backend Engineer specializing in Python/Django & PHP/Laravel stacks. Focused on building secure, high-performance REST APIs, optimizing PostgreSQL/MySQL queries, Docker containerization, and deploying scalable systems on AWS & Render.' }}
                </p>

                <div style="display: flex; flex-wrap: wrap; gap: 1rem; margin: 1.5rem 0 1rem;">
                    @if ($hero && $hero->resume)
                        <a href="{{ Storage::url($hero->resume) }}" download class="btn--primary" 
                           style="padding: 1rem 2.5rem; font-size: 1.1rem; display: inline-flex; align-items: center; gap: 0.5rem;">
                            <i class="ri-file-download-line"></i> Resume
                        </a>
                    @else
                        <a href="{{ asset('assets/MD.Raisul_Islam_Resume.pdf') }}" download class="btn--primary" 
                           style="padding: 1rem 2.5rem; font-size: 1.1rem; display: inline-flex; align-items: center; gap: 0.5rem;">
                            <i class="ri-file-download-line"></i> Resume
                        </a>
                    @endif

                    <a href="https://github.com/RahatVortex98" target="_blank" class="btn btn--secondary" 
                       style="padding: 1rem 1.8rem; font-size: 1.1rem; display: inline-flex; align-items: center; gap: 0.6rem; background: #333; border-color: #444; color: white;">
                        <i class="ri-github-fill" style="font-size: 1.4rem;"></i> GitHub
                    </a>

                    <a href="https://www.linkedin.com/in/YOUR-LINKEDIN-ID" target="_blank" class="btn btn--secondary" 
                       style="padding: 1rem 1.8rem; font-size: 1.1rem; display: inline-flex; align-items: center; gap: 0.6rem; background: #0a66c2; border-color: #0a66c2; color: white;">
                        <i class="fa-brands fa-linkedin-in" style="font-size: 1.4rem;"></i> LinkedIn
                    </a>
                </div>
            </div>

            @if ($hero && $hero->image)
                <img src="{{ Storage::url($hero->image) }}" alt="MD. Raisul Islam" class="hero__img">
            @else
                <img src="#" alt="MD. Raisul Islam" class="hero__img">
            @endif
        </div>
    </div>
</section>

