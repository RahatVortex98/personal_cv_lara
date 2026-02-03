<section id="about" class="section about">
    <div class="container">
        <div class="section__header">
            <h2 class="section__title">About Me</h2>
            <span class="section__subtitle">Who am I</span>
        </div>

        <div class="d-grid about__wrapper">
            <div class="about__content">
                @if ($about = \App\Models\About::with('skills')->first())
                    <h3 class="about__title">
                        I'm a Professional 
                        {{ $about->designation ?? "I'm a Professional Backend Software Engineer." }}
                    </h3>

                    <p class="about__description">
                        {{ $about->description ?? 'Focused on building secure, performant, and scalable web applications...' }}
                    </p>
                @else
                    <h3 class="about__title">I'm a Professional Backend Software Engineer.</h3>
                    <p class="about__description">Focused on building secure, performant, and scalable web applications...</p>
                @endif

                <a href="#project" class="btn btn--primary">Know More</a>
            </div>

            <div class="skills">
                <h3 class="skills__title">Technologies I've been working with:</h3>
                <div class="skills__wrapper">
                    <div class="skills__content">
                        <h4 class="skills__subtitle">Frontend & Tools</h4>
                        <ul class="skills__list">
                            @if ($about && $about->skills->where('category', 'frontend')->count() > 0)
                                @foreach ($about->skills->where('category', 'frontend') as $skill)
                                    <li class="skills__item">
                                        <i class="ri-arrow-right-s-fill"></i> {{ $skill->name }}
                                    </li>
                                @endforeach
                            @else
                                <li class="skills__item"><i class="ri-arrow-right-s-fill"></i> HTML</li>
                                <li class="skills__item"><i class="ri-arrow-right-s-fill"></i> CSS</li>
                                <li class="skills__item"><i class="ri-arrow-right-s-fill"></i> JavaScript</li>
                            @endif
                        </ul>
                    </div>

                    <div class="skills__content">
                        <h4 class="skills__subtitle">Backend & Databases</h4>
                        <ul class="skills__list">
                            @if ($about && $about->skills->where('category', 'backend')->count() > 0)
                                @foreach ($about->skills->where('category', 'backend') as $skill)
                                    <li class="skills__item">
                                        <i class="ri-arrow-right-s-fill"></i> {{ $skill->name }}
                                    </li>
                                @endforeach
                            @else
                                <li class="skills__item"><i class="ri-arrow-right-s-fill"></i> PHP</li>
                                <li class="skills__item"><i class="ri-arrow-right-s-fill"></i> Laravel</li>
                                <li class="skills__item"><i class="ri-arrow-right-s-fill"></i> MySQL</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>