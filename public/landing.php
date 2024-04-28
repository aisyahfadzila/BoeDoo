<?php
require '../controllers/config.php';
function isUserLoggedIn()
{
  return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../views/css/landing.css" />
  <link rel="icon" type="image/x-icon" href="../views/img/2.png" />
  <title>BoeDoo - Home</title>
</head>

<body>
  <header class="nav-container">
    <div class="navlogo">
      <a href="landing.php"><img src="../views/img/logo.png" /></a>
    </div>
    <nav class="nav-list">
      <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#aboutus">About</a></li>
        <li><a href="#contactus"><span>Contact Us</span></a></li>
        <?php
        if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) {
          ?>
          <li><a href="discover.php" class="discoverNav">Discover</a></li>
          <li><a href="../controllers/logout.php" class="logoutNav"
              onclick="return confirm('Are you sure you want to logout?')">Logout</a></li>
          <?php
        } else if (isset($_SESSION["admin"])) {
          ?>
            <li><a href="admin.php?page=dashboard" class="discoverNav">Review Job</a></li>
            <li><a href="../controllers/logout.php" class="logoutNav"
                onclick="return confirm('Are you sure you want to logout?')">Logout</a></li>
          <?php
        } else {
          // Pengguna belum login, tampilkan menu login dan sign up
          echo '
          <li><a href="#" class="loginNav">Login</a></li>
          <li><a href="#" class="signupNav">Sign Up</a></li>
        ';
        }
        ?>
      </ul>
    </nav>
  </header>
  <?php include 'object/modals.php'; ?>

  <main>
    <!-- Homepage -->
    <section id="home" autofocus>
      <article>
        <div>
          <img src="../views/img/profile picture.png" alt="homepage image" width="400px" />
        </div>
        <div class="homeTitle">
          <h2>
            <span class="unleash">Unleash</span> your<br />potential with Us.
          </h2>
        </div>
      </article>
    </section>
    <section id="aboutus">
      <article>
        <p id="about">
          <span class="title">Get to Know Us<br /><br /></span>
          BoeDoo merupakan platform penyedia lowongan<br />pekerjaan part-time
          bagi mahasiswa Tel-U.<br /><br />
          Menyediakan informasi bagi mahasiswa<br />yang membutuhkan uang atau
          pengalaman<br />dari proyek dan penelitian baik dari<br />sesama
          mahasiswa atau dosen.
        </p>
        <img src="../views/img/Frame Ilustrasi.png" alt="About Us image" />
      </article>
    </section>
    <section id="contactus">
      <h2>
        <span class="ctTitleL">Contact </span><span class="ctTitleR"> Us</span>
      </h2>
      <article>
        <br />
        <div>
          <form id="contactForm" method="post" action="../controllers/feedback.php"
            onsubmit="return checkLoginStatus()">
            <div class="jobDescBox">
              <input type="fake-placeholder" id="fake-placeholder" placeholder="MESSAGE" autocomplete="off">
              <textarea name="message" id="job-description" maxlength="2048"
                style="width: 874px; height: 294px; background-color:transparent" required autocapitalize="sentences"
                autocomplete="off"></textarea>
            </div>
            <br />
            <button class="contact" style="width: auto" type="submit" name="feedback">
              Submit
            </button>
          </form>
        </div>
      </article>
    </section>
    <!--  -->
  </main>

  
  <!-- Footer -->
  <?php include 'object/footer.php' ?>
  <!--  -->
  <?php include 'object/scripts.php' ?>
  <script>
    function checkLoginStatus() {
      // Gantikan kondisi berikut dengan pengecekan sesi login yang sesuai
      var isLoggedIn = <?php echo isUserLoggedIn() ? 'true' : 'false'; ?>;

      if (!isLoggedIn) {
        alert("Please login first.");
        return false; // Mencegah form melakukan aksi menuju halaman lain
      }

      return true; // Mengizinkan form melakukan aksi menuju halaman lain
    }
  </script>
</body>

</html>