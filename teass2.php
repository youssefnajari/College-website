<head>
    <title>Arlington College</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, user-scalable=no"
    />
    <script>
      function valid() {
            dateTimeString = document.getElementById("daaate").value;
            const dateTimeRegex = /^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/;
            if (dateTimeRegex.test(dateTimeString)) {
                const parsedDate = new Date(dateTimeString);
                if (!isNaN(parsedDate.getTime())) {
                    document.getElementById("aabb").innerHTML = "";
                    return true;
                }
            }
            document.getElementById("aabb").style.color = "red";
            document.getElementById("aabb").innerHTML =
                "Invalid DateTime (Follow the format exactly)";
            return false;
      }

    </script>

    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="assets/css/main.css" />
  </head>
  <body class="is-preload">
  <script src="verif.js"></script>
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
<div id="forma">
  <div id="mokrz2">
    <form action="" onsubmit="" method="post">
    <label>Re-enter your ID</label>
        <input type="text" name="id" />
        <label>Duration of the session (minutes)</label>
        <input type="text" name="d"/>
        <label>Date and time of the session</label>
        <input type="text" name="da" placeholder="YYYY-MM-DD HH:MM:SS " id="daaate" onblur="valid()" />
        <div id="mokrz"></div>
        <table>
            <tr>
                <td>Student</td>
                <td>Presence</td>
            </tr>

            <?php
$db = mysqli_connect("localhost", "root", "", "arlingtondb");

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
$r = mysqli_query($db, "SELECT Name, LastName, StID FROM Student WHERE ClID='C2'");

if ($r === false) {
    die("Query failed: " . mysqli_error($db));
}

while ($t = mysqli_fetch_assoc($r)) {
    echo "<tr><td>{$t['Name']} {$t['LastName']}</td><td><select name='{$t['StID']}'>
        <option value='P'>P</option>
        <option value='A'>A</option>
        <option value='E'>E</option>
      </select></td></tr>";
}
?>

        </table>
        <input type="submit" value="Submit">
    </form>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $d = mysqli_real_escape_string($db, $_POST["d"]);
    $da = mysqli_real_escape_string($db, $_POST["da"]);
    $id = mysqli_real_escape_string($db, $_POST["id"]);
    $errors = [];

    if (empty($d) || empty($da) || empty($id)) {
        echo '<div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
                All fields are required.
              </div>';
    } else {
        $r1 = mysqli_query($db, "INSERT INTO session (TeaID,ClID, Start, Duration) VALUES ('$id','C2', str_to_date('$da', '%Y-%m-%d %H:%i:%s'), '$d')");

        if (!$r1) {
            die("Query failed: " . mysqli_error($db));
        }

        $r2 = mysqli_query($db, "SELECT Name, LastName, StID FROM Student WHERE ClID='C2'");

        while ($t = mysqli_fetch_assoc($r2)) {
            $st = mysqli_real_escape_string($db, $t['StID']);
            $p = mysqli_real_escape_string($db, $_POST[$t['StID']]);
            $r3 = mysqli_query($db, "INSERT INTO presence (Start, StID, Pres) VALUES (str_to_date('$da', '%Y-%m-%d %H:%i:%s'), '$st', '$p')");

            if (!$r3) {
                die("Query failed: " . mysqli_error($db));
            }
        }
        echo '<div class="alertt">
                <span class="closebttn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
                Session and attendance added successfully!
              </div>';
    }
    mysqli_close($db);
}
?>
</div>
</div>
</section>
<script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
