<?php
include 'includes/db.php';

if ($_POST) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $contact = $_POST['contact'];

    $conn->query("INSERT INTO resources (name, category, location, description, contact)
                  VALUES ('$name','$category','$location','$description','$contact')");

    header("Location: index.php");
}
