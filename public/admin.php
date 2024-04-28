<?php
require '../controllers/config.php';

if (!isset($_SESSION["admin"])) {
  ?>
  <script>
    alert("Only admin can access this page.")
    document.location.href = "landing.php"
  </script>
  <?php
  die;
}
$admin = $_SESSION['admin'] ?? "";
?>

<!-- Job Query -->
<?php
$queryJob = mysqli_query($conn, "SELECT j.*, CONCAT(u.first_name, ' ', u.last_name) AS 'employer_name' FROM jobs j JOIN users u ON j.employer_id = u.id WHERE status = 'Pending' ORDER BY posted_date ASC");
$prev_page = "admin.php?page=dashboard";
?>
<!--  -->

<!-- Feedback Query -->
<?php
$queryFeedback = mysqli_query($conn, "SELECT u.*, fb.* FROM feedback fb JOIN users u ON fb.user_id = u.id");
?>
<!--  -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../views/css/admin.css" />
  <link rel="icon" type="image/x-icon" href="../views/img/2.png" />
  <title>BoeDoo - Discover</title>
</head>

<body>
  <!-- Header -->
  <?php
  if (isset($_GET['page']) && $_GET['page'] == "dashboard") {
    ?>
    <header class="nav-container">
      <ul>
        <a href="landing.php"><img src="../views/img/logo.png" /></a>
        <li>
          <a class="discover navActive navHover" href="admin.php?page=dashboard"><img src="../views/img/compass.png" />Job
          List</a>
        </li>
        <li>
          <a class="inbox navHover" href="admin.php?page=feedback"><img src="../views/img/briefcase (2).png" />Inbox</a>
        </li>
        <li style="float: right">
          <a id="profileBtn" href="#"><img class="nav-profile" src="../views/img/user (1).png" /></a>
        </li>
      </ul>
    </header>
    <?php include 'object/mini-profile.php' ?>
    <!--  -->

    <!-- Content Dashboard-->
    <div class="content">
      <div class="job-col">
        <h2>Jobs You Need to Review</h2>
        <?php
        if (mysqli_num_rows($queryJob) > 0) {
          foreach ($queryJob as $row) {
            ?>
            <div class="job-row"
              onclick="window.location.href='job_details.php?title=<?php echo $row['title']; ?>&job_id=<?php echo $row['id']; ?>&job_type=<?php echo $row['job_type']; ?>&prev_page=<?php echo $prev_page; ?>'">
              <div class="job">
                <h3>
                  <?php echo $row['title']; ?>
                </h3>
                <p class="employer">
                  <?php echo $row['employer_name']; ?>
                </p>
              </div>
              <div class="see-btn">
                <p>
                  <?php echo date("j F Y", strtotime($row['posted_date'])); ?>
                </p>
              </div>
            </div>
            <?php
          }
        } else {
          echo "No pending jobs at the moment.";
        }
        ?>
      </div>
    </div>
    <!-- Content Dashboard End-->

    <?php
  } else if (isset($_GET['page']) && $_GET['page'] == "feedback") {
    ?>
      <header class="nav-container">
        <ul>
          <a href="landing.php"><img src="../views/img/logo.png" /></a>
          <li>
            <a class="discover navHover" href="admin.php?page=dashboard"><img src="../views/img/compass.png" />Job List</a>
          </li>
          <li>
            <a class="inbox navActive navHover" href="admin.php?page=feedback"><img
                src="../views/img/briefcase (2).png" />Inbox</a>
          </li>
          <li style="float: right">
            <a id="profileBtn" href="#"><img class="nav-profile" src="../views/img/user (1).png" /></a>
          </li>
        </ul>
      </header>

      <!-- Content Dashboard-->
      <div class="content">
        <div class="job-col">
          <h2>Feedbacks</h2>
          <?php
          if (mysqli_num_rows($queryFeedback) > 0) {
            foreach ($queryFeedback as $row) {
              ?>
              <div class="job-row1">
                <div class="job">
                  <h3>
                  <?php echo $row['username']; ?>
                  </h3>
                  <p class="employer">
                  <?php echo $row['message']; ?>
                  </p>
                </div>
                <div class="see-btn">
                  <p>
                  <?php echo date("j F Y", strtotime($row['message_date'])); ?>
                  </p>
                </div>
              </div>
            <?php
            }
          }
          ?>
        </div>
      </div>
      <!-- Content Dashboard End-->
    <?php
  }
  ?>
  <!-- Footer -->
  <?php include 'object/footer.php' ?>
  <!--  -->
  <?php include 'object/scripts.php' ?>
</body>

</html>