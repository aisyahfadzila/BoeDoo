<!-- save new applicant data -->
<?php
include("config.php");
include("util.php");
include("user-data.php");

if (isset($_POST['save'])) {

    $currentPFP = "";
    $currentCV = $cvFileName;

    if (mysqli_num_rows($result_profiles) === 0) {
        mysqli_query($conn, "INSERT INTO profiles(user_id) VALUES('$user_id')");
    } else {
        $currentPFP = $fileName;
    }

    // Profiles
    $newFirstName = mysqli_real_escape_string($conn, $_POST['first_name']);
    $newLastName = mysqli_real_escape_string($conn, $_POST['last_name']);
    $newEmail = mysqli_real_escape_string($conn, $_POST['user_email']);
    $newAddress = mysqli_real_escape_string($conn, $_POST['user_address']);
    $newLinkedIn = mysqli_real_escape_string($conn, $_POST['linkedin_link']);
    $newTitle = mysqli_real_escape_string($conn, $_POST['user_title']);
    $newDesc = mysqli_real_escape_string($conn, $_POST['user_desc']);
    $iconfileName = uploadFile($_FILES["icon_profile"], "../assets/profile/");
    $cvfileName = uploadFile($_FILES["cv"], "../assets/cv/");

    // File Deletion
    $deleteIcon = $_POST['delete_icon'];
    $deleteCV = $_POST['delete_cv'];

    // Employees
    $porto_title = mysqli_real_escape_string($conn, $_POST['porto_title']);
    $porto_desc = mysqli_real_escape_string($conn, $_POST['porto_desc']);
    $porto_link = mysqli_real_escape_string($conn, $_POST['porto_link']);

    // Skills
    $skills_title = mysqli_real_escape_string($conn, $_POST['skills_title']);
    $skills_desc = mysqli_real_escape_string($conn, $_POST['skills_desc']);

    // Certif
    $certif_title = mysqli_real_escape_string($conn, $_POST['certif_title']);
    $certif_desc = mysqli_real_escape_string($conn, $_POST['certif_desc']);
    $certifileName = uploadFile($_FILES["certif_file"], "../assets/certifications/");

    // Employment History
    $work_position = mysqli_real_escape_string($conn, $_POST['work_position']);
    $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
    $work_start_date = mysqli_real_escape_string($conn, $_POST['work_start_date']);
    $work_end_date = mysqli_real_escape_string($conn, $_POST['work_end_date']);

    $updateQuery = "UPDATE profiles SET profession = '$newTitle', description = '$newDesc', linkedin = '$newLinkedIn', address = '$newAddress'";
    $updateUser = mysqli_query($conn, "UPDATE users SET first_name = '$newFirstName', last_name = '$newLastName', email = '$newEmail' WHERE id = '$user_id'");

    if ($iconfileName != "") {
        $updateQuery .= ", icon_profile = '$iconfileName' WHERE user_id = '$user_id'";
    } else {
        $updateQuery .= "WHERE user_id = '$user_id'";
    }

    if ($porto_title != "") {
        $check_Existing_Id = mysqli_query($conn, "SELECT * FROM portfolios WHERE profiles_id = '$profiles_id'");
        if (mysqli_num_rows($check_Existing_Id) > 0) {
            $updatePorto = mysqli_query($conn, "UPDATE portfolios SET title = '$porto_title', description = '$porto_desc', link = '$porto_link' WHERE profiles_id = '$profiles_id'");
        } else {
            $updatePorto = mysqli_query($conn, "INSERT INTO portfolios (title, link, description, profiles_id) VALUES('$porto_title', '$porto_link', '$porto_desc', '$profiles_id')");
        }
    }

    if ($work_position != "") {
        $check_Existing_Id = mysqli_query($conn, "SELECT * FROM employment_history WHERE profiles_id = $profiles_id");
        if (mysqli_num_rows($check_Existing_Id) > 0) {
            $updateWork = mysqli_query($conn, "UPDATE employment_history SET work_position = '$work_position', company_name = '$company_name', work_start_date = '$work_start_date', work_end_date = '$work_end_date' WHERE profiles_id = '$profiles_id'");
        } else {
            $updateWork = mysqli_query($conn, "INSERT INTO employment_history (work_position, company_name, work_start_date, work_end_date, profiles_id) VALUES('$work_position', '$company_name', '$work_start_date', '$work_end_date', '$profiles_id')");
        }
    }

    if ($skills_title != "" || $skills_desc != "") {
        $check_userid = mysqli_query($conn, "SELECT * FROM skills WHERE profiles_id = '$profiles_id'");
        if (mysqli_num_rows($check_userid) > 0) {
            $updateSkills = mysqli_query($conn, "UPDATE skills SET title = '$skills_title', description = '$skills_desc' WHERE profiles_id = '$profiles_id'");

        } else {
            $updateSkills = mysqli_query($conn, "INSERT INTO skills (title, description, profiles_id) VALUES('$skills_title', '$skills_desc', '$profiles_id')");
        }
    }

    if ($deleteCV !== "exist") {
        if ($currentCV != "") {
            if (file_exists($cvTargetDirectory . $currentCV)) {
                unlink($cvTargetDirectory . $currentCV);
            }
            $deleteQuery = mysqli_query($conn, "UPDATE profiles SET cv = NULL WHERE user_id = '$user_id'");
        }
    }
    $check_cv = mysqli_query($conn, "SELECT cv FROM profiles WHERE user_id = '$user_id'");
    $row_cv = mysqli_fetch_assoc($check_cv);
    $currentCV = $row_cv['cv'] ?? "";
    if ($cvfileName != "") {
        if ($currentCV != NULL) {
            ?>
            <script>alert('CV already exist! Please delete before inserting another one!'); window.location.href = "../public/my_profile.php"</script>
            <?php
        } else {
            $updateCV = mysqli_query($conn, "UPDATE profiles SET cv = '$cvfileName' WHERE user_id = '$user_id'");
        }
    }

    if ($certifileName != "") {
        $updateCertif = mysqli_query($conn, "INSERT INTO certifications(title, description, certif_file, profiles_id) VALUES('$certif_title', '$certif_desc', '$certifileName', '$profiles_id')");
    }

    $resultQuery = mysqli_query($conn, $updateQuery);

    $deleteQuery = "";
    if ($deleteIcon !== "exist") {
        if (file_exists($iconTargetDirectory . $currentPFP)) {
            unlink($iconTargetDirectory . $currentPFP);
        }
        $deleteQuery = mysqli_query($conn, "UPDATE profiles SET icon_profile = NULL WHERE user_id = '$user_id'");
    }

    if ($resultQuery == TRUE && $updateUser == TRUE) {
        ?>
        <script>alert('Profile Updated!'); window.location.href = "../public/my_profile.php"</script>
        <?php
    } else {
        ?>
        <script>alert('Failed to process your request, please try again.'); window.location.href = "../public/my_profile.php"</script>
        <?php
    }
    exit();
}
?>
<!--  -->