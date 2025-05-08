<?php
include '../db_connect.php';

// Get search input
$search_query = isset($_GET['search']) ? $_GET['search'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';
$location = isset($_GET['location']) ? $_GET['location'] : '';
$salary = isset($_GET['salary']) ? $_GET['salary'] : '';

// SQL Query
$sql = "SELECT * FROM jobs WHERE title LIKE ? AND category LIKE ? AND location LIKE ? AND salary >= ? LIMIT 10";
$stmt = $conn->prepare($sql);
$search_param = "%$search_query%";
$category_param = "%$category%";
$location_param = "%$location%";
$salary_param = $salary ?: 0;
$stmt->bind_param("sssi", $search_param, $category_param, $location_param, $salary_param);
$stmt->execute();
$result = $stmt->get_result();

// Output results as JSON
$jobs = [];
while ($row = $result->fetch_assoc()) {
    $jobs[] = $row;
}
echo json_encode($jobs);
?>
