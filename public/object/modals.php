<!-- Modals -->
  <!-- Sign In -->
  <div id="id01">
    <form id="forms" class="modal animate" action="../controllers/login.php" method="POST">
      <div class="imgcontainer">
        <span class="close" title="Close">&times;</span>
        <img src="../views/img/welcome.png" alt="Welcome" class="avatar" />
      </div>

      <div class="modalContent">
        <div class="wrapper">
          <input type="text" placeholder="Username or Email" name="uname" required autocomplete="off" />
          <input type="password" placeholder="Password" name="psw" required />
        </div>
        <div class="redirLink">
          <a href="#id01" class="forgotpw">Forgot password?</a>
          <br />
          <p>
            Don't have an account?
            <a href="#" class="create">Sign Up</a>
          </p>
        </div>
        <div class="btnWrap">
          <button class="signin" type="submit">SIGN IN</button>
        </div>
      </div>
    </form>
  </div>
  <!-- Sign Up -->
  <div id="id02">
    <form id="forms" class="modal animate" action="../controllers/register.php" method="post"
      enctype="multipart/form-data">
      <div class="imgcontainer">
        <span href="#id02" class="close" title="Close">&times;</span>
        <h2>Create Account</h2>
      </div>
      <div class="modalContent">
        <div class="wrapper">
          <div class="form-group">
            <input for="first-name" type="text" placeholder="First Name" name="fname" required autocomplete="off" />
            <input for="last-name" type="text" placeholder="Last Name" name="lname" required autocomplete="off" />
          </div>
          <input for="username" type="text" placeholder="Username" name="uname" required autocomplete="off" />
          <input for="email" type="email" placeholder="Email" name="email" required autocomplete="off" />
          <input for="password" type="password" placeholder="Password" name="psw" required />
          <div class="sec-Question">
            <select name="sec_question" id="sec_question" required>
              <option value="" disabled selected>Security Question</option>
              <?php
              $query = "SELECT * FROM questions";
              $result = mysqli_query($conn, $query);

              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <option value="<?php echo $row["id"] ?>"><?php echo $row["question"] ?></option>'
                  <?php
                }
              }
              ?>
            </select>
            <div style="font-size:12px; opacity: .8;"><span style="color: rgba(253, 2, 2, 0.632)">*</span>Required for
              recovery account</div>
            <input for="answer" type="text" placeholder="Your Answer" name="answer" required autocomplete="off" />
          </div>
        </div>
        <p class="redirLink">
          Already have an account?
          <a href="#" class="login">Sign In</a>
        </p>
        <span class="btnWrap">
          <button class="signup" type="submit" name="sign_up">SIGN UP</button>
        </span>
      </div>
    </form>
  </div>
  <!-- Recovery Account -->
  <div id="id03">
    <form id="forms" class="modal animate" action="../controllers/recovery.php" method="post">
      <div class="imgcontainer">
        <span href="#id03" class="close" title="Close">&times;</span>
        <h2>Recovery Account</h2>
      </div>
      <div class="modalContent">
        <div class="wrapper">
          <input type="email" placeholder="Email" name="email" required autocomplete="off" />
          <select name="sec_question" id="sec_question" required>
            <option value="" disabled selected>Security Question</option>
            <?php
            $query = "SELECT * FROM questions";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <option value="<?php echo $row["id"] ?>"><?php echo $row["question"] ?></option>'
                <?php
              }
            }
            ?>
            <input type="text" placeholder="Answer" name="answer" required autocomplete="off" />
            <input type="password" placeholder="New Password" name="pass" required />
          </select>
        </div>
        <p class="redirLink">
          <a href="#" class="back">Back</a>
        </p>
        <span class="btnWrap">
          <button class="recover" type="submit" name="request_recover">Send</button>
        </span>
      </div>
    </form>

  </div>
  <!-- Contact Us Submit Pop Up -->
  <div id="id04">
    <div class="sbtSuccess animate">
      <div class="checklist">
        <img src="../views/img/check1.png" alt="checklist_image" class="check" />
      </div>

      <div class="popupprompt">
        <h1>Success!</h1>
        <p>Your feedback has been sent!</p>
      </div>
    </div>
  </div>
  <!-- The End of Modals -->
