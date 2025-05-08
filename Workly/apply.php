<?php
if (!isset($_GET['job_id'])) {
    echo "Job ID is missing!";
    exit();
}

$job_id = $_GET['job_id'];  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Job | Job Portal</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>Apply for Job</h2>
        <form action="includes/apply_process.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="job_id" value="<?php echo htmlspecialchars($job_id); ?>"> 
            <input type="file" name="resume" required>
            <button type="submit">Submit Application</button>
        </form>
    </div>
</body>
</html>

