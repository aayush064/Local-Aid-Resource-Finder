<?php
include '../includes/db.php';
session_start();

if ($_POST) {
    $u = $_POST['username'];
    $p = md5($_POST['password']);

    $res = $conn->query("SELECT * FROM admins WHERE username='$u' AND password='$p'");
    if ($res->num_rows == 1) {
        $_SESSION['admin'] = $u;
        header("Location: dashboard.php");
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<div id="adminLogin">
    <h2>Admin Login</h2>
    <?php if(isset($error)) echo "<p style='color:red; text-align:center;'>$error</p>"; ?>
    <form method="post">
        <input name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
