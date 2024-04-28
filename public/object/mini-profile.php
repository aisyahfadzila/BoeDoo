<!-- mini profile modal -->
<div id="miniprofile">
    <div class="triangle" id="triangle"></div>
    <img class="pfp" src="<?php
    if ($fileName != "") {
      echo $targetDirectory . $fileName;
    } else {
      ?>
      ../views/img/user (1).png
      <?php
    }
    ?>" alt="Profile Picture" />
    <?php echo '<h2>' . $firstName . " " . $lastName . '</h2>'; ?>
    <p class="jobtitle">
      <?php
      $result_user_title = mysqli_query($conn, "SELECT profession FROM profiles WHERE user_id = '$user_id'");
      if (mysqli_num_rows($result_user_title) > 0) {
        $row = mysqli_fetch_assoc($result_user_title);
        $user_title = $row['profession'];
        echo $user_title;
      } else {
        echo "You haven't added your title yet.";
      }
      ?>
    </p>
    <span class="exit">
      <a href="../controllers/logout.php" onclick="return confirm('Are you sure you want to logout?')"><img
          src="../views/img/exit.png" />Logout</a>
    </span>
  </div>
  <!--  -->