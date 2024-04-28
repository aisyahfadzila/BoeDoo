<?php
$cvDirectory = "../assets/cv/";
$targetDirectory = "../assets/profile/";
$certifDirectory = "../assets/certifications/";
$user_id = $_SESSION['user_id'] ?? "";

// User
$result_users = mysqli_query($conn, "SELECT * FROM users WHERE id = '$user_id'");
$row_users = mysqli_fetch_assoc($result_users);
$firstName = $row_users['first_name'] ?? "";
$lastName = $row_users['last_name'] ?? "";
$user_email = $row_users['email'] ?? "";

// Profiles
$result_profiles = mysqli_query($conn, "SELECT * FROM profiles WHERE user_id = '$user_id'");
$row_profiles = mysqli_fetch_assoc($result_profiles);
$profiles_id = $row_profiles['id'] ?? "";
$profiles_title = $row_profiles['profession'] ?? "";
$profiles_desc = $row_profiles['description'] ?? "";
$profiles_address = $row_profiles['address'] ?? "";
$profiles_linkedin = $row_profiles['linkedin'] ?? "";
$cvFileName = $row_profiles['cv'] ?? "";
$fileName = $row_profiles['icon_profile'] ?? "";


// Porto
$result_porto = mysqli_query($conn, "SELECT * FROM portfolios WHERE profiles_id = '$profiles_id'");
$row_porto = mysqli_fetch_assoc($result_porto);
$porto_title = $row_porto['title'] ?? "";
$porto_desc = $row_porto['description'] ?? "";
$porto_link = $row_porto['link'] ?? "";

// Skills
$result_skills = mysqli_query($conn, "SELECT * FROM skills WHERE profiles_id = '$profiles_id'");
$row_skills = mysqli_fetch_assoc($result_skills) ?? "";
$skills_title = $row_skills['title'] ?? "";
$skills_desc = $row_skills['description'] ?? "";


// Certif
$result_certif = mysqli_query($conn, "SELECT * FROM certifications WHERE profiles_id = '$profiles_id'");
$row_certif = mysqli_fetch_assoc($result_certif);
$certif_title = $row_certif['title'] ?? "";
$certif_desc = $row_certif['description'] ?? "";
$certif_file = $row_certif['certif_file'] ?? "";

// Employment History
$result_work = mysqli_query($conn, "SELECT * FROM employment_history WHERE profiles_id = '$profiles_id'");
$row_work = mysqli_fetch_assoc($result_work);
$work_position = $row_work['work_position'] ?? "";
$company_name = $row_work['company_name'] ?? "";
$work_start_date = $row_work['work_start_date'] ?? "";
$work_end_date = $row_work['work_end_date'] ?? "";
?>
