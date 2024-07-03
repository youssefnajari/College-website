<head>
    <title>Arlington College</title>
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
<div id="formip">
  <div id="forma">
    <form action="" onsubmit="return verif()" method="post">
      <label for="n">Name</label>
      <div class="ppp">
        <input
          type="text"
          id="n"
          name="n"
          class="name"
          onblur="verifn()"
        />
        <div id="name"></div>
      </div>
      <label for="fn">Family Name</label>
      <div class="ppp">
        <input type="text" name="fn" id="fn" onblur="veriffn()" />
        <div id="fname"></div>
      </div>
      <label for="u">Cin</label>
      <div class="ppp">
        <input
          type="text"
          id="u"
          name="u"
          class="username"
          onblur="verifu()"
        />
        <div id="us"></div>
      </div>
      <label for="psw">Email</label>
      <div class="ppp">
        <input type="email" id="em" name="em" required/>
        <div id="pswr"></div>
      </div>
      <label for="psw">Password</label>
      <div class="ppp">
        <input type="password" id="psw" name="psw" onblur="verifp()" />
        <div id="pswr"></div>
      </div>
      <label for="cpsw">Confirm Password</label>
      <div class="ppp">
        <input type="password" id="cpsw" onblur="verifcp()" />
        <div id="cpswr"></div>
      </div>
      <input type="submit" value="Valid" id="btnn" />
      <div id="aff"></div>
      <?php
$db = mysqli_connect("localhost", "root", "", "arlingtondb");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = mysqli_real_escape_string($db, $_POST["n"]);
    $fn = mysqli_real_escape_string($db, $_POST["fn"]);
    $usn = mysqli_real_escape_string($db, $_POST["u"]);
    $psw = mysqli_real_escape_string($db, $_POST["psw"]);
    $e = mysqli_real_escape_string($db, $_POST["em"]);
    $errors = [];

    $r2 = mysqli_query($db, "SELECT * FROM sign_in WHERE Username='$usn'");
    if (mysqli_num_rows($r2) == 0) {
        $r1 = mysqli_query($db, "INSERT INTO sign_in VALUES('$usn','$n','$fn','$psw','Parent')");
        $r3 = mysqli_query($db, "INSERT INTO parent VALUES('$usn','$n','$fn','$e')");

        if ($r1 && $r3) {
            echo '<div class="alertt">
                    <span class="closebttn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
                    Added successfully!
                  </div>';
        } else {
            echo '<div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
                    An error occurred while adding the parent.
                  </div>';
        }
    } else {
        echo '<div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
                Parent already exists.
              </div>';
    }

    mysqli_close($db);
}
?>
  </form>
  </div>
</div>
</section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
