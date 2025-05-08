<?php
include '../db_connect.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'job_seeker') {
    echo "<script>alert('Access Denied! Only job seekers can view applications.'); window.location.href='../dashboard_seeker.php';</script>";
    exit();
}

$job_seeker_id = $_SESSION['user_id'];

$sql = "SELECT applications.id, jobs.title AS job_title, applications.resume, applications.status, employers.company_name
        FROM applications
        JOIN jobs ON applications.job_id = jobs.id
        JOIN users AS employers ON jobs.employer_id = employers.id
        WHERE applications.job_seeker_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $job_seeker_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<h2>Your Job Applications</h2>";
    echo "<table border='1'>
            <tr>
                <th>Job Title</th>
                <th>Company</th>
                <th>Resume</th>
                <th>Status</th>
            </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['job_title']) . "</td>
                <td>" . htmlspecialchars($row['company_name']) . "</td>
                <td><a href='" . htmlspecialchars($row['resume']) . "' target='_blank'>View Resume</a></td>
                <td>" . htmlspecialchars($row['status']) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No applications found.</p>";
}
?>
