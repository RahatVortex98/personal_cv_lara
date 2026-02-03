<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="title" content="MD. Raisul Islam - Software Engineer Portfolio">
    <meta name="description" content="MD. Raisul Islam - Backend Engineer specializing in Python/Django, PHP/Laravel, REST APIs, PostgreSQL, Docker, AWS & Render deployments.">
    <meta name="keywords" content="MD. Raisul Islam, Software Engineer, Backend Developer, Django, Laravel, Python, PHP, REST API, PostgreSQL, Docker, Portfolio">
    <meta name="author" content="MD. Raisul Islam">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <title>MD. Raisul Islam | Software Engineer</title>

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }} ">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Remixicons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- SwiperJS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</head>
<body>

    <!--=================== Header ====================-->
    <header id="header" class="header">
        <div class="container">
            <nav class="nav">
                <a href="#" class="nav__brand">
                    <i class="ri-code-s-slash-line"></i> Raisul <span>Islam</span>
                </a>
                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="#hero" class="nav__link">Home</a></li>
                        <li class="nav__item"><a href="#about" class="nav__link">About</a></li>
                        <li class="nav__item"><a href="#qualification" class="nav__link">Qualification </a></li>
                        <li class="nav__item"><a href="#services" class="nav__link">Services</a></li>
                        <li class="nav__item"><a href="#project" class="nav__link">Projects</a></li>
                       
                        <li class="nav__item"><a href="#contact" class="nav__link">Contact</a></li>
                    </ul>
                </div>
                <div class="nav__toggle">
                    <i id="nav-toggle" class="ri-menu-3-line"></i>
                </div>
            </nav>
        </div>
    </header>

    <!--=================== Main ====================-->
   <main class="main">
    @yield('content')
</main>

    <!--=================== Footer ====================-->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="d-grid footer__wrapper" style="text-align:center;">
                <div class="footer__content">
                    <h4 class="footer__title">Connect with Me</h4>
                    <ul class="footer__social-list">
                        <li class="footer__social-item">
                            <a href="mailto:r072islam@gmail.com" target="_blank"><i class="fa-regular fa-envelope fa-beat-fade"></i></a>
                        </li>
                        <li class="footer__social-item">
                            <a href="https://github.com/RahatVortex98" target="_blank"><i class="fa-brands fa-github fa-fade"></i></a>
                        </li>
                        <li class="footer__social-item">
                            <a href="https://www.linkedin.com/in/YOUR-LINKEDIN-USERNAME" target="_blank"><i class="fa-brands fa-linkedin-in fa-beat-fade"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <p class="footer__copyright">© 2026 MD. Raisul Islam. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

@stack('scripts')    
<!-- Typewriter Effect – Safe & Reliable -->
<script>
    const typewriterTexts = [
        "Backend Engineer",
        "Python / Django Developer",
        "PHP / Laravel Developer",
        "API & Database Specialist"
    ];

    // Wait for DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function () {
        const typewriterElement = document.getElementById('typewriter');

        // If element doesn't exist (e.g. on other pages), just exit
        if (!typewriterElement) return;

        let currentTextIndex = 0;
        let charIndex = 0;
        let isDeleting = false;

        function typeEffect() {
            const currentText = typewriterTexts[currentTextIndex];

            if (!isDeleting && charIndex < currentText.length) {
                // Typing
                typewriterElement.textContent = currentText.substring(0, charIndex + 1);
                charIndex++;
                setTimeout(typeEffect, 100);
            } else if (isDeleting && charIndex > 0) {
                // Deleting
                typewriterElement.textContent = currentText.substring(0, charIndex - 1);
                charIndex--;
                setTimeout(typeEffect, 50);
            } else if (!isDeleting && charIndex === currentText.length) {
                // Pause after typing complete
                setTimeout(() => { isDeleting = true; typeEffect(); }, 2000);
            } else if (isDeleting && charIndex === 0) {
                // Move to next text
                isDeleting = false;
                currentTextIndex = (currentTextIndex + 1) % typewriterTexts.length;
                setTimeout(typeEffect, 500);
            }
        }

        // Start the effect
        typeEffect();
    });
</script>
</body>
</html>