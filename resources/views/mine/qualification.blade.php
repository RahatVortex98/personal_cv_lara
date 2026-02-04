<section id="qualification" class="section qualification">
    <div class="container">
        <div class="section__header">
            <h2 class="section__title">Qualification</h2>
            <span class="section__subtitle">Experience & Education</span>
        </div>

        <!-- Professional Experience – Fully Dynamic -->
        <div class="qualification__wrapper">
            <h3 class="qualification__name">
                <i class="ri-briefcase-fill"></i> Professional Experience
            </h3>
            <div class="d-grid qualification__content">
                @if ($qualifications->where('type', 'experience')->isEmpty())
                    <p class="text-muted text-center py-4">Experience details will appear here once added from admin.</p>
                @else
                    @foreach ($qualifications->where('type', 'experience') as $qual)
                        <div class="qualification__item">
                            <h3 class="qualification__title">{{ $qual->designation }}</h3>

                            <h4 class="qualification__company font-semibold text-primary mb-2">
                                {{ $qual->company_name ?? 'Company/Organization' }}
                            </h4>

                            <div class="qualification__description text-gray-300">
                                @if ($qual->description)
                                    {!! nl2br(e($qual->description)) !!}
                                @else
                                    <p class="text-muted">No detailed description added yet.</p>
                                @endif
                            </div>

                            <span class="qualification__date text-gray-400">
                                {{ $qual->start_date->format('F Y') }} – 
                                {{ $qual->end_date ? $qual->end_date->format('F Y') : 'Present' }}
                            </span>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <!-- Education – Static (as requested) -->
        <div class="qualification__wrapper">
            <h3 class="qualification__name">
                <i class="ri-booklet-fill"></i> Education
            </h3>
            <div class="d-grid qualification__content">
                <div class="qualification__item">
                    <h3 class="qualification__title">B.Sc. in Computer Science & Engineering (CSE)</h3>
                    <h4 class="qualification__company font-semibold text-primary">
                        United International University (UIU)
                    </h4>
                    <span class="qualification__date text-gray-400">
                        March 2018 – November 2022
                    </span>
                </div>

                <div class="qualification__item">
                    <h3 class="qualification__title">Higher Secondary Certificate (HSC)</h3>
                    <h4 class="qualification__company font-semibold text-primary">
                        Dhaka Residential Model College
                    </h4>
                    <span class="qualification__date text-gray-400">
                        January 2014 – May 2016
                    </span>
                </div>
            </div>
        </div>

        <!-- Resume Download -->
        <div class="qualification__footer mt-8 text-center">
            <p class="qualification__footer-text text-gray-300 mb-4">
                See my full resume for more details
            </p>
            <a href="{{ asset('storage/' . $hero->resume) }}" download class="btn btn--primary">
               
                <i class="ri-file-download-line text-xl"></i>
                Download Resume
            </a>
        </div>
    </div>
</section>