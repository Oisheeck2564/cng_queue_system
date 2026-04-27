<?php include 'includes/header.php'; ?>
<style>
    body {
        background: linear-gradient(135deg, #1d2671, #c33764);
        color: #fff;
    }

    .hero {
        padding: 60px 0;
    }

    @media (min-width: 768px) {
        .hero {
            min-height: 90vh;
            display: flex;
            align-items: center;
        }
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(12px);
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.2);
    }

    .btn-custom {
        padding: 12px;
        font-size: 16px;
        border-radius: 8px;
    }

    .feature-box p {
        margin-bottom: 8px;
    }

    img.hero-img {
        width: 100%;
        border-radius: 10px;
        margin-top: 20px;
        object-fit: cover;
        max-height: 250px;
    }

    @media (min-width: 768px) {
        img.hero-img {
            max-height: 320px;
        }
    }
</style>
<div class="container hero">
    <div class="row align-items-center">

        <!-- LEFT SIDE -->
        <div class="col-12 col-md-7 text-center text-md-start">

            <h1 class="fw-bold display-6 display-md-5">
                Smart CNG Queue System 🚗
            </h1>

            <p class="mt-3">
                Avoid long waiting lines at fuel stations. Find nearby stations 
                with real-time queue updates and save your valuable time.
            </p>

            <div class="feature-box mt-3">
                <p>✔ Real-time queue tracking</p>
                <p>✔ Nearby station finder</p>
                <p>✔ Save time & fuel</p>
                <p>✔ Easy and fast system</p>
            </div>

            <img src="https://images.unsplash.com/photo-1604147706283-3c4c94e8b1c4"
                 class="hero-img shadow">
        </div>

        <!-- RIGHT SIDE -->
        <div class="col-12 col-md-5 mt-5 mt-md-0">

            <div class="glass-card text-center">

                <h4 class="mb-4">Get Started</h4>

                <a href="auth/login.php" 
                   class="btn btn-primary w-100 btn-custom mb-3">
                    Login
                </a>

                <a href="auth/register.php" 
                   class="btn btn-success w-100 btn-custom">
                    Register
                </a>

                <hr style="border-color: rgba(255,255,255,0.3);">

                <p class="small">
                    Join now and skip long queues 🚀
                </p>

            </div>

        </div>

    </div>
</div>

<?php include 'includes/footer.php'; ?>