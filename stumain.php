<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "arlingtondb");
if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
} else {
  $username = "N/A"; // Set a default value if the session doesn't have the username
}
$nameQuery = "SELECT Name FROM sign_in WHERE Username = '$username'";
$nameResult = mysqli_query($db, $nameQuery);
$name = ($nameResult) ? mysqli_fetch_array($nameResult)[0] : "N/A";

$db = mysqli_connect("localhost", "root", "", "arlingtondb");

if (isset($username)) {

  // Quizz eng
  $quizQuery = "SELECT AVG(Mark) FROM marks WHERE StID = '$username' AND TypeTest = 'Q' AND SubID='eng'";
  $quizResult = mysqli_query($db, $quizQuery);
  $quizAverage = ($quizResult) ? mysqli_fetch_array($quizResult)[0] : "N/A";

  // Assignments eng
  $assignmentQuery = "SELECT Mark FROM marks WHERE StID = '$username' AND TypeTest = 'A' AND SubID='eng'";
  $assignmentResult = mysqli_query($db, $assignmentQuery);
  $assignmentAverage = ($assignmentResult) ? mysqli_fetch_array($assignmentResult)[0] : "N/A";

  // Mid-term eng
  $midtermQuery = "SELECT Mark FROM marks WHERE StID = '$username' AND TypeTest = 'M' AND SubID='eng'";
  $midtermResult = mysqli_query($db, $midtermQuery);
  $midtermAverage = ($midtermResult) ? mysqli_fetch_array($midtermResult)[0] : "N/A";

  // Final eng
  $finalQuery = "SELECT Mark FROM marks WHERE StID = '$username' AND TypeTest = 'F' AND SubID='eng'";
  $finalResult = mysqli_query($db, $finalQuery);
  $finalAverage = ($finalResult) ? mysqli_fetch_array($finalResult)[0] : "N/A";

    // Quizz math
    $quizQuerym = "SELECT AVG(Mark) FROM marks WHERE StID = '$username' AND TypeTest = 'Q' AND SubID='math'";
    $quizResultm = mysqli_query($db, $quizQuerym);
    $quizAveragem = ($quizResultm) ? mysqli_fetch_array($quizResultm)[0] : "N/A";
  
    // Assignments math
    $assignmentQuerym = "SELECT Mark FROM marks WHERE StID = '$username' AND TypeTest = 'A' AND SubID='math'";
    $assignmentResultm = mysqli_query($db, $assignmentQuerym);
    $assignmentAveragem = ($assignmentResultm) ? mysqli_fetch_array($assignmentResultm)[0] : "N/A";
  
    // Mid-term math
    $midtermQuerym = "SELECT Mark FROM marks WHERE StID = '$username' AND TypeTest = 'M' AND SubID='math'";
    $midtermResultm = mysqli_query($db, $midtermQuerym);
    $midtermAveragem = ($midtermResultm) ? mysqli_fetch_array($midtermResultm)[0] : "N/A";
  
    // Final math
    $finalQuerym = "SELECT Mark FROM marks WHERE StID = '$username' AND TypeTest = 'F' AND SubID='math'";
    $finalResultm = mysqli_query($db, $finalQuerym);
    $finalAveragem = ($finalResultm) ? mysqli_fetch_array($finalResultm)[0] : "N/A";


      // Quizz sc
  $quizQuerys = "SELECT AVG(Mark) FROM marks WHERE StID = '$username' AND TypeTest = 'Q' AND SubID='sc'";
  $quizResults = mysqli_query($db, $quizQuerys);
  $quizAverages = ($quizResults) ? mysqli_fetch_array($quizResults)[0] : "N/A";

  // Assignments sc
  $assignmentQuerys = "SELECT Mark FROM marks WHERE StID = '$username' AND TypeTest = 'A' AND SubID='sc'";
  $assignmentResults = mysqli_query($db, $assignmentQuerys);
  $assignmentAverages = ($assignmentResults) ? mysqli_fetch_array($assignmentResults)[0] : "N/A";

  // Mid-term sc
  $midtermQuerys = "SELECT Mark FROM marks WHERE StID = '$username' AND TypeTest = 'M' AND SubID='sc'";
  $midtermResults = mysqli_query($db, $midtermQuerys);
  $midtermAverages = ($midtermResults) ? mysqli_fetch_array($midtermResults)[0] : "N/A";

  // Final sc
  $finalQuerys = "SELECT Mark FROM marks WHERE StID = '$username' AND TypeTest = 'F' AND SubID='sc'";
  $finalResults = mysqli_query($db, $finalQuerys);
  $finalAverages = ($finalResults) ? mysqli_fetch_array($finalResults)[0] : "N/A";


    // Quizz Phy
    $quizQueryp = "SELECT AVG(Mark) FROM marks WHERE StID = '$username' AND TypeTest = 'Q' AND SubID='Phy'";
    $quizResultp = mysqli_query($db, $quizQueryp);
    $quizAveragep = ($quizResultp) ? mysqli_fetch_array($quizResultp)[0] : "N/A";
  
    // Assignments Phy
    $assignmentQueryp = "SELECT Mark FROM marks WHERE StID = '$username' AND TypeTest = 'A' AND SubID='Phy'";
    $assignmentResultp = mysqli_query($db, $assignmentQueryp);
    $assignmentAveragep = ($assignmentResultp) ? mysqli_fetch_array($assignmentResultp)[0] : "N/A";
  
    // Mid-term Phy
    $midtermQueryp = "SELECT Mark FROM marks WHERE StID = '$username' AND TypeTest = 'M' AND SubID='Phy'";
    $midtermResultp = mysqli_query($db, $midtermQueryp);
    $midtermAveragep = ($midtermResultp) ? mysqli_fetch_array($midtermResultp)[0] : "N/A";
  
    // Final Phy
    $finalQueryp = "SELECT Mark FROM marks WHERE StID = '$username' AND TypeTest = 'F' AND SubID='Phy'";
    $finalResultp = mysqli_query($db, $finalQueryp);
    $finalAveragep = ($finalResultp) ? mysqli_fetch_array($finalResultp)[0] : "N/A";


        // Quizz Info
        $quizQueryi = "SELECT AVG(Mark) FROM marks WHERE StID = '$username' AND TypeTest = 'Q' AND SubID='Info'";
        $quizResulti = mysqli_query($db, $quizQueryi);
        $quizAveragei = ($quizResulti) ? mysqli_fetch_array($quizResulti)[0] : "N/A";
      
        // Assignments Info
        $assignmentQueryi = "SELECT Mark FROM marks WHERE StID = '$username' AND TypeTest = 'A' AND SubID='Info'";
        $assignmentResulti = mysqli_query($db, $assignmentQueryi);
        $assignmentAveragei = ($assignmentResulti) ? mysqli_fetch_array($assignmentResulti)[0] : "N/A";
      
        // Mid-term Info
        $midtermQueryi = "SELECT Mark FROM marks WHERE StID = '$username' AND TypeTest = 'M' AND SubID='Info'";
        $midtermResulti = mysqli_query($db, $midtermQueryi);
        $midtermAveragei = ($midtermResulti) ? mysqli_fetch_array($midtermResulti)[0] : "N/A";
      
        // Final Info
        $finalQueryi = "SELECT Mark FROM marks WHERE StID = '$username' AND TypeTest = 'F' AND SubID='Info'";
        $finalResulti = mysqli_query($db, $finalQueryi);
        $finalAveragei = ($finalResulti) ? mysqli_fetch_array($finalResulti)[0] : "N/A";

} else {
  // Handle the case when 'u' is not set
  $quizAverage = $assignmentAverage = $midtermAverage = $finalAverage = "N/A";
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Arlington College</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
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
    <div>
      <p>Hello, <?php echo $name; ?>!</p>
    </div>
    <table>
      <tr>
        <td>Subjects</td>
        <td>English</td>
        <td>Mathematics</td>
        <td>Science</td>
        <td>Physics</td>
        <td>Informatics</td>
      </tr>
      <tr>
        <td>Quizz</td>
        <td><?php echo $quizAverage; ?></td>
        <td><?php echo $quizAveragem; ?></td>
        <td><?php echo $quizAverages; ?></td>
        <td><?php echo $quizAveragep; ?></td>
        <td><?php echo $quizAveragei; ?></td>
      </tr>
      <tr>
        <td>Assignments</td>
        <td><?php echo $assignmentAverage; ?></td>
        <td><?php echo $assignmentAveragem; ?></td>
        <td><?php echo $assignmentAverages; ?></td>
        <td><?php echo $assignmentAveragep; ?></td>
        <td><?php echo $assignmentAveragei; ?></td>
      </tr>
      <tr>
        <td>Mid-term</td>
        <td><?php echo $midtermAverage; ?></td>
        <td><?php echo $midtermAveragem; ?></td>
        <td><?php echo $midtermAverages; ?></td>
        <td><?php echo $midtermAveragep; ?></td>
        <td><?php echo $midtermAveragei; ?></td>
      </tr>
      <tr>
        <td>Final</td>
        <td><?php echo $finalAverage; ?></td>
        <td><?php echo $finalAveragem; ?></td>
        <td><?php echo $finalAverages; ?></td>
        <td><?php echo $finalAveragep; ?></td>
        <td><?php echo $finalAveragei; ?></td>
      </tr>
    </table>
  </section>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/browser.min.js"></script>
  <script src="assets/js/breakpoints.min.js"></script>
  <script src="assets/js/util.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
