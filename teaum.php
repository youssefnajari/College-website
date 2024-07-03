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
    <link rel="stylesheet" href="assets/css/mimi.css" />
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
<div id="formitumo" >
  <div id="forma">
    <form action="" onsubmit="return verif()" method="post">
      
    <label for="s">Subject's ID</label>
      <div class="ppp">
        <input type="text" name="s" id="s" required placeholder="eng/math/sc/phy/info"/>
        </div>
        <label for="u">Student's username</label>
      <div class="ppp">
        <input type="text" name="u" id="u" required/>
        </div>
        <label for="m">Mark</label>
      <div class="ppp">
        <input type="text" name="mrk" id="mrk" required/>
        </div>
      <label for="s">Choose a test type </label>
      <div class="ppp">
              <select name="tt" id="">
                <option value="Q">Quizz</option>
                <option value="A">Assigiments</option>
                <option value="M">Mid-term</option>
                <option value="F">Final</option>
              </select></div>
    <input type="submit" value="Valid" id="btnn" />
    <?php
$db=mysqli_connect("localhost","root","","arlingtondb");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["s"]) && isset($_POST["u"]) && isset($_POST["mrk"]) && isset($_POST["tt"])) {
        $s=$_POST["s"];
        $u=$_POST["u"];
        $mrk=$_POST["mrk"];
        $tt=$_POST["tt"];

        $r2 = mysqli_query($db, "INSERT INTO marks (StID, SubID, TypeTest, Mark, Date) VALUES ('$u', '$s', '$tt', '$mrk', CURDATE())");
        
        if($r2) {
          echo '<div class="alertt">
          <span class="closebttn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
          Added successfully!
        </div>';
        } else {
          echo '<div class="alert">
          <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
          An error occurred while adding the mark.
        </div>';
        }
    } else {
        echo "All fields are required.";
    }
}

mysqli_close($db);
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
</html>
