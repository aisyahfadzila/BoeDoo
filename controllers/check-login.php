<?php
if (!isset($_SESSION["is_logged_in"])) {
  if (isset($_SESSION["admin"])) {
    ?>
    <script>
      alert("You're not allowed to access this page with admin status.")
      document.location.href = "admin.php?page=dashboard"
    </script>
    <?php
  } else {
    ?>
    <script>
      alert("Please login first.")
      document.location.href = "landing.php"
    </script>
    <?php
    die;
  }
}

?>