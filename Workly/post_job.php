<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post a Job | Job Portal</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>Post a Job</h2>
        <form action="includes/post_job_process.php" method="POST">
            <input type="text" name="title" placeholder="Job Title" required>
            <textarea name="description" placeholder="Job Description" required></textarea>
            <input type="text" name="category" placeholder="Category" required>
            <input type="text" name="location" placeholder="Location" required>
            <input type="text" name="salary" placeholder="Salary" required>
            <button type="submit">Post Job</button>
        </form>
    </div>
</body>
</html>
