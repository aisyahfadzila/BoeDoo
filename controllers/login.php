<?php
include("config.php");

$username = mysqli_real_escape_string($conn, $_POST["uname"]);
$password = mysqli_real_escape_string($conn, $_POST['psw']);

$sql = "SELECT * FROM admins WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    if (md5($password) == $row['password']) {
        $_SESSION['admin_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['admin'] = true;
        ?>
        <script>
            alert("Login success! Welcome, <?php echo $_SESSION['username'] ?>.");
            window.location.href = "../public/admin.php?page=dashboard";
        </script>
        <?php
    } else {
        ?>
        <script>alert('Wrong password, please try again!'); window.location.href = "../public/landing.php";</script>
        <?php
        die;
    }
} else {

    if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT * FROM users WHERE email='$username'";
        $result = mysqli_query($conn, $sql);
    } else {
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
    }


    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['is_logged_in'] = true;

            ?>
            <script>alert("Login success! Welcome, <?php echo $_SESSION['username'] ?>."); window.location.href = "../public/discover.php";</script>
            ';
            <?php
            exit();
        } else {
            ?>
            <script>alert('Wrong password, please try again!'); window.location.href = "../public/landing.php";</script>
            <?php
            die;
        }
    } else {
        echo '<script>alert("Username or Email not found.");window.location.href = "../public/landing.php";</script>';
        exit();
    }
}
?>