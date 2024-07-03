<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "arlingtondb");

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $kidsQuery = "SELECT Name, StID FROM student WHERE ParID = '$username'";
    $kidsResult = mysqli_query($db, $kidsQuery);

    if (mysqli_num_rows($kidsResult) > 0) {
        while ($kid = mysqli_fetch_assoc($kidsResult)) {
            $name = $kid['Name'];
            $stID = $kid['StID'];

            echo "About $name:<br>";
            echo "<table>
                    <tr>
                      <td>Subjects</td>
                      <td>Quizzes</td>
                      <td>Assignment</td>
                      <td>Mid-term</td>
                      <td>Final</td>
                    </tr>";

            $subjects = ['eng', 'math', 'sc', 'phy', 'info'];
            foreach ($subjects as $subID) {
                $r = "SELECT Name FROM subject WHERE SubID = '$subID'";
                $rr = mysqli_query($db, $r);
                $subn = ($rr) ? mysqli_fetch_array($rr)[0] : "N/A";
                // Quizzes
                $quizQuery = "SELECT AVG(Mark) FROM marks WHERE StID = '$stID' AND TypeTest = 'Q' AND SubID='$subID'";
                $quizResult = mysqli_query($db, $quizQuery);
                $quizAverage = ($quizResult) ? mysqli_fetch_array($quizResult)[0] : "N/A";

                // Assignments
                $assignmentQuery = "SELECT AVG(Mark) FROM marks WHERE StID = '$stID' AND TypeTest = 'A' AND SubID='$subID'";
                $assignmentResult = mysqli_query($db, $assignmentQuery);
                $assignmentAverage   = ($assignmentResult) ? mysqli_fetch_array($assignmentResult)[0] : "N/A";

                // Mid-term exams
                $midtermQuery = "SELECT AVG(Mark) FROM marks WHERE StID = '$stID' AND TypeTest = 'M' AND SubID='$subID'";
                $midtermResult = mysqli_query($db, $midtermQuery);
                $midtermAverage = ($midtermResult) ? mysqli_fetch_array($midtermResult)[0] : "N/A";

                // Final exams
                $finalQuery = "SELECT AVG(Mark) FROM marks WHERE StID = '$stID' AND TypeTest = 'F' AND SubID='$subID'";
                $finalResult = mysqli_query($db, $finalQuery);
                $finalAverage = ($finalResult) ? mysqli_fetch_array($finalResult)[0] : "N/A";

                echo "<tr>
                        <td>$subn</td>
                        <td>$quizAverage</td>
                        <td>$assignmentAverage</td>
                        <td>$midtermAverage</td>
                        <td>$finalAverage</td>
                      </tr>";
            }
            $abQuery = "SELECT count(*) FROM presence WHERE StID = '$stID' AND Pres = 'A' AND Start >= NOW() - INTERVAL 7 DAY  ";
            $abResult = mysqli_query($db,  $abQuery);
            $ab = ($abResult) ? mysqli_fetch_array($abResult)[0] : "N/A";
            $exQuery = "SELECT count(*) FROM presence WHERE StID = '$stID' AND Pres = 'E' AND Start >= NOW() - INTERVAL 7 DAY ";
            $exResult = mysqli_query($db,  $exQuery);
            $ex = ($exResult) ? mysqli_fetch_array($exResult)[0] : "N/A";
            echo "</table>";
            echo"<h3>Total abscence of the week : ".$ab."</h3>";
            echo"<h3>Total exclusions of the week : ".$ex."</h3>";
        }
    } else {
        echo "No kids found for the parent.";
    }
} else {
    echo "User session not found.";
}

mysqli_close($db);
?>

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

    <section class="wrapper">
    <section class="wrapper">
    </section>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>
