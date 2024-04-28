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
  <link rel="stylesheet" href="../views/css/myprofile.css" />
  <link rel="icon" type="image/x-icon" href="../views/img/2.png" />
  <title>BoeDoo - My Profile</title>
</head>

<body>
  <!-- Header -->
  <?php include 'object/navbar.php'; ?>
  <?php include 'object/mini-profile.php'; ?>
  <!--  -->

  <!-- Content -->
  <?php
  if (!isset($_POST['edit'])) {
    ?>
    <form action="" method="POST">
      <div class="content">
        <div class="column-out">
          <div class="profile-picture">
            <label for="pfpInput" style="visibility:hidden" class="editbtn">
              <img class="edit" id="editIcon" src="../views/img/edit-shadow.png" disabled>
            </label>
            <div class="profile-image">
              <img class="pfp" id="pfp" src="<?php
              if ($fileName != "") {
                echo $targetDirectory . $fileName;
              } else {
                ?>
      ../views/img/user (1).png
      <?php
              }
              ?>">
            </div>
          </div>
          <?php
          echo '<h2>' . $firstName . " " . $lastName . '</h2>';
          ?>
          <p><img src="../views/img/location.svg">
            <?php if ($profiles_address == null) {
              echo "You haven't added your address yet.";
            } else {
              echo $profiles_address;
            } ?>
          </p><br>
        </div>
        <br>
        <div class="column-in">
          <div class="column1in">
            <h2>Your Data</h2>
            <div class="column1-n">
              <p>First name</p>
              <h3>
                <?php echo $firstName ?>
              </h3>
            </div>

            <div class="column1-n">
              <p>Last name</p>
              <h3>
                <?php echo $lastName ?>
              </h3>
            </div>

            <div class="column1-n">
              <p>Email</p>
              <h3>
                <?php echo $user_email ?>
              </h3>
            </div>

            <div class="column1-n">
              <p>LinkedIin</p>
              <h3>
                <?php if ($profiles_linkedin == null) {
                  echo "You haven't added your LinkedIn yet.";
                } else {
                  echo $profiles_linkedin;
                } ?>
              </h3>
            </div>
          </div>

          <div class="column2in">
            <div class="column2-1">
              <div class="column2-1-n">
                <h2>
                  <?php if ($profiles_title == null) {
                    echo "You haven't added your title yet.";
                  } else {
                    echo $profiles_title;
                  } ?>
                </h2>
              </div>
              <p class="profes-desc">
                <?php if ($profiles_desc == null) {
                  echo "You haven't added your description yet.";
                } else {
                  echo $profiles_desc;
                } ?>
              </p>
            </div>

            <div class="column2-n">
              <div class="column2-2-n">
                <h2>Portfolio</h2>
              </div>
              <div class="column2-n-in-saved">
                <?php if ($porto_title == null) { ?>
                  <div class="col-center">
                    <img src="../views/img/layers 1.svg">
                    <p>
                      <?php echo "You haven't added any portfolio(s) yet."; ?>
                    </p>
                  </div>
                  <?php
                } else { ?>
                  <h3>
                    <?php echo $porto_title; ?>
                  </h3>
                  <p>
                    <?php echo $porto_desc; ?>
                  </p>
                  <a href="www.<?php echo $porto_link; ?>" target="_blank" rel="noreferrer noopener" class="download"><?php echo $porto_link; ?></a>
                  <?php
                } ?>
              </div>
            </div>

            <div class="column2-n">
              <div class="column2-2-n">
                <h2>CV</h2>
              </div>
              <div class="column2-n-in-saved">
                <?php if ($cvFileName == null) { ?>
                  <div class="col-center">
                    <img src="../views/img/layers 1.svg">
                    <p>
                      <?php echo "You haven't added your CV yet."; ?>
                    </p>
                  </div>
                  <?php
                } else {
                  ?>
                  <div class="saved-cv">
                    <input name="cvName" value="<?php echo $firstName . $lastName . "'s_CV.pdf"; ?>" readonly
                      style="cursor: default;">
                    <br>
                    <a href="<?php echo $cvDirectory . $cvFileName; ?>"
                      download="<?php echo $firstName . $lastName . "'s_CV.pdf"; ?>" class="download">Download</a>
                  </div>
                  <?php
                } ?>
              </div>
            </div>

            <div class="column2-n">
              <div class="column2-2-n">
                <h2 id="skills">Skills</h2>
              </div>
              <?php if ($skills_title == null) {
                ?>
                <div class="column2-n-in-saved">
                  <div class="col-center">
                    <img src="../views/img/skills 1.svg">
                    <p>
                      <?php echo "You haven't added any skill(s) yet."; ?>
                    </p>
                  </div>
                </div>
                <?php
              } else {
                foreach ($result_skills as $value) {
                  ?>
                  <div class="saved-skills">
                    <input type="skills" value="<?php echo $value['title'] ?>" placeholder="Title" name="skills_title"
                      readonly style="cursor: default;">
                    <p>
                      <input type="skills" value="<?php echo $value['description'] ?>" placeholder="Description in brief"
                        readonly name="skills_desc" style="cursor: default;">
                    </p>
                  </div>
                  <?php
                }
              }
              ?>
            </div>

            <div class="column2-n">
              <div class="column2-2-n">
                <h2>Certification</h2>
              </div>
              <div class="column2-n-in-saved">
                <?php if ($certif_title == null) {
                  ?>
                  <div class="col-center">
                    <img src="../views/img/layers 1.svg">
                    <p>
                      <?php echo "You haven't added any certification(s) yet."; ?>
                    </p>
                  </div>
                  <?php
                } else {
                  ?>
                  <div class="saved-certif">
                    <input name="certif_input" value="<?php echo $firstName . $lastName . "'s_Certification.pdf"; ?>"
                      readonly style="cursor: default;">
                    <p>
                      <a href="<?php echo $certifDirectory . $certif_file; ?>"
                        download="<?php echo $firstName . $lastName . "'s_Certification.pdf"; ?>"
                        class="download">Download</a>
                    </p>
                  </div>
                  <?php
                }
                ?>
              </div>
            </div>

            <div class="column2-n">
              <div class="column2-2-n">
                <h2 id="employhistory">Employment History</h2>
              </div>
              <div class="column2-n-in-saved">
                <?php if ($work_position == null) {
                  ?>
                  <div class="col-center">
                    <img src="../views/img/employment 1.svg">
                    <p>
                      <?php echo "You haven't added your Work Experience(s) yet."; ?>
                    </p>
                  </div>
                  <?php
                } else {
                  ?>
                  <p>
                  <h3>
                    Job Position :</h3>
                  <?php echo $work_position; ?>
                  </p>
                  <p>
                  <h3>Company Name :</h3>
                  <?php echo $company_name; ?>
                  </p>
                  <p>
                  <h3>Start :</h3>
                  <?php echo $work_start_date; ?><br>
                  <h3>End :</h3>
                  <?php echo $work_end_date; ?>
                  </p>
                  <?php
                } ?>
              </div>
            </div>
          </div>
        </div>
        <div class="columnin2">
          <div class="button-edit">
            <button type="submit" name="edit" class="btn-edit glow-button" id="edit">Edit</button>
          </div>
        </div>
      </div>
    </form>
    <?php
  } else {
    ?>
    <form action="../controllers/my_profile.php" method="POST" enctype="multipart/form-data">
      <div class="content">
        <div class="column-out">
          <div class="profile-picture">
            <label for="pfpInput" class="editbtn">
              <img class="edit" id="editIcon" src="../views/img/edit-shadow.png">
            </label>
            <input type="file" accept="image/*" id="pfpInput" onchange="changeProfilePicture(event)" name="icon_profile">
            <div class="profile-image">
              <img class="pfp" id="pfp" src="<?php
              if ($fileName != "") {
                echo $targetDirectory . $fileName;
              } else {
                ?>
      ../views/img/user (1).png
      <?php
              }
              ?>">
            </div>
          </div>
          <label for="delete_icon" style="cursor: pointer;" onclick="changeDefaultImage();" class="deleteLabel">
            <p class="deleteBtn1">Remove Image</p>
          </label>
          <input type="hidden" name="delete_icon" style="cursor: pointer;" value="exist" id="delete_icon">
          <?php
          echo '<h2>' . $firstName . " " . $lastName . '</h2>';
          ?>
          <p class="addressClass"><img src="../views/img/location.svg">
            <?php if ($profiles_address == null) {
              echo "You haven't added your address yet.";
            } else {
              echo $profiles_address;
            } ?>
          </p><br>
        </div>
        <br>
        <div class="column-in">
          <div class="column1in">
            <h2>Your Data</h2>
            <div class="column1-n">
              <p>First name</p>
              <h3>
                <input type="text" value="<?php echo $firstName ?>" placeholder="Your First Name" name="first_name"
                  required>
              </h3>
            </div>

            <div class="column1-n">
              <p>Last name</p>
              <h3>
                <input type="text" value="<?php echo $lastName ?>" placeholder="Your First Name" name="last_name"
                  required>
              </h3>
            </div>

            <div class="column1-n">
              <p>Email</p>
              <h3>
                <input type="email" value="<?php echo $user_email ?>" placeholder="Your Email" name="user_email"
                  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Email format is not valid" required>
              </h3>
            </div>

            <div class="column1-n">
              <p>Address</p>
              <h3><input type="text" value="<?php echo $profiles_address ?>" placeholder="Your Address"
                  name="user_address">
              </h3>
            </div>

            <div class="column1-n">
              <p>LinkedIin</p>
              <h3>
                <input type="text" value="<?php echo $profiles_linkedin ?>" placeholder="Your LinkedIn"
                  name="linkedin_link" autocomplete="off">
              </h3>
            </div>
          </div>

          <div class="column2in">
            <div class="column2-1">
              <div class="column2-1-n">
                <h2>
                  <input type="text" value="<?php echo $profiles_title ?>" placeholder="Your Title" name="user_title"
                    autocomplete="off">
                </h2>
              </div>
              <textarea type="text" placeholder="Your Description" name="user_desc" autocomplete="off"
                style="width: 805px; height: 205px;"><?php echo $profiles_desc; ?></textarea>
            </div>

            <div class="column2-n">
              <div class="column2-2-n">
                <h2>Portfolio</h2>
              </div>
              <div class="column2-n-in">
                <input type="text" placeholder="Title" name="porto_title" value="<?php echo $porto_title; ?>">
                <p><textarea type="text" placeholder="Description" name="porto_desc"><?php echo $porto_desc ?></textarea>
                </p>
                <p><input type="text" placeholder="Link" name="porto_link" value="<?php echo $porto_link; ?>">
                </p>
              </div>
            </div>

            <div class="column2-n">
              <div class="column2-2-n">
                <h2>CV</h2>
              </div>
              <div class="column2-n-incv">
                <input id="cvName" <?php
                if ($cvFileName != null) {
                  ?>
                    value="<?php echo $firstName . $lastName . "'s_CV.pdf"; ?>" <?php
                }
                ?> placeholder="You haven't added your CV" style="cursor: default;" readonly>
                <label for="delete_icon" style="cursor: pointer;" onclick="removeCV();" class="deleteLabel">
                  <p class="deleteBtn">Remove</p>
                </label>
                <input type="hidden" name="delete_cv" style="cursor: pointer;" value="exist" id="delete_cv">
                <input type="file" placeholder="Description" name="cv" id="cv" style="cursor: pointer">
              </div>
            </div>

            <div class="column2-n">
              <div class="column2-2-n">
                <h2 id="skills">Skills</h2>
              </div>
              <div class="column2-n-in">
                <div>
                  <div class="column2-n-in" style="display: flex;">
                    <?php
                    if (mysqli_num_rows($result_skills) > 0) {
                      foreach ($result_skills as $value) {
                        ?>
                        <div>
                          <input type="skills" value="<?php echo $value['title'] ?>" placeholder="Title" name="skills_title"
                            autocomplete="off">
                          <p>
                            <input type="skills" value="<?php echo $value['description'] ?>"
                              placeholder="Description in brief" name="skills_desc" autocomplete="off">
                          </p>
                        </div>
                        <?php
                      }
                    } else {
                      ?>
                      <div>
                        <input type="skills" value="<?php echo $skills_title ?>" placeholder="Title" name="skills_title"
                          autocomplete="off">
                        <p>
                          <input type="skills" value="<?php echo $skills_desc ?>" placeholder="Description in brief"
                            name="skills_desc" autocomplete="off">
                        </p>
                      </div>
                      <?php
                    }
                    ?>
                  </div>
                  <!-- <div>
                    <input type="text" id="skillInputT" value="" placeholder="Title" name="skills_title2">
                    <input type="text" id="skillInputD" value="" placeholder="Description in brief" name="skills_desc2">
                  </div> -->
                </div>
                <!-- <button type="button" onclick="addSkill();" style="cursor:pointer">Add a Skill</button> -->
              </div>
            </div>
            <!-- <script>
              var skillInputT = document.getElementById('skillInputT');
              var skillInputD = document.getElementById('skillInputD');
              // var addSkills = document.getElementById('addSkill');
              function addSkill() {
                skillInputT.style.display = "block";
                skillInputD.style.display = "block";
              }
            </script> -->
            <div class="column2-n">
              <h2>Certification</h2>
              <div class="column2-n-in">
                <input type="text" value="<?php echo $certif_title ?>" placeholder="Title" name="certif_title">
                <input type="text" value="<?php echo $certif_desc ?>" placeholder="Description in brief"
                  name="certif_desc">
                <input type="file" accept="image/*, .pdf" value="<?php echo $certif_file ?>" placeholder=""
                  name="certif_file" id="certif">
              </div>
            </div>

            <div class="column2-n">
              <div class="column2-2-n">
                <h2 id="employhistory">Employment History</h2>
              </div>
              <br>
              <div class="column2-n-in">
                <p>
                  <label for="work_position">Job Position :</label>
                  <input id="work_position" type="text" value="<?php echo $work_position ?>" placeholder="Job Position"
                    name="work_position" autocomplete="off">
                </p>
                <p>
                  <label for="company_name">Company Name :</label>
                  <input id="company_name" type="text" value="<?php echo $company_name ?>" placeholder="Company Name"
                    name="company_name">
                  <label for="start_date">Start Date :</label>
                  <input value="<?php echo $work_start_date ?>" type="date" id="start_date" name="work_start_date">
                  <label for="end_date">End Date :</label>
                  <input value="<?php echo $work_end_date ?>" type="date" id="end_date" name="work_end_date">
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="columnin2">
          <div class="button-edit">
            <button type="submit" name="save" class="btn-edit glow-button">Save</button>
          </div>
        </div>
      </div>
    </form>
    <?php
  }
  ?>
  <!--  -->

  <!-- Footer -->
  <?php include 'object/footer.php'; ?>
  <!--  -->
  <?php include 'object/scripts.php' ?>
</body>

</html>