<?php
require '../controllers/config.php';
require '../controllers/user-data.php';
if (!isset($_SESSION["is_logged_in"])) {
  if (isset($_SESSION["admin"])) {
    $_SESSION["admin"] = true;
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
<!-- Check if user is applied or no -->
<?php
$applied_employees = FALSE;
$applied_employers = FALSE;

if (isset($_SESSION['user_id'])) {
  $check = mysqli_query($conn, "SELECT * FROM apply WHERE employees_id = '{$_SESSION['user_id']}' AND job_id = '{$_GET['job_id']}'");
  if (mysqli_num_rows($check) > 0) {
    $applied_employees = TRUE;
  }

  $check_employers = mysqli_query($conn, "SELECT * FROM jobs WHERE employer_id = '{$_SESSION['user_id']}' AND id = '{$_GET['job_id']}'");
  if (mysqli_num_rows($check_employers) > 0) {
    $applied_employers = TRUE;
  }
}
?>
<!--  -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../views/css/jobdetails.css" />
  <link rel="icon" type="image/x-icon" href="../views/img/2.png" />
  <title>BoeDoo - Job Details</title>
</head>

<body>
  <!-- Header -->
  <?php
  if (isset($_SESSION['admin'])) {
    ?>
   <header class="nav-container">
      <ul>
        <a href="landing.php"><img src="../views/img/logo.png" /></a>
        <li>
          <a class="discover" href="admin.php?page=dashboard"><img src="../views/img/compass.png" />Job List</a>
        </li>
        <li>
          <a class="inbox navActive" href="admin.php?page=inbox"><img src="../views/img/briefcase (2).png" />Inbox</a>
        </li>
        <li style="float: right">
          <a id="profileBtn" href="#"><img class="nav-profile" src="../views/img/user (1).png" /></a>
        </li>
      </ul>
    </header>
    <?php
  } else {
    include 'object/navbar.php';
  }
  ?>
  <?php include 'object/mini-profile.php' ?>
  <!--  -->

  <!-- Content -->
  <?php
  if (isset($_GET['title'])) {
    // Mendapatkan judul dari parameter URL
    $title = $_GET['title'];
    $job_id = $_GET['job_id'];
    $job_type = $_GET['job_type'];
    $prev_page = $_GET['prev_page'];

    // Mengambil data job berdasarkan judul
    $query = "SELECT * FROM jobs WHERE title ='$title' AND job_type = '$job_type' AND id = $job_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
      $result_users = mysqli_query($conn, "SELECT CONCAT(u.first_name,' ',u.last_name) AS 'full_name' 
                                               FROM jobs j 
                                               JOIN users u ON j.employer_id = u.id
                                               WHERE j.employer_id = '{$row['employer_id']}'
                                               ");
      $result_count = mysqli_query($conn, "SELECT COUNT(id) FROM jobs WHERE employer_id = '{$row['employer_id']}' AND job_type = '$job_type' AND status = 'Approved'");
      $row_users = mysqli_fetch_assoc($result_users);
      $row_count = mysqli_fetch_assoc($result_count);
      $formattedDate = date("j F Y", strtotime($row['posted_date']));

      // Menampilkan detail job
      if ($row) {
        ?>
        <div class="content">
          <a href="<?php echo $prev_page; ?>" class="buttonBack"><img src="../views/img/arrowup.svg">Back</a><br><br>
          <div class="row-content">
            <div class="column1">
              <div class="column1in">
                <?php echo "<h2>" . $row['title'] . "</h2>"; ?>
                <div class="column1in-detail">
                  <div class="postedtime">
                    <?php echo "Posted on " . $formattedDate; ?>
                  </div>
                  <div class="working-type">
                    <?php echo $row["working_type"] ?>
                  </div>
                </div>
                <div class="column1-content">
                  <h3 style="text-align:left; padding: 1rem 0 0 3rem">Description<br></h3>
                  <?php echo "<p>" . $row['job_desc'] . "</p>"; ?>
                </div>
                <?php
                if (isset($_SESSION['admin'])) {
                  ?>
                  <div class="column1-content">
                    <h3 style="text-align:left; padding: 1rem 0 0 3rem">Wage<br></h3>
                    <?php echo "<p>" . $row['wage'] . " Million Rupiah" . "</p>"; ?>
                  </div>
                  <?php
                }
                ?>
                <div class="column1-content-el">
                  <h3>Skill level</h3>
                  <div class="emplo-level">
                    <?php echo "<p>" . $row['employee_level'] . "</p>"; ?>

                  </div>
                </div>
              </div>
            </div>


            <!-- user profile sidebar -->
            <?php
            if (substr($job_type, -1) === "s") {
              $job_type_title = substr($job_type, 0, -1);
              $job_type_title = ucwords($job_type_title);
            } else {
              $job_type_title = ucwords($job_type);
            }
            ?>
            <div class="column2">
              <h2>
                About Client
              </h2><br>
              <h3>Client's Name</h3>
              <div class="city">
                <p>
                  <?php echo $row_users['full_name']; ?>
                </p>
              </div><br>

              <h3>
                Industry
              </h3>
              <p>
                <?php echo $row['industry']; ?>
              </p><br>
              <h3>
                <?php if ($job_type !== "research") {
                  echo $row_count['COUNT(id)'] . " " . $job_type_title . "(s) Posted";
                } else {
                  echo $row_count['COUNT(id)'] . " " . $job_type_title . "(es) Posted";
                } ?>
              </h3><br><br>
              <h3>Share this job</h3>

              <div class="limited-text">
                <a class="copylink">
                  <?php echo $_SERVER['REQUEST_URI']; ?>
                </a>
              </div>

              <a href="" class="btncopy" onclick="copyLink()">Copy Link</a>
              <div class="wrapapply">
                <?php
                if (!isset($_SESSION["admin"])) {
                  if ($applied_employees == TRUE) {
                    echo "<p>You have applied to this job.</p>";
                  } else if ($applied_employers == TRUE) {
                    echo "";
                  } else {
                    ?>
                      <div id="apply-btn">
                        <a href="#" class="apply glow-button">Apply for this job</a>
                      </div>
                    <?php
                  }
                } else {
                  ?>
                  <span class="adminBtn">
                    <div class="wrap-approved" id="approve-btn">
                      <a class="approve appr-button">Approve</a>
                      <input type="hidden" id="adminApprove" value="Approved">
                    </div>
                    <div class="wrap-reject" id="reject-btn">
                      <a class="reject reject-button">Reject</a>
                      <input type="hidden" id="adminReject" value="Rejected">
                    </div>
                  </span>
                  <input type="hidden" id="job_id" value="<?php echo $job_id ?>">
                  <?php
                }
                ?>
              </div>
            </div>
            <!-- -->
          </div>
        </div>
        <?php
      }
    } else {
      ?>
      <div class="content">
        <a href="discover.php" class="buttonBack"><img src="../views/img/arrowup.svg">Back</a><br><br>
        <div class="row-content">
          <div class="column1">
            <div class="column1in">
              <div class="notFound" style="text-align: center;">Not Found.</div>
            </div>
          </div>
          <!-- user profile sidebar -->
          <div class="column2">
            <h2>About Client</h2><br>
            <h3>-</h3>
            <div class="city">
              <p>-</p>
            </div><br>
            <h3>-</h3><br>
            <h3>-</h3><br><br>
            <h3>-</h3>
          </div>
          <!-- -->
        </div>
      </div>
      <?php
    }
  }
  ?>
  <!-- Footer -->
  <?php include 'object/footer.php' ?>
  <!--  -->
  <?php include 'object/scripts.php' ?>
  <script>
    $("#apply-btn").on("click", function (e) {
      e.preventDefault();
      var check = 1;
      $.ajax({
        url: "../controllers/apply.php",
        method: "post",
        data: {
          check: check,
        },
        success: function (response) {
          if (response === "cv_missing") {
            alert("Please add your CV in My Profile first!");
            window.location.href = "../public/my_profile.php#edit";
          } else if (response === "profile_missing") {
            alert(
              "Please fill in your data in My Profile before submitting an application!"
            );
            window.location.href = "my_profile.php#edit";
          } else {
            window.location.href = "apply.php?id=<?php echo $job_id ?>&job_type=<?php echo $job_type ?>";
          }
        },
        error: function (xhr, status, error) {
          alert("Error: " + error);
        },
      });
    });
  </script>
</body>

</html>