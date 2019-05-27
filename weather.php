<!DOCTYPE html>
<html>
<?php
session_start();
include "includes/dbh.inc.php";

$user_id = $_SESSION['userId'];
$query = "SELECT * FROM journey WHERE user_id = $user_id";
$stmt = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($stmt);

$country_from = $result['place_from'];
$country_to = $result['place_to'];
$date_start = $result['date_start'];
$date_end = $result['date_end'];

$_SESSION['country_from'] = $country_from;
$_SESSION['country_to'] = $country_to;
$_SESSION['date_start'] = $date_start;
$_SESSION['date_end'] = $date_end;

if(isset($_POST['update'])) {
  $country_from_new = $_POST['ori'];
  $country_to_new = $_POST['dest'];
  $date_start_new = $_POST['date_from'];
  $date_end_new = $_POST['date_end'];

  if(empty($country_from_new)) $country_from_new = $_SESSION['country_from'];
  if(empty($country_to_new)) $country_to_new = $_SESSION['country_to'];
  if(empty($date_start_new)) $date_start_new = $_SESSION['date_start'];
  if(empty($date_end_new)) $date_end_new = $_SESSION['date_end'];

  $query = "UPDATE journey SET place_from = '$country_from_new', place_to = '$country_to_new', date_start = '$date_start_new', date_end = '$date_end_new' WHERE user_id = $user_id";

  $result = $conn->query($query);
        if ($result === false) {
            echo "SQL error:" . $conn->error;
        }

        $user_id = $_SESSION['userId'];
        $query = "SELECT * FROM journey WHERE user_id = $user_id";
        $stmt = mysqli_query($conn, $query);
        $result = mysqli_fetch_assoc($stmt);
        
        $country_from = $result['place_from'];
        $country_to = $result['place_to'];
        $date_start = $result['date_start'];
        $date_end = $result['date_end'];
        
        $_SESSION['country_from'] = $country_from;
        $_SESSION['country_to'] = $country_to;
        $_SESSION['date_start'] = $date_start;
        $_SESSION['date_end'] = $date_end;
}
?>

<head>
  <title>Plan It</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--CSS-->
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/menu.css">
  <link rel="stylesheet" href="assets/css/route.css">
  <link rel="stylesheet" href="assets/css/route_full.css">
  <!--Google API Fonts-->
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">
  <!--Font Awesome Icons CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!--Boostrap CDN-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    {
      box-sizing: border-box;
    }

    /* Button used to open the contact form - fixed at the bottom of the page */
    .open-button {
      background-color: #f6755e;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      opacity: 1;
      position: relative;
      bottom: -50px;
      left: 28px;
      width: 250px;
      z-index: 10001;
    }

    /* The popup form - hidden by default */
    .form-popup {
      display: none;
      position: absolute;
      bottom: 295px;
      left: 375px;
      border: 3px solid #f1f1f1;
      z-index: 1000;
    }

    /* Add styles to the form container */
    .form-container {
      max-width: 300px;
      max-height: 450px;
      /* margin: -50px 0 0 0; */
      padding: 10px;
      background-color: white;
    }

    /* Full-width input fields */
    .form-container input[type=text],
    .form-container input[type=date] {
      width: 100%;
      padding: 10px;
      margin: 2px 0 10px 0;
      border: none;
      background: #f1f1f1;
    }

    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus,
    .form-container input[type=password]:focus {
      background-color: #ddd;
      outline: none;
    }

    /* Set a style for the submit/login button */
    .form-container .btn {
      background-color: #4CAF50;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom: 10px;
      opacity: 1;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
      background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover,
    .open-button:hover {
      opacity: 1;
    }

    .myP {
      padding: 10px;
      border: 3px solid #f1f1f1;
      margin-left: 900px;
      max-width: 250px;
      background: #f6755e;
    }
  </style>
</head>

<body>
  <!-- Header -->
  <header id="header">
    <nav class="left">
      <a href="ini_logged.php" class="logo"><i class="far fa-map"></i>&nbsp;PlanIt</a>
    </nav>
    <nav class="right">
      <a href="route.php">My Plan</a>
      <a href="#" class="#">Hi, <?php echo $_SESSION['userUid'] ?></a>
      <a href="includes/logout.inc.php" class="#">Logout</a>
    </nav>
  </header>

  <main>
    <nav id="nav-top">
      <ul>
        <li><a href="route.php" style="text-decoration: none">Route</a></li>
        <li><a href="weather.php" class="active" style="text-decoration: none">Weather</a></li>
        <li><a href="recommendation.php" style="text-decoration: none">Recommendation</a></li>
        <li><a href="checklist.php" style="text-decoration: none">Checklist</a></li>
        <li><a href="calendar.php" style="text-decoration: none">Calendar</a></li>
      </ul>
    </nav>

    <div class="container">
      <button class="open-button" onclick="openForm()">Change Destination</button>

      <div class="form-popup" id="myForm">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-container">
          <h1>Login</h1>
          <label for="ori"><b>Origin</b></label>
          <input type="text" placeholder=<?php echo $country_from?> name="ori">

          <label for="dest"><b>Destination</b></label>
          <input type="text" placeholder=<?php echo $country_to?> name="dest">

          <label for="date_from"><b>Start Date</b></label>
          <input type="date" placeholder=<?php echo $date_start?> name="date_from">

          <label for="date_end"><b>End Date</b></label>
          <input type="date" placeholder=<?php echo $date_end?> name="date_end">

          <button type="submit" class="btn" name="update">Update</button>
        </form>
      </div>
    </div>

    <div class="container">
      <div>
      <!-- <p><br></p> -->
      <p class="myP"><?php echo $country_from." TO ".$country_to ?></p>
      <p class="myP"><?php echo $date_start." TO ".$date_end ?></p>
      </div>
      <table style="margin-top:10px">
        <tr id="dates">
          <td>Date</td>
        </tr>
        <tr id="weather">
          <td>Weather</td>
        </tr>
        <tr id="temperature">
          <td>Temperature</td>
        </tr>
      </table>
    </div>
    <div class="container">
      <canvas id="myChart" style="border-style: hidden;"></canvas>
    </div>
  </main>


  <!-- Footer -->
  <footer id="footer">
    <div class="inner">
      <h2>Contact Us</h2>
      <ul class="actions">
        <li><span class="icon fa-phone"></span> <a href="#">012-3456789</a></li>
        <li><span class="icon fa-envelope"></span> <a href="#">planIt.info@gmail.com</a></li>
        <li><span class="icon fa-map-marker"> </span>69, KK13, University Malaya</li>
      </ul>
    </div>
    <div class="copyright">
      Copyright &copy; reserved 2019 PlanIt.Co
    </div>
  </footer>

  <!--Bootstrap & JQuery-->
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <!--Skel.io skeleton framework-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/skel/3.0.1/skel.min.js"
    integrity="sha256-3e+NvOq+D/yeJy1qrWpYkEUr6SlOCL5mHpc2nZfX74E=" crossorigin="anonymous"></script>
  <!--Own Scripts-->

  <script src="assets/js/util.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/checklist.js"></script>
  <script src="assets/js/weather.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
  <script>
    function openForm() {
      if (document.getElementById("myForm").style.display == "block") {
        document.getElementById("myForm").style.display = "none";
      } else {
        document.getElementById("myForm").style.display = "block";
      };
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }
  </script>
  <script>
    var CITY = "<?php echo $country_to ?>";
    getWeatherData(CITY);
  </script>

</body>

</html>