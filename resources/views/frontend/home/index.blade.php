<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agricultural Expert System</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
</head>
<body>
<!-- Header -->
<header class="header">
    <div class="logo">Agricultural Expert System</div>
    <nav class="main-nav">
        <ul>
            <li><a href="#" class="active">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Projects</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Shop</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
    <div class="header-actions">
        <a href="#" class="icon-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
        </a>
        <a href="#" class="icon-button cart">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="9" cy="21" r="1"></circle>
                <circle cx="20" cy="21" r="1"></circle>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
            </svg>
            <span class="cart-badge">2</span>
        </a>
        <a href="#" class="login-button">Login</a>
    </div>
    <button class="mobile-menu-button">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
        </svg>
    </button>
</header>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>Technology-led Innovation</h1>
        <div class="hero-graphic">
            <div class="circle-container">
                <div class="monitoring-circle left">
                    <div class="inner-circle"></div>
                </div>
                <div class="monitoring-data right">
                    <div class="data-row">
                        <div class="data-icon sun-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="4"></circle>
                                <path d="M12 2v2"></path>
                                <path d="M12 20v2"></path>
                                <path d="m4.93 4.93 1.41 1.41"></path>
                                <path d="m17.66 17.66 1.41 1.41"></path>
                                <path d="M2 12h2"></path>
                                <path d="M20 12h2"></path>
                                <path d="m6.34 17.66-1.41 1.41"></path>
                                <path d="m19.07 4.93-1.41 1.41"></path>
                            </svg>
                        </div>
                        <div class="progress-bar">
                            <div class="progress" style="width: 75%"></div>
                        </div>
                    </div>
                    <div class="data-row">
                        <div class="data-icon temp-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 4v10.54a4 4 0 1 1-4 0V4a2 2 0 0 1 4 0Z"></path>
                            </svg>
                        </div>
                        <div class="progress-bar">
                            <div class="progress" style="width: 50%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-bottom">
        <div class="wheat-field"></div>
    </div>
</section>

<!-- Features Section -->
<section class="features">
    <div class="container">
        <h2>Our Solutions</h2>
        <div class="feature-grid">
            <!-- Weather Update -->
            <a href="#" class="feature-card">
                <div class="feature-image" style="background-image: url('images/weather-update.jpg');">
                    <div class="feature-overlay"></div>
                    <div class="feature-content">
                        <h3>Weather Update</h3>
                        <p>Real-time weather forecasts and alerts for agricultural planning</p>
                    </div>
                </div>
            </a>

            <!-- User Management -->
            <a href="#" class="feature-card">
                <div class="feature-image" style="background-image: url('images/user-management.jpg');">
                    <div class="feature-overlay"></div>
                    <div class="feature-content">
                        <h3>User Management</h3>
                        <p>Manage farm profiles, users, and access controls</p>
                    </div>
                </div>
            </a>

            <!-- Soil Data Input and Analysis -->
            <a href="#" class="feature-card">
                <div class="feature-image" style="background-image: url('images/soil-data.jpg');">
                    <div class="feature-overlay"></div>
                    <div class="feature-content">
                        <h3>Soil Data Input and Analysis</h3>
                        <p>Record and analyze soil composition and health metrics</p>
                    </div>
                </div>
            </a>

            <!-- Crop and Fertilizer Recommendations -->
            <a href="#" class="feature-card">
                <div class="feature-image" style="background-image: url('images/crop-fertilizer.jpg');">
                    <div class="feature-overlay"></div>
                    <div class="feature-content">
                        <h3>Crop and Fertilizer Recommendations</h3>
                        <p>AI-powered suggestions for optimal crop selection and fertilization</p>
                    </div>
                </div>
            </a>

            <!-- Data Storage -->
            <a href="#" class="feature-card">
                <div class="feature-image" style="background-image: url('images/data-storage.jpg');">
                    <div class="feature-overlay"></div>
                    <div class="feature-content">
                        <h3>Data Storage</h3>
                        <p>Secure cloud storage for all your agricultural data</p>
                    </div>
                </div>
            </a>

            <!-- Irrigation Guidance -->
            <a href="#" class="feature-card">
                <div class="feature-image" style="background-image: url('images/irrigation.jpg');">
                    <div class="feature-overlay"></div>
                    <div class="feature-content">
                        <h3>Irrigation Guidance</h3>
                        <p>Smart irrigation scheduling and water management tools</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>

<script>
    // Simple mobile menu toggle
    document.querySelector('.mobile-menu-button').addEventListener('click', function() {
        document.querySelector('.main-nav').classList.toggle('active');
    });
</script>
</body>
</html>

