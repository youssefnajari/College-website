<head>
    <title>Arlington college</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, user-scalable=no"
    />
    <script src="verif.js"></script>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="assets/css/main.css" />
  </head>
  <body class="is-preload">
    <header id="header">
    <a class="logo" href="signin.php">Arlington College</a>
      <nav>
        <a href="#menu">Menu</a>
      </nav>
    </header>

    <nav id="menu">
      <ul class="links">
        <li> <p class="poss">
          <a href="#" target="_blank" class="aaaa"
            ><i class="icon fa-facebook">&nbsp;</i>Facebook</a
          >
        </p></li>
        <li><p class="poss">
          <a href="https://www.instagram.com/arlington_college/" target="_blank" class="aaaa"
            ><i class="icon fa-instagram">&nbsp;</i>Instagram</a
          >
        </p></li>
        <li> <p class="poss">
          <a href="#" target="_blank" class="aaaa"
            ><i class="icon fa-twitter">&nbsp;</i>Twitter</a
          >
        </p></li>
      </ul>
    </nav>
    <section class="wrapper">
      <div class="formi">
        <div id="forma">
          <form action="" onsubmit="return verif()" method="post">
            <label for="s">What do you want to add? </label>
            <div class="ppp">
              <select name="s" id="">
                <option value="Teacher">Teacher</option>
                <option value="Student">Student</option>
                <option value="Parent">Parent</option>
              </select>
            </div><div>
            <input type="submit" value="Valid" id="btnn" />
            <div id="aff"></div></div>
          </form>
        </div>
      </div>
    </section>
<script>
<?php
$db=mysqli_connect("localhost","root","","arlingtondb");
$s=$_POST["s"];
switch ($s) {
  case 'Teacher':
      header("Location: teacher.php");
      exit();
  case 'Parent':
      header("Location: parent.php");
      exit();
  case 'Student':
      header("Location: student.php");
      exit();
}
mysqli_close($db);
?>
</script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
  </body>

