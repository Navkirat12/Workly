<?php include $_SERVER['DOCUMENT_ROOT'] . '/Workly/db_connect.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();} ?>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="jobs.php">Jobs</a></li>
            <?php if (isset($_SESSION['user_id'])): ?>
                <?php if ($_SESSION['role'] == 'employer'): ?>
                    <li><a href="dashboard_employer.php">Dashboard</a></li>
                    <li><a href="track_applications.php">Applications</a></li>
                <?php else: ?>
                    <li><a href="dashboard_job_seeker.php">Dashboard</a></li>
                <?php endif; ?>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="login.html">Login</a></li>
                <li><a href="register.php">Register</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
