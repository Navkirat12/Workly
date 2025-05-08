<?php
include 'db_connect.php'; 
session_start();
$_SESSION['user_id'] = $row['id'];
$_SESSION['user_type'] = $row['user_type']; // Ensure this is set
 

$message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, name, password, role FROM users WHERE email = ?");
    if (!$stmt) {
        die("Failed to prepare statement: " . $conn->error);  
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $name, $hashed_password, $role);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['user_name'] = $name;
        $_SESSION['role'] = $role;

        
        if ($role == "employer") {
            header("Location: dashboard_employer.php"); 
        } else {
            header("Location: dashboard_job_seeker.php"); 
        }
        exit();  
    } else {

        $message = "Invalid email or password!";
    }
}
?>


