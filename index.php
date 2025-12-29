<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Local Aid Resource Finder</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<h1>Local Aid Resource Finder</h1>

<!-- Search bar -->
<div class="filters">
    <input type="text" id="search" placeholder="Search help..." onkeyup="filterResources()">
    <select id="category" onchange="filterResources()">
        <option value="">All Categories</option>
        <option value="Food">Food</option>
        <option value="Health">Health</option>
        <option value="Shelter">Shelter</option>
        <option value="Education">Education</option>
    </select>
</div>

<div id="results">
<?php
$result = $conn->query("SELECT * FROM resources");
while ($row = $result->fetch_assoc()) {
    echo "<div class='card'>
            <span class='badge {$row['category']}'>{$row['category']}</span>
            <h3>{$row['name']}</h3>
            <p><b>Location:</b> {$row['location']}</p>
            <p>{$row['description']}</p>
            <p><b>Contact:</b> {$row['contact']}</p>
            <a target='_blank' href='https://www.google.com/maps/search/{$row['location']}'>View on Map</a>
            <a class='messageBtn' href='message.php?resource_id={$row['id']}' style='display:block; margin-top:10px; text-align:center; background:#0d6efd; color:white; padding:10px; border-radius:8px; text-decoration:none;'>Message</a>
          </div>";
}
?>
</div>

<script>
function filterResources() {
    const searchText = document.getElementById("search").value.toLowerCase();
    const category = document.getElementById("category").value;

    const cards = document.querySelectorAll("#results .card");

    cards.forEach(card => {
        const name = card.querySelector("h3").innerText.toLowerCase();
        const desc = card.querySelector("p:nth-of-type(2)").innerText.toLowerCase(); // description
        const cardCategory = card.querySelector(".badge").innerText;

        const matchesSearch = name.includes(searchText) || desc.includes(searchText);
        const matchesCategory = category === "" || cardCategory === category;

        if (matchesSearch && matchesCategory) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
}
</script>

</body>
</html>
