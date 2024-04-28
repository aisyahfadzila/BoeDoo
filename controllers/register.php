<?php
include("config.php");
include("util.php");

if (isset($_POST['sign_up'])) {

    $first_name = mysqli_real_escape_string($conn, $_POST["fname"]);
    $last_name = mysqli_real_escape_string($conn, $_POST["lname"]);
    $username = mysqli_real_escape_string($conn, $_POST["uname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["psw"]);
    $sec_question = mysqli_real_escape_string($conn, $_POST["sec_question"]);
    $answer = mysqli_real_escape_string($conn, $_POST["answer"]);


    $password = password_hash($password, PASSWORD_DEFAULT);
    $answer = password_hash($answer, PASSWORD_DEFAULT);
    $first_name_capitalized = ucwords($first_name);
    $last_name_capitalized = ucwords($last_name);

    $check = mysqli_query($conn, "SELECT username OR email FROM users WHERE username = '$username' OR email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        echo '<script>alert("Email or Username already exist!");window.location.href = "../public/landing.php";</script>';
    }

    $sql = "INSERT INTO users(first_name, last_name, username, email, password, question_id, answer)
  VALUES ('$first_name_capitalized', '$last_name_capitalized', '$username', '$email', '$password', '$sec_question', '$answer')";


    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Register Success! Please login first.");window.location.href = "../public/landing.php";</script>';
    } else {
        echo '<script>alert("Failed to process your request, please try again.");
        window.location.href = "../public/landing.php";</script>';
    }
}
?>