<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Workly/db_connect.php';

$sql = "SELECT id, title, location, salary FROM jobs ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>{$row['title']} - {$row['location']} - {$row['salary']} 
            <a href='apply.php?job_id={$row['id']}'>Apply</a></li>";
    }
    echo "</ul>";
} else {
    echo "<p>No jobs available.</p>";
}
?>
