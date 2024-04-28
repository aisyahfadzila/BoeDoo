<?php
include("config.php");

if (isset($_POST['post_job'])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $wage = mysqli_real_escape_string($conn, $_POST["wage"]);
    $duration = mysqli_real_escape_string($conn, $_POST["duration"]);
    $industry = mysqli_real_escape_string($conn, $_POST["industry"]);
    $job_desc = mysqli_real_escape_string($conn, $_POST["job_desc"]);
    $working_type = $_POST["working_type"];
    $skill_level = $_POST["skill_level"];
    $job_type = $_POST["job_type"];
    $status = "Pending";

    $title = ucwords($title);
    $industry = ucwords($industry);

    $insert = mysqli_query($conn, "INSERT INTO jobs(title, wage, duration_in_day, industry, working_type, employee_level, job_desc, employer_id, job_type, posted_date, status)
     values('$title', '$wage', '$duration', '$industry', '$working_type', '$skill_level', '$job_desc', '{$_SESSION['user_id']}', '$job_type', NOW(), '$status')");

    if ($insert === TRUE) {
        echo '<script>alert("' . ucwords($job_type) . ' sucessfully added!\nPlease wait for admin to review your post.\nYou can see your job status in My Jobs");
        window.location.href = "../public/discover.php";</script>';
    } else {
        echo '<script>alert("Failed to process your request, please try again.");
        window.location.href = "../public/post_job.php";</script>';
    }
}

$conn->close();
?>