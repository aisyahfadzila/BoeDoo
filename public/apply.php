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
  <link rel="stylesheet" href="../views/css/apply.css" />
  <link rel="icon" type="image/x-icon" href="../views/img/2.png" />
  <title>BoeDoo - Submit Application</title>
</head>

<body>
  <!-- Header -->
  <?php include 'object/navbar.php' ?>
  <?php include 'object/mini-profile.php' ?>
  <!--  -->

  <!-- Content -->
  <div class="content">
    <h1 class="contentTitle">Application Submission</h1>
    <div class="row-content">

      <!-- CV, Project/Proposals, and KTM -->
      <div class="column1">
        <?php
        if (isset($_GET['job_type'])) {
          $id = $_GET['id'];
          $job_type = $_GET['job_type'];
        }
        ?>
        <form action="../controllers/apply.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="hidden" name="job_type" value="<?php echo $job_type; ?>">

          <div class="column1-content">
            <div class="jobheader">
              <div class="title">
                <p>
                  Add Proposals<span style="color: rgba(253, 2, 2, 0.632)">*</span>
                </p>
              </div>
            </div>
            <textarea name="proposal" id="proposal" class="proposal" placeholder="500 words minimum"
              required></textarea>
            <br />
            <br />
            <div class="jobheader">
              <div class="title">
                <p>
                  Kartu Tanda Mahasiswa (KTM)<span style="color: rgba(253, 2, 2, 0.632)">*</span>
                </p>
              </div>
            </div>
            <div class="ktminput">
              <input type="file" name="ktm" id="ktm" required />

            </div>
            <div class="ktm">
            </div>
            <div class="maxSizeKTM">
              <span>
                <p>Maximum size 40 MB</p>
              </span>
            </div>
          </div>

          <div class="column1-content">
            <div class="jobheader">
              <div class="title">
                <p>
                  Your Data</span>
                </p>
              </div>
            </div>
            <?php
            $query_name = "SELECT * FROM profiles WHERE user_id = '$user_id'";
            $address = "";
            $linkedin = "";
            if ($result = mysqli_query($conn, $query_name)) {
              $row = mysqli_fetch_assoc($result);
              if ($row != null) {
                $address = $row['address'];
                $linkedin = $row['linkedin'];
              }

              ?>
              <div class="dataForm">
                <div class="formLeft">
                  <div class="formTitle">
                    <p>First Name</p>
                    <h3>
                      <?php echo $firstName; ?>
                    </h3>
                  </div>
                  <div class="formTitle">
                    <p>Last Name</p>
                    <h3>
                      <?php echo $lastName; ?>
                    </h3>
                  </div>
                  <div class="formTitle">
                    <p>Address</p>
                    <h3>
                      <?php if ($address == null) {
                        echo "You haven't added your address yet.";
                      } else {
                        echo $address;
                      } ?>
                    </h3>
                  </div>
                </div>
                <div class="formRight">
                  <div class="formTitle">
                    <p>E-Mail</p>
                    <h3>
                      <?php echo $user_email; ?>
                    </h3>
                  </div>
                  <div class="formTitle">
                    <p>LinkedIn</p>
                    <h3>
                      <?php if ($linkedin == null) {
                        echo "You haven't added your LinkedIn yet.";
                      } else {
                        echo $linkedin;
                      } ?>
                    </h3>
                  </div>
                </div>
              </div>
              <?php
            }
            ?>
          </div>

          <!-- T & C -->
          <div class="column1-content">
            <div class="jobheader">
              <div class="title">
                <p>Terms</p>
              </div>
            </div>
            <div class="jobs" style="background-color: white; border: 1px solid #c8c8c8">
              <div class="terms">
                <div class="termsLeft">
                  <p>Client's Budget for Applicant</p>
                  <p>2% BoeDoo Service Fee</p>
                  <p>You'll Receive</p>
                </div>
                <div class="termsRight">
                  <?php
                  $job_id = $_GET['id'];
                  $query_name = "SELECT * FROM jobs WHERE id = '$job_id'";
                  if ($result = mysqli_query($conn, $query_name)) {
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <p>
                      <?php echo $row["wage"]; ?> Million Rupiah
                    </p>
                    <p>
                      <?php $wage = $row["wage"];
                      echo $wage * 2 / 100 * 1000000;
                      ?> Thousand Rupiah
                    </p>
                    <p style="font-weight:700">
                      <?php $wage = $row["wage"];
                      $service_fee = $wage * 2 / 100;
                      echo $wage - $service_fee;
                      ?> Million Rupiah
                    </p>
                    <?php
                  }
                  ?>

                </div>
              </div>
            </div>
          </div>
          <!--  -->

          <div class="submitWrapper">
            <button type="submit" class="submitbtn" name="apply">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include 'object/footer.php' ?>
  <!--  -->
  <?php include 'object/scripts.php' ?>
</body>

</html>