<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bali Dream House Villa</title>

    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">

</head>
<body>
    <!-- Navbar -->
    <header>
        <nav class="navbar">
            <div class="logo">🏠</div>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#" class="login-btn">Login</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Bali</h1>
            <h2>Dream House Villa</h2>
            <p>Luxury experience for your perfect holiday in Bali. 
               Relax, enjoy, and indulge in the serenity of tropical paradise.</p>
            <a href="#" class="btn">BOOK NOW</a>
        </div>
    </section>

    <!-- Property Highlights -->
    <section class="highlights">
        <h2>Property Highlights</h2>
        <div class="highlight-container">
            <div class="card">
                <img src="{{ asset('images/bali1.jpg') }}" alt="Bali dream house 1">
                <h3>Subheading</h3>
                <p>Enjoy your private pool & lush surroundings.</p>
            </div>
            <div class="card">
                <img src="{{ asset('images/bali2.jpg') }}" alt="Bali dream house 2">
                <h3>Subheading</h3>
                <p>Spacious living area to unwind in peace.</p>
            </div>
            <div class="card">
                <img src="{{ asset('images/bali3.jpg') }}" alt="Bali dream house 3">
                <h3>Subheading</h3>
                <p>Relax in style beside your private pool.</p>
            </div>
        </div>
    </section>

    <!-- Location -->
    <section class="location">
        <h2>Location</h2>
        <div class="map-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.823013202307!2d115.1450874!3d-8.6359275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd22f42306b2cf9%3A0x8b9fdfdfb40c4f3f!2sBali!5e0!3m2!1sen!2sid!4v1698239970151!5m2!1sen!2sid" 
                width="100%" height="350" style="border:0;" allowfullscreen loading="lazy"></iframe>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials">
        <h2>Hear from Our Guests</h2>
        <div class="testimonial-container">
            <div class="testimonial">
                <p>"A serene piece of paradise!"</p>
                <span>- John Doe</span>
            </div>
            <div class="testimonial">
                <p>"Fantastic in all aspects!"</p>
                <span>- Sarah M.</span>
            </div>
            <div class="testimonial">
                <p>"An unforgettable getaway experience!"</p>
                <span>- Liam R.</span>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="contact">
                <h3>Contact</h3>
                <p>Phone: +62 819 9390 0319</p>
                <p>Email: bali@dreamhousevilla.net</p>
            </div>
            <div class="about">
                <h3>About</h3>
                <p>Bali Dream House Villa brings a blend of nature and comfort. 
                Enjoy breathtaking sunsets, lush gardens, and traditional Balinese hospitality.</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>©2025 Bali Dream House Villa</p>
        </div>
    </footer>
</body>
</html>
