<?php
include '../includes/auth.php';
include '../includes/db.php';

if ($_POST) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $contact = $_POST['contact'];

    $conn->query("INSERT INTO resources (name, category, location, description, contact)
                  VALUES ('$name','$category','$location','$description','$contact')");

    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Resource</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<div id="adminLogin"> <!-- Reusing the professional form style -->
    <h2>Add New Resource</h2>
    <form method="post">
        <input name="name" placeholder="Resource Name" required>
        <select name="category" required>
            <option value="">Select Category</option>
            <option value="Food">Food</option>
            <option value="Health">Health</option>
            <option value="Shelter">Shelter</option>
            <option value="Education">Education</option>
        </select>
        <input name="location" placeholder="Location" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <input name="contact" placeholder="Contact Info" required>
        <button type="submit">Add Resource</button>
    </form>
    <a href="dashboard.php" style="display:block; text-align:center; margin-top:15px; color:#0d6efd;">← Back to Dashboard</a>
</div>

</body>
</html>
