<?php
// 1. Connect to your database
$servername = "localhost"; 
$username   = "root"; 
$password   = ""; 
$dbname     = "travel_db"; // Your DB name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Get search term
$searchTerm = isset($_GET['query']) ? $_GET['query'] : '';

if ($searchTerm) {
    // 3. SQL query to find matching packages
    $sql = "SELECT * FROM packages 
            WHERE destination LIKE ? OR title LIKE ?";
    $stmt = $conn->prepare($sql);
    $likeTerm = "%" . $searchTerm . "%";
    $stmt->bind_param("ss", $likeTerm, $likeTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    // 4. Show results
    if ($result->num_rows > 0) {
        echo "<h2>Search results for '$searchTerm':</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='package'>";
            echo "<h3>" . $row['title'] . "</h3>";
            echo "<p>" . $row['description'] . "</p>";
            echo "<strong>Price: $" . $row['price'] . "</strong>";
            echo "</div><hr>";
        }
    } else {
        echo "<p>No packages found for '$searchTerm'.</p>";
    }
} else {
    echo "<p>Please enter a search term.</p>";
}

$conn->close();
?>
