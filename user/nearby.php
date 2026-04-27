<?php
include '../config/db.php';
include '../includes/header.php';

$result = $conn->query("
SELECT stations.name, queue_status.crowd_level 
FROM stations 
JOIN queue_status ON stations.id = queue_status.station_id
ORDER BY FIELD(queue_status.crowd_level,'Low','Medium','High')
LIMIT 1
");

$best = $result->fetch_assoc();
?>
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
<div class="card p-5 text-center">
    <h2>✅ Recommended Station</h2>

    <h3 class="mt-3 text-primary"><?= $best['name'] ?></h3>

    <h4 class="mt-2">
        Crowd Level: 
        <span class="badge bg-success"><?= $best['crowd_level'] ?></span>
    </h4>
</div>

<?php include '../includes/footer.php'; ?>