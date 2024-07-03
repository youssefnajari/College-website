<!DOCTYPE html>
<html>
  <head>
    <title>Arlington College</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, user-scalable=no"
    />
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
    <section id="banner">
      <div class="inner">
        <h1>Arlington College</h1>
        <p>
        Arlington College
High School
 𝑨 𝒃𝒓𝒊𝒈𝒉𝒕 𝒇𝒖𝒕𝒖𝒓𝒆 𝒂𝒘𝒂𝒊𝒕𝒔<br>
📞98 110 698
📍Lac2 ,Rue de la bourse Tunis
        </p>
      </div>
    </section>
    <section class="wrapper">
      <div id="form">
        <div id="aaa">
          <form action="" method="post">
            <label for="">Username</label>
            <div class="pp">
              <input type="text" name="username" id="username" class="acab" required/>
            </div>
            <label for="">Password</label>
            <div class="pp">
              <input
                  type="password"
                  id="password"
                  name="password"
                  class="acab"
                  required
              />
            </div>
            <input type="submit" id="btn" value="Log in" />
            <?php
session_start();
$db = mysqli_connect("localhost", "root", "", "arlingtondb");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST["username"]) ? $_POST["username"] : '';
    $password = isset($_POST["password"]) ? $_POST["password"] : '';

    $stmt = mysqli_query($db, "SELECT Password, Profession FROM sign_in WHERE Username = '$username'");
    $user = mysqli_fetch_assoc($stmt);

    if ($user) { 
        if ($password == $user['Password']) {
            $_SESSION['username'] = $username;
            
            switch ($user['Profession']) {
                case 'Teacher':
                    header("Location: teamain.php");
                    exit();
                case 'Parent':
                    header("Location: paremain.php");
                    exit();
                case 'Student':
                    header("Location: stumain.php");
                    exit();
                case 'Admin':
                    header("Location: admin.php");
                    exit();
            }
        } else {
            ?>
            <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                Incorrect password!
            </div>
            <?php
        }
    } else {
        ?>
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            Username not found!
        </div>
        <?php
    }

    mysqli_close($db);
}
?>


          </form>
        </div>
        
      </div>
      <div id="hhh">
        <a href="index.html"
          ><div id="lie" class="section" hidden>
            <input type="button" value="Class 1" class="bt" /></div
        ></a>
        <a href="elements.html"
          ><div id="lien" hidden>
            <input type="button" class="bt" value="Class 2" /></div
        ></a>
      </div>
    </section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>
