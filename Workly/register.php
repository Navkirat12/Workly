<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Workly/db_connect.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Securely hash password
    $role = $_POST['role']; // "job_seeker" or "employer"

    // Check if email already exists
    $check_stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_stmt->store_result();
    
    if ($check_stmt->num_rows > 0) {
        $message = "Email already registered!";
    } else {
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $password, $role);

        if ($stmt->execute()) {
            $_SESSION['user_id'] = $stmt->insert_id;
            $_SESSION['user_name'] = $name;
            $_SESSION['role'] = $role;

            // Redirect based on role
            if ($role == "employer") {
                header("Location: dashboard_employer.php");
            } else {
                header("Location: dashboard_job_seeker.php");
            }
            exit();
        } else {
            $message = "Registration failed. Try again!";
        }
    }
    $check_stmt->close();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Job Portal</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <label for="name">Full Name:</label>
            <input type="text" name="name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <label for="role">Register As:</label>
            <select name="role" required>
                <option value="job_seeker">Job Seeker</option>
                <option value="employer">Employer</option>
            </select>

            <button type="submit">Register</button>
        </form>
        <p><?php echo $message; ?></p>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>


