<?php
// Database connection
include_once 'partials/db_connect.php';

$query = "SELECT * FROM news ORDER BY date DESC LIMIT 3";
$result = $conn->query($query);

$newsItems = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { 
        $newsItems[] = [
            'title' => htmlspecialchars($row['title']),
            'date' => htmlspecialchars($row['date']),
            'excerpt' => htmlspecialchars($row['description']),
            'image' => '/' . htmlspecialchars($row['image']), // Absolute path from root
            'link' => '/news_item.php?id=' . $row['id'] // Absolute path from root
        ];
    }
}
?>
