<?php
require '../controllers/config.php';
require '../controllers/check-login.php';
require '../controllers/user-data.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../views/css/myjobs.css" />
  <link rel="icon" type="image/x-icon" href="../views/img/2.png" />
  <?php include 'object/scripts.php' ?>
  <title>BoeDoo - My Jobs</title>
</head>

<body>
  <!-- Header -->
  <?php include 'object/navbar.php' ?>
  <?php include 'object/mini-profile.php' ?>
  <!--  -->

  <!-- Content -->
  <!-- My Posted Job -->
  <div class="content">
    <div class="colomn">
      <h3>My Posted Jobs</h3>
      <div class="column-in">
        <?php
        $job_id = "";
        $jobs_list = mysqli_query(
          $conn,
          "SELECT id, title, status, job_type FROM jobs WHERE job_type = 'jobs' AND employer_id = '$user_id'"
        );
        if ($jobs_list->num_rows > 0) {
          ?>
          <form method="post">
            <?php
            $i = 1;
            ?>
            <table id="submitted-table">
              <tr>
                <td>No</td>
                <td>Job Title</td>
                <td>Status</td>
                <td>Detail</td>
              </tr>
              <?php
              foreach ($jobs_list as $row_list) {
                $job_title = $row_list['title'];
                $job_id = $row_list['id'];
                $status = $row_list['status'];
                $job_type = $row_list['job_type'];
                ?>
                <input type="hidden" id="job_id" value="<?php echo $job_id ?>">
                <tr>
                  <td>
                    <?php echo "$i"; ?>
                  </td>
                  <td>
                    <?php echo "$job_title"; ?>
                  </td>
                  <td>
                    <?php echo "$status"; ?>
                  </td>
                  <td>
                    <?php
                    if ($row_list['status'] === "Approved") {
                      ?>
                      <button id="show_details">Show Detail</button>
                      <script>
                        $(document).ready(function () {
                          $('#show_details').on('click', function (e) {
                            e.preventDefault();
                            var job_id = $('#job_id').val();

                            $.ajax({
                              url: '../controllers/get_applicants.php',
                              method: 'POST',
                              data: {
                                job_id: job_id
                              },
                              success: function (response) {
                                // Menampilkan daftar pelamar di dalam elemen dengan id "showAppli"
                                $('#showAppli').html(response);
                              },
                              error: function (xhr, status, error) {
                                console.log(xhr.responseText);
                              }
                            });
                          });

                          $("#show_details").click(function () {
                            // Show or hide the mini profile depending on its current visibility
                            if ($("#showAppli").is(":visible")) {
                              $("#showAppli").hide(200);
                            } else {
                              $("#showAppli").show(200);
                            }
                          });
                        });
                      </script>
                      <div id="showAppli"></div>
                      <button id="hapus" type="submit" name="delete_jobs"
                        onclick='return confirm("Are you sure you want to delete your job?");'>Delete</button>
                      <?php
                    } else {
                      ?>
                      <button id="hapus" type="submit" name="delete_jobs"
                        onclick='return confirm("Are you sure you want to delete your job?");'>Delete</button>
                      <?php
                    }
                    ?>
                  </td>
                </tr>
                <?php
                $i++;
              }
              ?>
            </table>
          </form>
          <?php
        } else if ($jobs_list->num_rows <= 0) {
          echo "<p>You haven't posted any jobs yet!</p>";
        }

        if (isset($_POST['delete_jobs'])) {
          $job_delete_query = mysqli_query($conn, "DELETE FROM jobs WHERE id = '$job_id'");
          if ($job_delete_query == true) {
            ?>
            <script
              type="text/javascript">alert('Your job has successfully deleted!'); window.location.href = "my_jobs.php"</script>
            <?php
          } else {
            ?>
            <script type="text/javascript">alert('Failed!');</script>
            <?php
          }
        }
        ?>
      </div>
    </div>
    <!-- My Posted Job End -->

    <!-- My Posted Projects -->
    <div class="colomn">
      <h3>My Posted Projects</h3>
      <div class="column-in">
        <?php
        $job_id = "";
        $jobs_list = mysqli_query(
          $conn,
          "SELECT id, title, status, job_type FROM jobs WHERE job_type = 'projects' AND employer_id = '$user_id'"
        );
        if ($jobs_list->num_rows > 0) {
          ?>
          <form method="post">
            <?php
            $i = 1;
            ?>
            <table id="submitted-table">
              <tr>
                <td>No</td>
                <td>Job Title</td>
                <td>Status</td>
                <td>Detail</td>
              </tr>
              <?php
              foreach ($jobs_list as $row_list) {
                $job_title = $row_list['title'];
                $job_id = $row_list['id'];
                $status = $row_list['status'];
                $job_type = $row_list['job_type'];
                ?>
                <input type="hidden" id="job_id2" value="<?php echo $job_id ?>">
                <tr>
                  <td>
                    <?php echo "$i"; ?>
                  </td>
                  <td>
                    <?php echo "$job_title"; ?>
                  </td>
                  <td>
                    <?php echo "$status"; ?>
                  </td>
                  <td>
                    <?php
                    if ($row_list['status'] === "Approved") {
                      ?>
                      <button id="show_details2">Show Detail</button>
                      <script>
                        $(document).ready(function () {
                          $('#show_details2').on('click', function (e) {
                            e.preventDefault();

                            var job_id = $('#job_id2').val();

                            $.ajax({
                              url: '../controllers/get_applicants.php',
                              method: 'POST',
                              data: {
                                job_id: job_id
                              },
                              success: function (response) {
                                $('#showAppli2').html(response);
                              },
                              error: function (xhr, status, error) {
                                console.log(xhr.responseText);
                              }
                            });
                          });

                          $("#show_details2").click(function () {
                            // Show or hide the mini profile depending on its current visibility
                            if ($("#showAppli2").is(":visible")) {
                              $("#showAppli2").hide(200);
                            } else {
                              $("#showAppli2").show(200);
                            }
                          });
                        });
                      </script>
                      <div id="showAppli2"></div>
                      <?php
                    }
                    ?>
                    <button id="hapus" type="submit" name="delete_projects"
                      onclick='return confirm("Are you sure you want to delete your job?");'>Delete</button>
                  </td>
                </tr>
                <?php
                $i++;
              }
              ?>
            </table>
          </form>
          <?php
        } else if ($jobs_list->num_rows <= 0) {
          echo "<p>You haven't posted any projects yet!</p>";
        }

        if (isset($_POST['delete_projects'])) {
          $projects_delete_query = mysqli_query($conn, "DELETE FROM jobs WHERE id = '$job_id'");
          if ($projects_delete_query == true) {
            ?>
            <script
              type="text/javascript">alert('Your job has successfully deleted!'); window.location.href = "my_jobs.php"</script>
            <?php
          } else {
            ?>
            <script type="text/javascript">alert('Failed!');</script>
            <?php
          }
        }
        ?>
      </div>
    </div>
    <!-- My Posted Projects END -->

    <!-- My Posted Researches -->
    <div class="colomn">
      <h3>My Posted Researches</h3>
      <div class="column-in">
        <?php
        $job_id = "";
        $jobs_list = mysqli_query(
          $conn,
          "SELECT id, title, status, job_type FROM jobs WHERE job_type = 'research' AND employer_id = '$user_id'"
        );
        if ($jobs_list->num_rows > 0) {
          ?>
          <form method="post">
            <?php
            $i = 1;
            ?>
            <table id="submitted-table">
              <tr>
                <td>No</td>
                <td>Job Title</td>
                <td>Status</td>
                <td>Detail</td>
              </tr>
              <?php
              foreach ($jobs_list as $row_list) {
                $job_title = $row_list['title'];
                $job_id = $row_list['id'];
                $status = $row_list['status'];
                $job_type = $row_list['job_type'];
                ?>
                <input type="hidden" id="job_id3" value="<?php echo $job_id ?>">
                <tr>
                  <td>
                    <?php echo "$i"; ?>
                  </td>
                  <td>
                    <?php echo "$job_title"; ?>
                  </td>
                  <td>
                    <?php echo "$status"; ?>
                  </td>
                  <td>
                    <?php
                    if ($row_list['status'] === "Approved") {
                      ?>
                      <button id="show_details3">Show Detail</button>
                      <script>
                        $(document).ready(function () {
                          $('#show_details3').on('click', function (e) {
                            e.preventDefault();

                            // Mendapatkan nilai job_id dari row yang sedang diproses
                            var job_id = $('#job_id3').val();

                            // Ajax request untuk mendapatkan daftar pelamar berdasarkan job_id
                            $.ajax({
                              url: '../controllers/get_applicants.php',
                              method: 'POST',
                              data: {
                                job_id: job_id
                              },
                              success: function (response) {
                                // Menampilkan daftar pelamar di dalam elemen dengan id "showAppli"
                                $('#showAppli3').html(response);
                              },
                              error: function (xhr, status, error) {
                                console.log(xhr.responseText);
                              }
                            });
                          });
                        });
                      </script>
                      <div id="showAppli3"></div>
                      </div>
                      <?php
                    }
                    ?>
                    <button id="hapus" type="submit" name="delete_research"
                      onclick='return confirm("Are you sure you want to delete your job?");'>Delete</button>
                  </td>
                </tr>
                <?php
                $i++;
              }
              ?>
            </table>
          </form>
          <?php
        } else if ($jobs_list->num_rows <= 0) {
          echo "<p>You haven't posted any researches yet!</p>";
        }

        if (isset($_POST['delete_research'])) {
          $research_delete_query = mysqli_query($conn, "DELETE FROM jobs WHERE id = '$job_id'");
          if ($research_delete_query == true) {
            ?>
            <script
              type="text/javascript">alert('Your job has successfully deleted!'); window.location.href = "my_jobs.php"</script>
            <?php
          } else {
            ?>
            <script type="text/javascript">alert('Failed!');</script>
            <?php
          }
        }
        ?>
      </div>
    </div>
    <!-- My Posted Researches END -->

    <!-- Check Submissions -->
    <div class="colomn">
      <h3 id="applications-row">My Submit Applications</h3>
      <div class="column-in">
        <?php
        $subjobs_id = "";
        $jobs_list = mysqli_query(
          $conn,
          "SELECT j.id, j.title, j.job_type 
        FROM apply a 
        JOIN jobs j ON a.job_id = j.id
        JOIN users u ON j.employer_id = u.id
        WHERE employees_id = '$user_id'"
        );
        if ($jobs_list->num_rows > 0) {
          ?>
          <form method="post">
            <?php
            $i = 1;
            ?>
            <table id="submitted-table">
              <tr>
                <td>No</td>
                <td>Job Title</td>
                <td>Job Type</td>
                <td></td>
              </tr>
              <?php
              foreach ($jobs_list as $row_list) {
                $job_type = $row_list['job_type'];
                $job_title = $row_list['title'];
                $subjobs_id = $row_list['id'];
                ?>
                <tr>
                  <td>
                    <?php echo $i; ?>
                  </td>
                  <td>
                    <?php echo $job_title; ?>
                  </td>
                  <td>
                    <?php echo ucwords($job_type); ?>
                  </td>
                  <td>
                    <button id="hapus" type="submit" name="delete_submissions"
                      onclick='return confirm("Are you sure you want to delete your submissions?");'>Delete</button>
                  </td>
                </tr>
                <?php
                $i++;
              } ?>
            </table>
          </form>
          <?php
        } else if ($jobs_list->num_rows <= 0) {
          echo "<p>You haven't submitted any applications yet!</p>";
        }

        if (isset($_POST['delete_submissions'])) {
          $submissions_delete_query = mysqli_query($conn, "DELETE FROM apply WHERE job_id = '$subjobs_id'");
          if ($submissions_delete_query == true) {
            ?>
            <script
              type="text/javascript">alert('Your submissions has successfully deleted!'); window.location.href = "my_jobs.php"</script>
            <?php
          } else {
            ?>
            <script type="text/javascript">alert('Failed!');</script>
            <?php
          }
        }
        ?>
      </div>
    </div>
  </div>

  <!--  -->

  <!-- Footer -->
  <?php include 'object/footer.php' ?>
  <!--  -->
</body>

</html>