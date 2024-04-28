<?php
include "config.php";
if (isset($_POST["feedback"])) {
  $message = $_POST["message"];

  $query = "INSERT INTO feedback (user_id, message, message_date) VALUES ('{$_SESSION['user_id']}', '$message', NOW())";
  $update = $conn->query($query);
  if ($update == true) {
    echo '<script>alert("Your message has been sent!");window.location.href="../public/landing.php"</script>';
  } else {
    echo '<script>alert(Failed to send message. Please try again.);window.location.href="../public/landing.php"</script>';
  }
}

?>