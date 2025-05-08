<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Workly/db_connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employer_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $location = $_POST['location'];
    $salary = $_POST['salary'];

    $stmt = $conn->prepare("INSERT INTO jobs (employer_id, title, description, category, location, salary) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $employer_id, $title, $description, $category, $location, $salary);

    if ($stmt->execute()) {
        header("Location: dashboard_employer.php?msg=Job posted successfully");
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

