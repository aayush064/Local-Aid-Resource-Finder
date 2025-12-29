<?php
include 'includes/db.php';

if ($_POST) {
    $resource_id = $_POST['resource_id'];
    $sender_name = $_POST['sender_name'];
    $sender_email = $_POST['sender_email'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO messages (resource_id, sender_name, sender_email, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $resource_id, $sender_name, $sender_email, $message);
    $stmt->execute();
    $stmt->close();

    echo "success";
}
?>