<style>
    /* Base Styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', sans-serif;
        color: #333;
        line-height: 1.6;
    }

    a {
        text-decoration: none;
        color: inherit;
    }

    ul {
        list-style: none;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Header Styles */
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 2rem;
        background-color: #fff;
        border-bottom: 1px solid #e5e7eb;
    }

    .logo {
        font-size: 1.5rem;
        font-weight: 500;
        color: #047857; /* emerald-700 */
    }

    .main-nav ul {
        display: flex;
        gap: 2rem;
    }

    .main-nav a {
        font-size: 0.95rem;
        color: #6b7280; /* gray-500 */
        transition: color 0.3s;
    }

    .main-nav a:hover, .main-nav a.active {
        color: #047857; /* emerald-700 */
    }

    .main-nav a.active {
        font-weight: 500;
        color: #000;
    }

    .header-actions {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .icon-button {
        color: #6b7280; /* gray-500 */
        transition: color 0.3s;
        position: relative;
    }

    .icon-button:hover {
        color: #047857; /* emerald-700 */
    }

    .cart-badge {
        position: absolute;
        top: -8px;
        right: -8px;
        background-color: #059669; /* emerald-600 */
        color: white;
        font-size: 0.7rem;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-button {
        background-color: #059669; /* emerald-600 */
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        font-weight: 500;
        transition: background-color 0.3s;
    }

    .login-button:hover {
        background-color: #047857; /* emerald-700 */
    }

    .mobile-menu-button {
        display: none;
        background: none;
        border: none;
        color: #6b7280;
        cursor: pointer;
    }

    /* Hero Section */
    .hero {
        position: relative;
        background-color: #065f46; /* emerald-800 */
        color: white;
    }

    .hero-content {
        position: relative;
        padding: 5rem 2rem;
        max-width: 1200px;
        margin: 0 auto;
        z-index: 2;
    }

    .hero h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 2rem;
    }

    .hero-graphic {
        height: 250px;
        position: relative;
    }

    .circle-container {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .monitoring-circle {
        position: absolute;
        top: 50%;
        left: 25%;
        transform: translateY(-50%);
        width: 80px;
        height: 80px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: rgba(255, 255, 255, 0.1);
    }

    .inner-circle {
        width: 60px;
        height: 60px;
        border: 2px solid rgba(255, 255, 255, 0.5);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .inner-circle::after {
        content: '';
        width: 40px;
        height: 40px;
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
    }

    .monitoring-data {
        position: absolute;
        top: 30%;
        right: 25%;
        transform: translateY(-50%);
    }

    .data-row {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .data-icon {
        color: white;
    }

    .progress-bar {
        width: 120px;
        height: 16px;
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        overflow: hidden;
    }

    .progress {
        height: 100%;
        background-color: white;
    }

    .hero-bottom {
        position: relative;
        height: 120px;
        background-color: #eab308; /* yellow-500 */
        overflow: hidden;
    }

    .wheat-field {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 40px;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 40"><path d="M50,0 L52,30 L48,30 L50,0 Z" fill="%23D97706"/><path d="M30,15 C40,10 45,20 50,15 C55,20 60,10 70,15 L70,20 C60,15 55,25 50,20 C45,25 40,15 30,20 L30,15 Z" fill="%23D97706"/><path d="M25,25 C40,17 45,30 50,25 C55,30 60,17 75,25 L75,30 C60,22 55,35 50,30 C45,35 40,22 25,30 L25,25 Z" fill="%23D97706"/></svg>');
        background-repeat: repeat-x;
        background-size: 100px 40px;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path d="M10,10 L11,11 M5,5 L6,6 M15,5 L14,6 M5,15 L6,14 M15,15 L14,14" stroke="%23047857" stroke-width="0.5" opacity="0.1"/></svg>');
        opacity: 0.1;
        z-index: 1;
    }

    /* Features Section */
    .features {
        padding: 4rem 2rem;
        background-color: #fff;
    }

    .features h2 {
        font-size: 2rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 3rem;
    }

    .feature-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
    }

    .feature-card {
        display: block;
        border-radius: 0.5rem;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    .feature-image {
        position: relative;
        height: 300px;
        background-size: cover;
        background-position: center;
    }

    .feature-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.4) 50%, transparent 100%);
    }

    .feature-content {
        position: absolute;
        bottom: 0;
        left: 0;
        padding: 1.5rem;
        color: white;
        width: 100%;
    }

    .feature-content h3 {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .feature-content p {
        font-size: 0.875rem;
        opacity: 0;
        transition: opacity 0.3s;
    }

    .feature-card:hover .feature-content p {
        opacity: 1;
    }

    /* Responsive Styles */
    @media (max-width: 1024px) {
        .hero-content {
            padding: 4rem 2rem;
        }

        .hero h1 {
            font-size: 2.25rem;
        }
    }

    @media (max-width: 768px) {
        .main-nav {
            display: none;
        }

        .main-nav.active {
            display: block;
            position: absolute;
            top: 70px;
            left: 0;
            right: 0;
            background-color: white;
            padding: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            z-index: 100;
        }

        .main-nav.active ul {
            flex-direction: column;
            gap: 1rem;
        }

        .mobile-menu-button {
            display: block;
        }

        .hero-content {
            padding: 3rem 1.5rem;
        }

        .hero h1 {
            font-size: 2rem;
        }

        .monitoring-circle {
            left: 15%;
        }

        .monitoring-data {
            right: 15%;
        }

        .feature-grid {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        }
    }

    @media (max-width: 480px) {
        .header {
            padding: 1rem;
        }

        .logo {
            font-size: 1.25rem;
        }

        .hero-content {
            padding: 2rem 1rem;
        }

        .hero h1 {
            font-size: 1.75rem;
        }

        .monitoring-circle {
            width: 60px;
            height: 60px;
        }

        .inner-circle {
            width: 40px;
            height: 40px;
        }

        .inner-circle::after {
            width: 25px;
            height: 25px;
        }

        .progress-bar {
            width: 80px;
        }

        .feature-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
