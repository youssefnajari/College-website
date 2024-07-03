<!DOCTYPE html>
<html>
  <head>
  <title>Arlington college</title>
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
    <section class="wrapper" id="wwww">
      <div><table>
        <thead>
          <tr>
            <td>Teacher's name</td>
            <td>Teacher's last name</td>
            <td>Total hours of the week</td>
          </tr>
        </thead>
        <?php
$db = mysqli_connect("localhost", "root", "", "arlingtondb");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

$r = mysqli_query($db, "SELECT Name, FamilyName, Username FROM sign_in WHERE Profession='Teacher'");
if ($r === false) {
    die("Query failed: " . mysqli_error($db));
}

while ($t = mysqli_fetch_assoc($r)) {
    $r1 = mysqli_query($db, "SELECT SUM(Duration) AS totalDuration 
                             FROM session 
                             WHERE Start >= NOW() - INTERVAL 7 DAY 
                             AND TeaID='{$t['Username']}'");

    if ($r1 === false) {
        die("Subquery failed: " . mysqli_error($db));
    }

    $t1 = mysqli_fetch_assoc($r1);
    $q = $t1['totalDuration'] / 60;

    echo "<tr><td>{$t['Name']}</td><td>{$t['FamilyName']}</td><td>{$q}</td></tr>";
}

mysqli_close($db);
?>

</table></div>
<a href="add.php"><input type="button" id="add" value="Add"/></a>
<div id="habthabt"></div>
    </section>    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>
