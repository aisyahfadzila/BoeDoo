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
  <link rel="stylesheet" href="../views/css/postjob.css" />
  <link rel="icon" type="image/x-icon" href="../views/img/2.png" />
  <title>BoeDoo - Post Job</title>
</head>

<body>
  <!-- Header -->
  <?php include 'object/navbar.php'; ?>
  <?php include 'object/mini-profile.php'; ?>
  <!--  -->
  <!-- Content -->
  <?php
  ?>
  <div class="back">
  </div>
  <div class="content">
    <a href="discover.php" class="buttonBack"><img src="../views/img/arrowup.svg">Back</a><br><br>
    <h1 class="constrainttitle">Let's Define Your Constraint...</h1>
    <div class="rowform">
      <form action="../controllers/post_job.php" method="post" id="postJob">
        <div class="column">
          <label>Title</label><br />
          <input type="text" name="title" placeholder="Title.." required autocomplete="off" /><br />
          <label>Wage in Million Rupiah (e.g., 5)</label><br />
          <input type="text" name="wage" placeholder="Wage.." required autocomplete="off" /><br />
          <label>Duration In Day</label><br />
          <input type="text" name="duration" placeholder="Duration.." required autocomplete="off" /><br />
          <label>Industry or Department</label><br />
          <input type="text" name="industry" placeholder="Industry.." required autocapitalize="words"
            autocomplete="off" /><br />
          <div class="content-employeelevel">
            <select name="working_type" id="workType" required>
              <option value="" disabled selected>Working Type</option>
              <option value="Remote">Remote</option>
              <option value="Onsite">Onsite</option>
            </select>
            <br /><br />
            <select name="skill_level" id="workLevel" required>
              <option value="" disabled selected>Employee Level</option>
              <option value="Beginner">Beginner</option>
              <option value="Intermediate">Intermediate</option>
              <option value="Advanced">Advanced</option>
            </select>
            <br /><br />
            <select name="job_type" required>
              <option value="" disabled selected>Categories</option>
              <option value="jobs">Job</option>
              <option value="projects">Project</option>
              <option value="research">Research</option>
            </select>
            <br /><br />
          </div>
          <br />
        </div>
        <div class="column">
          <label for="job-description"><b>Description</b></label><br />
          <div class="jobDescBox">
            <textarea name="job_desc" id="job-description" maxlength="2048" style="width: 545px; height: 296px;"
              required autocomplete="off"></textarea>
            <input type="fake-placeholder" id="fake-placeholder" placeholder="Job Description" autocomplete="off">
          </div>
        </div>
        <div class="btnWrapper">
          <button type="submit" class="submitbtn glow-button" name="post_job"
            onclick="return confirm('Are you sure your data is correct?')">Submit</button>
        </div>
    </div>
  </div>
  <!-- Footer -->
  <?php include 'object/footer.php'; ?>
  <!-- Footer End -->
  <?php include 'object/scripts.php' ?>
</body>

</html>