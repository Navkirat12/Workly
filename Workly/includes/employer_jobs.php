<?php
include 'db_connect.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$employer_id = $_SESSION['user_id'];

$sql = "SELECT applications.id, jobs.title, users.name AS applicant_name, applications.resume, applications.status
        FROM applications
        JOIN jobs ON applications.job_id = jobs.id
        JOIN users ON applications.job_seeker_id = users.id
        WHERE jobs.employer_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $employer_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Job Title</th>
                <th>Applicant Name</th>
                <th>Resume</th>
                <th>Status</th>
                <th>Update Status</th>
            </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['title']) . "</td>
                <td>" . htmlspecialchars($row['applicant_name']) . "</td>
                <td><a href='" . htmlspecialchars($row['resume']) . "' target='_blank'>View Resume</a></td>
                <td>" . htmlspecialchars($row['status']) . "</td>
                <td>
                    <form action='includes/update_application.php' method='POST'>
                        <input type='hidden' name='application_id' value='" . htmlspecialchars($row['id']) . "'>
                        <select name='status'>
                            <option value='Pending' " . ($row['status'] == 'Pending' ? 'selected' : '') . ">Pending</option>
                            <option value='Reviewed' " . ($row['status'] == 'Reviewed' ? 'selected' : '') . ">Reviewed</option>
                            <option value='Accepted' " . ($row['status'] == 'Accepted' ? 'selected' : '') . ">Accepted</option>
                            <option value='Rejected' " . ($row['status'] == 'Rejected' ? 'selected' : '') . ">Rejected</option>
                        </select>
                        <button type='submit'>Update</button>
                    </form>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No applications yet.</p>";
}
?>


