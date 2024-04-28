<?php
include "config.php";

if (isset($_POST['adminChoice'])) {
$adminChoice = $_POST['adminChoice'];
$job_id = $_POST['job_id'];

$update_Approval = mysqli_query($conn, "UPDATE jobs SET status = '$adminChoice', admin_id = '{$_SESSION['admin_id']}' WHERE id = '$job_id'");
}
?>