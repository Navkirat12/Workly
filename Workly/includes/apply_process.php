<?php
include '../db_connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_id = $_POST['job_id'];
    $job_seeker_id = $_SESSION['user_id'];

    // File Upload Handling
    $target_dir = "../uploads/resumes/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true); // Create folder if not exists
    }

    $resume_file = $target_dir . basename($_FILES["resume"]["name"]);
    $resume_db_path = "uploads/resumes/" . basename($_FILES["resume"]["name"]); // Save relative path for DB

    if (move_uploaded_file($_FILES["resume"]["tmp_name"], $resume_file)) {
        // Insert into database
        $sql = "INSERT INTO applications (job_id, job_seeker_id, resume, status) VALUES (?, ?, ?, 'Pending')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iis", $job_id, $job_seeker_id, $resume_db_path);

        if ($stmt->execute()) {
            echo "<script>alert('Application submitted successfully!'); window.location.href='../dashboard_seeker.php';</script>";
        } else {
            echo "<script>alert('Error submitting application!'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Failed to upload resume!'); window.history.back();</script>";
    }
}
?>



