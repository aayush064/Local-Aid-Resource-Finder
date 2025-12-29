<?php
include '../includes/auth.php';
include '../includes/db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<div id="adminDashboard">
    <h2>Admin Dashboard</h2>
    <a class="button" href="add_resource.php">Add Resource</a>
    <a class="button" href="logout.php" style="background:#ff6b6b;">Logout</a>

    <table>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Location</th>
            <th>Contact</th>
            <th>Action</th>
        </tr>
        <?php
        $res = $conn->query("SELECT * FROM resources");
        while ($r = $res->fetch_assoc()) {
            echo "<tr>
                    <td>{$r['name']}</td>
                    <td>{$r['category']}</td>
                    <td>{$r['location']}</td>
                    <td>{$r['contact']}</td>
                    <td><a href='delete_resource.php?id={$r['id']}' style='color:red;'>Delete</a></td>
                  </tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
