<?php
include 'includes/db.php';

$resource_id = $_GET['resource_id'] ?? 0;
$stmt = $conn->prepare("SELECT sender_name, message FROM messages WHERE resource_id=? ORDER BY created_at ASC");
$stmt->bind_param("i", $resource_id);
$stmt->execute();
$result = $stmt->get_result();

$messages = [];
while($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

header('Content-Type: application/json');
echo json_encode($messages);
?>
