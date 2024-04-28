<?php
include("config.php");

if (isset($_POST['request_recover'])) {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $newPassword = mysqli_real_escape_string($conn, $_POST["pass"]);
    $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $sec_question = $_POST["sec_question"];
    $answer = $_POST["answer"];

    $sql = "SELECT * FROM users WHERE email='$email' AND question_id = '$sec_question'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 0) {
        echo '<script>alert("Your data did not match! failed to update password.");window.location.href = "../public/landing.php";</script>';
    } else {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($answer, $row['answer'])) {
            $update = mysqli_query($conn, "UPDATE users SET password = '$newPassword' WHERE email = '$email' ");
            if (mysqli_affected_rows($conn) > 0) {
                echo '<script>alert("Your password has been updated.");window.location.href = "../public/landing.php";
        </script>';
            } else {
                echo '<script>alert("Failed to process your request, please try again.");
        window.location.href = "../public/landing.php";</script>';
            }
        }
    }
}

$conn->close();
?>