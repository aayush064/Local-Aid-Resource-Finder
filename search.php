<?php
include 'includes/db.php';

$q = $_GET['q'] ?? '';
$category = $_GET['category'] ?? '';

$sql = "SELECT * FROM resources WHERE 1";

if ($q) {
    $sql .= " AND (name LIKE '%$q%' OR description LIKE '%$q%')";
}

if ($category) {
    $sql .= " AND category='$category'";
}

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<div class='card'>
            <h3>{$row['name']}</h3>
            <p><b>Category:</b> {$row['category']}</p>
            <p><b>Location:</b> {$row['location']}</p>
            <p>{$row['description']}</p>
            <p><b>Contact:</b> {$row['contact']}</p>
            <p><a target='_blank' href='https://www.google.com/maps/search/{$row['location']}'>View on Map</a></p>
          </div>";
}
?>
