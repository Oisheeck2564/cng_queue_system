<?php
include '../config/db.php';

$result = $conn->query("
SELECT stations.*, queue_status.crowd_level 
FROM stations 
JOIN queue_status ON stations.id = queue_status.station_id
");

$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);