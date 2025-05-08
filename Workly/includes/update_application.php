<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Workly/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $application_id = $_POST['application_id'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE applications SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $application_id);

    if ($stmt->execute()) {
        header("Location: ../track_applications.php?msg=Status updated");
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
