<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Workly/db_connect.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$search_query = isset($_GET['search']) ? $_GET['search'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';
$location = isset($_GET['location']) ? $_GET['location'] : '';
$salary = isset($_GET['salary']) ? $_GET['salary'] : '';

$sql = "SELECT * FROM jobs WHERE title LIKE ? AND category LIKE ? AND location LIKE ? AND salary >= ?";
$stmt = $conn->prepare($sql);
$search_param = "%$search_query%";
$category_param = "%$category%";
$location_param = "%$location%";
$salary_param = $salary ?: 0;
$stmt->bind_param("sssi", $search_param, $category_param, $location_param, $salary_param);
$stmt->execute();
$result = $stmt->get_result();
?>
