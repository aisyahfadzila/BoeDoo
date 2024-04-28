<?php
require '../controllers/config.php';
require '../controllers/check-login.php';
require '../controllers/user-data.php';

$prev_page = "discover.php";
if (!isset($_GET['job_type'])) {
  $job_type = "jobs";
} else {
  $job_type = $_GET['job_type'];
}
?>
<!--  -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../views/css/discover.css" />
  <link rel="icon" type="image/x-icon" href="../views/img/2.png" />
  <title>BoeDoo - Discover</title>
</head>

<body>
  <!-- Header -->
  <?php include 'object/navbar.php' ?>
  <?php include 'object/mini-profile.php' ?>
  <!--  -->

  <!-- dropdown filter -->
  <div id="dropdownFilter">
    <ul class="fiterList">
      <?php
      if ($job_type == "jobs") {
        ?>
        <li class="tooltip">
          <a>
            Jobs</a><span class="tooltiptext">You are here.</span>
        </li>
        <li class="tooltip" onclick="window.location.href='discover.php?job_type=projects'" style="cursor: pointer;">
          <a>
            Projects</a>
        </li>
        <li class="tooltip" onclick="window.location.href='discover.php?job_type=research'" style="cursor: pointer;">
          <a>Researches</a>
        </li>
        <?php
      } else if ($job_type == "projects") {
        ?>
          <li class="tooltip" onclick="window.location.href='discover.php'" style="cursor: pointer;">
            <a>
              Jobs</a>
          </li>
          <li class="tooltip">
            <a>
              Projects</a><span class="tooltiptext">You are here.</span>
          </li>
          <li class="tooltip" onclick="window.location.href='discover.php?job_type=research'" style="cursor: pointer;">
            <a>Researches</a>
          </li>
        <?php
      } else if ($job_type == "research") {
        ?>
            <li class="tooltip" onclick="window.location.href='discover.php'" style="cursor: pointer;">
              <a>
                Jobs</a>
            </li>
            <li class="tooltip" onclick="window.location.href='discover.php?job_type=projects'" style="cursor: pointer;">
              <a>
                Projects</a>
            </li>
            <li class="tooltip">
              <a>Researches</a><span class="tooltiptext">You are here.</span>
            </li>
        <?php
      }
      ?>

    </ul>
  </div>
  <!--  -->

  <!-- Content -->
  <div class="content">
    <div class="row-content">
      <div class="column1">
        <div class="column1in">
          <form action="" method="GET">
            <div class="searchbar">
              <div class="searchbar3" id="myBtn">
                <a id="dropdownBtn" href="#" onclick="changeAttribute()"><img id="arrowImg"
                    src="../views/img/arrow.svg" /></a>
              </div>
              <div class="searchbar1">
                <input type="text" name="keyword" placeholder="Search For..." autocomplete="off" />
              </div>
              <div class="searchbar2">
                <button type="submit">
                  <img src="../views/img/search-icon.svg" />
                </button>
              </div>
            </div>
          </form>
          <br /><br />
          <div class="column1-content">
            <div class="jobheader">
              <div class="title">
                <p>
                  <?php
                  if ($job_type == "jobs") {
                    echo "Jobs";
                  } else {
                    echo ucwords($job_type);
                  }
                  ?> you might like
                </p>
              </div>
            </div>
            <div class="jobs">
              <h4>
                Best
                <?php
                if ($job_type == "jobs") {
                  echo "Jobs";
                } else if ($job_type == "research") {
                  echo ucwords($job_type) . "es";
                } else {
                  echo ucwords($job_type);
                }
                ?> that match your experience to a client's hiring
                preferences. Ordered by most relevant.
              </h4>


              <!-- Search Bar n Job List -->
              <?php
              if (isset($_GET['keyword'])) {
                $keyword = $_GET['keyword'];
                $query = "SELECT * FROM jobs WHERE title LIKE '%$keyword%' AND job_type = '$job_type' AND status = 'Approved'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $title = $row['title'];
                    $wage = $row['wage'];
                    $duration = $row['duration_in_day'];
                    $jobdesc = $row['job_desc'];
                    $worktype = $row['working_type'];
                    $employeelevel = $row['employee_level'];
                    ?>
                    <!--  -->
                    <!-- job display row-->
                    <div class="jobs-row"
                      onclick="window.location.href='job_details.php?title=<?php echo $title; ?>&job_id=<?php echo $row['id']; ?>&job_type=<?php echo $job_type; ?>&prev_page=<?php echo $prev_page; ?>'" target="_blank">
                      <a>
                        <h2 name="title">
                          <?php echo $title; ?>
                        </h2>
                      </a>
                      <div style="display: flex">
                        <h4 name="wage" style="padding-right: .5rem;">
                          <?php echo '<span>' . $wage . '</span> Million'; ?>
                        </h4>
                        <h4 style="padding-right: .5rem;">|</h4>
                        <h4 name="duration"> Duration :
                          <?php echo '<span>' . $duration . '</span> Day'; ?>
                        </h4>
                      </div>
                      <div class="limited-text" id="myText<?php echo $value['id']; ?>">
                        <p name="jobdesc" class="jobdesc">
                          <?php echo $jobdesc; ?>
                        </p>
                      </div>
                      <div class="jobs-row-wtel">
                        <p name="workingtype">
                          <?php echo $worktype; ?>
                        </p>
                        <p name="employeelevel">
                          <?php echo $employeelevel; ?>
                        </p>
                      </div>
                    </div>
                    <?php
                  }
                }
                // Mengosongkan hasil query
                mysqli_free_result($result);

              } else if (!isset($_GET['keyword']) || $_GET['keyword'] == "") {
                $query = "SELECT * FROM jobs WHERE job_type = '$job_type' AND status = 'Approved' ORDER BY id ASC";
                $hasil = mysqli_query($conn, $query);

                if (mysqli_num_rows($hasil) > 0) {
                  foreach ($hasil as $value) {
                    $title = $value['title'];
                    $wage = $value['wage'];
                    $duration = $value['duration_in_day'];
                    $jobdesc = $value['job_desc'];
                    $worktype = $value['working_type'];
                    $employeelevel = $value['employee_level'];
                    ?>
                      <!-- job display row-->
                      <div class="jobs-row"
                        onclick="window.location.href='job_details.php?title=<?php echo $title; ?>&job_id=<?php echo $value['id']; ?>&job_type=<?php echo $job_type; ?>&prev_page=<?php echo $prev_page; ?>'">
                        <a>
                          <h2 name="title">
                          <?php echo $title; ?>
                          </h2>
                        </a>
                        <div style="display: flex">
                          <h4 name="wage" style="padding-right: .5rem;">
                          <?php echo '<span>' . $wage . '</span> Million'; ?>
                          </h4>
                          <h4 style="padding-right: .5rem;">|</h4>
                          <h4 name="duration"> Duration :
                          <?php echo '<span>' . $duration . '</span> Day'; ?>
                          </h4>
                        </div>
                        <div class="limited-text" id="myText<?php echo $value['id']; ?>">
                          <p name="jobdesc" class="jobdesc">
                          <?php echo $jobdesc; ?>
                          </p>
                        </div>
                        <div class="jobs-row-wtel">
                          <p name="workingtype">
                          <?php echo $worktype; ?>
                          </p>
                          <p name="employeelevel">
                          <?php echo $employeelevel; ?>
                          </p>
                        </div>
                      </div>
                    <?php
                  }
                } else {
                  ?>
                    <br>
                    <p style="text-align: center; color: #4d4d4d; font-weight: 600">No
                      <?php
                      if ($job_type == "Jobs") {
                        echo "Jobs";
                      } else {
                        echo ucwords($job_type);
                      }
                      ?> Available Yet.
                    </p>
                  <?php
                }
              }
              ?>
              <!-- job display row end-->
            </div>
          </div>
        </div>
      </div>

      <!-- user profile sidebar -->
      <div class="column2">
        <div class="user-info">
          <a href="my_profile.php"><img class="profile-pict" src="<?php
          if ($fileName != "") {
            echo $targetDirectory . $fileName;
          } else {
            ?>
            ../views/img/user (1).png
            <?php
          }
          ?>" /></a>
          <div class="displayname">
            <h2>
              <?php
              echo '<h2>' . $firstName . " " . $lastName . '</h2>';
              ?>
            </h2><a href="my_profile.php#edit"><img src="../views/img/edit (1).png" /></a>
          </div>
          <p>
            <?php
            if ($profiles_title != "") {
              echo $profiles_title;
            } else {
              echo "You haven't added your title yet.";
            }
            ?>
          </p>
        </div>
        <div class="topskills">
          <h3>Top Skills</h3>
          <br />
          <?php
          $result_skills = mysqli_query($conn, "SELECT title FROM skills WHERE profiles_id = '$profiles_id'");
          if (mysqli_num_rows($result_skills) > 0) {
            $row = mysqli_fetch_assoc($result_skills);
            ?>
            <a href="my_profile.php#edit"><img src="../views/img/edit (1).png" />
              <?php echo $row['title'] ?>
            </a>
            <?php
          } else {
            ?>
            <a href="my_profile.php#edit"><img src="../views/img/edit (1).png" />Add new skill</a>
            <?php
          }
          ?>
          <br /><br />
        </div>
        <div class="work-ex">
          <div class="titleEx">
            <h3>Work Experience</h3>
            <a href="my_profile.php#edit"><img src="../views/img/edit (1).png" /></a>
          </div>
          <br />
          <?php
          $result_work = mysqli_query($conn, "SELECT * FROM employment_history WHERE profiles_id = '$profiles_id'");
          if (mysqli_num_rows($result_work) > 0) {
            $row_work = mysqli_fetch_assoc($result_work);
            ?>
            <div class="item-job-position">
              <img src="../views/img/briefcase.png" />
              <div class="job-position">
                <h4>
                  <?php echo $row_work['work_position'] ?>
                </h4>
                <div>
                  <?php echo $row_work['company_name'] ?>
                </div>
              </div>
              <p>
                <?php echo $row_work['work_start_date'] ?> -
                <?php echo $row_work['work_end_date'] ?>
              </p>
              <br />
            </div>
            <?php
          } else {
            ?>
            <div class="item-job-position">
              <img src="../views/img/briefcase.png" />
              <div class="job-position">
                <h4>Your Job Position</h4>
                <div>Your Company Name</div>
              </div>
              <p>Date</p>
              <br />
            </div>
            <?php
          }
          ?>
        </div>
      </div>
      <!--  -->
    </div>
  </div>

  <!-- Popup After Login -->
  <div class="afterlogin" id="afterlogin">
    <div class="afterlogin-content">
      <span class="close" title="Close">&times;</span>
      <h2>Reminder</h2>
      <p>You must add your CV and fill in your personal information<br>in <u><a href="my_profile.php" target="_blank">My
            Profile</a></u> before applying for a job.</p>
    </div>
  </div>
  <!-- After Login Popup END  -->
  <!-- Footer -->
  <?php include 'object/footer.php' ?>
  <!--  -->
  <?php include 'object/scripts.php' ?>
  <script>
    if (!localStorage.getItem('popupShown')) {
      $(".afterlogin").slideDown(500);

      $(".close").click(function () {
        $(".afterlogin").slideUp();
      });
      localStorage.setItem('popupShown', true);
    }
  </script>
</body>

</html>