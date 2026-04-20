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

<div class="card p-5 text-center">
    <h2>✅ Recommended Station</h2>

    <h3 class="mt-3 text-primary"><?= $best['name'] ?></h3>

    <h4 class="mt-2">
        Crowd Level: 
        <span class="badge bg-success"><?= $best['crowd_level'] ?></span>
    </h4>
</div>

<?php include '../includes/footer.php'; ?>