<?php
include 'includes/db.php';

$resource_id = $_GET['resource_id'] ?? 0;
$res = $conn->query("SELECT * FROM resources WHERE id='$resource_id'")->fetch_assoc();

if($_POST) {
    $sender_name = $_POST['sender_name'];
    $sender_email = $_POST['sender_email'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO messages (resource_id, sender_name, sender_email, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $resource_id, $sender_name, $sender_email, $message);
    $stmt->execute();
    $stmt->close();

    $success = "Message sent successfully!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Message <?php echo $res['name']; ?></title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div id="adminLogin" style="max-width:600px; margin:50px auto;">
    <h2>Message <?php echo $res['name']; ?></h2>
    <p><b>Location:</b> <?php echo $res['location']; ?></p>
    <p><b>Contact:</b> <?php echo $res['contact']; ?></p>

    <?php if(isset($success)) echo "<p style='color:green; text-align:center;'>$success</p>"; ?>

    <form method="post">
        <input type="text" name="sender_name" placeholder="Your Name" required>
        <input type="email" name="sender_email" placeholder="Your Email" required>
        <textarea name="message" placeholder="Your Message" required style="min-height:200px;"></textarea>
        <button type="submit">Send Message</button>
    </form>

    <a href="index.php" style="display:block; text-align:center; margin-top:15px;">← Back to Resources</a>
</div>

</body>
</html>
