<?php
include("config.php");
include("util.php");
require("user-data.php");

if (isset($_POST['check'])) {
    if ($cvFileName == "") {
        echo "cv_missing";
    }

    if ($profiles_address == "" || $profiles_linkedin == "" || $firstName == "" || $lastName == "" || $user_email == "" || $profiles_title == "") {
        echo "profile_missing";
    }
} else if (isset($_POST['apply'])) {
    $proposal = mysqli_real_escape_string($conn, $_POST["proposal"]);
    $job_id = $_POST["id"];
    $job_type = $_POST["job_type"];
    $ktmFileName = uploadFile($_FILES["ktm"], "../assets/ktm/");

    $sql = "INSERT INTO apply(proposal, employees_id, job_id, ktm, submit_date)
      VALUES ('$proposal', '{$_SESSION['user_id']}', $job_id, '$ktmFileName', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("You have successfully applied!");
        window.location.href = "../public/my_jobs.php#applications-row";
        </script>';
    } else {
        echo mysqli_error($conn);
        echo '<script>alert("There`s a problem on the system, Please try again.");
        
        window.location.href = "../public/discover.php";

     </script>';
    }
}
?>