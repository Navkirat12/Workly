<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Dashboard | Job Portal</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>Employer Dashboard</h2>
        <a href="post_job.php">Post a New Job</a>
        <h3>Your Job Listings</h3>
        <?php include 'includes/employer_jobs.php'; ?>
    </div>
</body>
</html>
