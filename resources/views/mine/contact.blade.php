<!-- sections/contact.blade.php -->
<style>
/* Contact Section Enhancements */
.contact {
    padding-bottom: 100px;
}

.info__card {
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.1);
    padding: 20px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 20px;
    transition: 0.3s;
}

.info__card:hover {
    background: rgba(255, 255, 255, 0.07);
    transform: translateY(-5px);
}

.info__card i {
    font-size: 1.5rem;
    color: #00d2ff; /* Adjust to match your blue/green accent */
    background: rgba(0, 210, 255, 0.1);
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
}

.info__card h4 {
    color: #fff;
    font-size: 1.1rem;
    margin-bottom: 5px;
}

.info__card p {
    color: #aaa;
    margin: 0;
    font-size: 0.9rem;
}

/* Form Input Styling */
.custom-input {
    background: rgba(255, 255, 255, 0.05) !important;
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
    color: #fff !important;
    padding: 15px !important;
    border-radius: 8px !important;
}

.custom-input:focus {
    background: rgba(255, 255, 255, 0.08) !important;
    border-color: #00d2ff !important;
    box-shadow: none !important;
}

.contact__form {
    background: rgba(255, 255, 255, 0.02);
    padding: 40px;
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.05);
}
</style>

<section id="contact" class="section contact">
    <div class="container">
        <div class="section__header text-center mb-5">
            <h2 class="section__title">Let's Work Together</h2>
            <span class="section__subtitle">Get in touch — I'm always open to new opportunities</span>
        </div>

        <div class="row g-5 align-items-stretch">
            <div class="col-lg-5">
                <div class="contact__info-container h-100">
                    <div class="info__card">
                        <i class="fa-solid fa-envelope"></i>
                        <div>
                            <h4>Email</h4>
                            <p>r072islam@gmail.com</p>
                        </div>
                    </div>

                    <div class="info__card">
                        <i class="fa-brands fa-linkedin"></i>
                        <div>
                            <h4>LinkedIn</h4>
                            <p>linkedin.com/in/raisul-islam</p>
                        </div>
                    </div>

                    <div class="info__card">
                        <i class="fa-solid fa-phone"></i>
                        <div>
                            <h4>Phone</h4>
                            <p>+880 1612 815387</p>
                        </div>
                    </div>

                    <div class="info__card">
                        <i class="fa-solid fa-location-dot"></i>
                        <div>
                            <h4>Location</h4>
                            <p>Dhaka, Bangladesh</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <form action="{{ route('contact.send') }}" method="POST" class="contact__form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" name="name" class="form-control custom-input" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="email" name="email" class="form-control custom-input" placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="subject" class="form-control custom-input" placeholder="Subject">
                    </div>
                    <div class="mb-3">
                        <textarea name="message" rows="6" class="form-control custom-input" placeholder="How can I help you?" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn--primary w-100 py-3">
                        Send Message <i class="fa-solid fa-paper-plane ms-2"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>