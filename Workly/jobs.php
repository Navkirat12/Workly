<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Jobs | Job Portal</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <?php include 'includes/job_search.php'; ?>
    
    <div class="container">
        <h2>Search & Filter Jobs</h2>
        <form method="GET" action="jobs.php">
            <input type="text" name="search" placeholder="Search by Job Title" value="<?php echo htmlspecialchars($search_query); ?>">
            <input type="text" name="category" placeholder="Category" value="<?php echo htmlspecialchars($category); ?>">
            <input type="text" name="location" placeholder="Location" value="<?php echo htmlspecialchars($location); ?>">
            <input type="number" name="salary" placeholder="Minimum Salary" value="<?php echo htmlspecialchars($salary); ?>">
            <button type="submit">Search</button>
        </form>

        <h2>Available Jobs</h2>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Salary</th>
                    <th>Details</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                        <td>$<?php echo $row['salary']; ?></td>
                        <td><a href="apply.php?job_id=<?php echo $row['id']; ?>" class="btn">Apply</a></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No jobs found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
