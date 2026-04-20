<?php
include '../config/db.php';
include '../includes/header.php';

$result = $conn->query("
SELECT stations.name, queue_status.crowd_level 
FROM stations 
JOIN queue_status ON stations.id = queue_status.station_id
");
?>

<h2>Queue Status</h2>

<table class="table table-bordered">
<tr>
<th>Station</th>
<th>Queue</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
<td><?= $row['name'] ?></td>
<td><?= $row['crowd_level'] ?></td>
</tr>
<?php } ?>

</table>

<?php include '../includes/footer.php'; ?>