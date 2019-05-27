<!DOCTYPE html>
<html>
<?php
session_start();
include "includes/dbh_pdo.php";
include "includes/dbh.inc.php";

$user_id = $_SESSION['userId'];
$query = "SELECT * FROM journey WHERE user_id = $user_id";
$stmt = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($stmt);

$country_from = $result['place_from'];
$country_to = $result['place_to'];
$date_start = $result['date_start'];
$date_end = $result['date_end'];
?>

<head>
  <title>Plan It</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--CSS-->
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/menu.css">
  <link rel="stylesheet" href="assets/css/checklist.css">
  <!--Google API Fonts-->
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <!--Font Awesome Icons CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!--Boostrap CDN-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <!-- Header -->
  <header id="header">
    <nav class="left">
      <a href="ini_logged.php" class="logo"><i class="far fa-map"></i>&nbsp;PlanIt</a>
    </nav>
    <nav class="right">
      <a href="route.php">My Plan</a> <!-- isi webpage signup-->
      <a href="#" class="#">Hi, <?php echo $_SESSION['userUid'] ?></a>
      <a href="includes/logout.inc.php" class="#">Logout</a>
    </nav>
  </header>

  <main>
    <nav id="nav-top">
      <ul>
        <li><a href="route.php" style="text-decoration: none">Route</a></li>
        <li><a href="weather.php" style="text-decoration: none">Weather</a></li>
        <li><a href="recommendation.php" style="text-decoration: none">Recommendation</a></li>
        <li><a href="checklist.php" class="active" style="text-decoration: none">Checklist</a></li>
        <li><a href="calendar.php" style="text-decoration: none">Calendar</a></li>
      </ul>
    </nav>
    <!-- Two -->
    <main>

      <div class="container-fluid">
        <div id="checklist" style="margin: 0 20%; min-height: 500px;">

          <div class="cl-header">
            <div class="contents clearfix">
              <span class="header-title">Trip checklist</span>
              <button class="header-btn add-custom-item large"> + Add item</button>
            </div>
          </div>

          <div id="item-cl" style="float:right; width:70%;">
            <div style="background-color:#ff00ff">
            </div>
            <?php
            $query = "SELECT * FROM user_checklist WHERE user_id = ?";
            $result = $pdo->prepare($query);
            $result->execute([$user_id]);

            if ($result->rowCount() > 0) {
              while ($row = $result->fetch()) {

                echo '<div class="item-container">';
                echo '<div class="item-box">';
                if ($row['item_status'] == 1) {
                  echo '<input type="checkbox" class="cl-cb" item_id="' . $row['item_id'] . '" id="check' . $row['item_id'] . '"checked/>';
                } else {
                  echo '<input type="checkbox" class="cl-cb" item_id="' . $row['item_id'] . '" id="check' . $row['item_id'] . '"/>';
                }
                echo '<label for="check' . $row['item_id'] . '" item_id="' . $row['item_id'] . '">' . $row['item_name'] . '</label>';
                echo '<span class="edit-btn side-btn" item-id="' . $row['item_id'] . '"/></span> ';
                echo '<span class="remv-btn side-btn" item-id="' . $row['item_id'] . '"/></span> </div></div>';
              }
            }
            ?>
          </div>

          <div id="rec-cl" style="background-color:none; width: 25%; display:block; border-style: solid">
            <ul class="accordion">
              <li>
                <a class="toggle" style="text-decoration:none;border:1px;" href="javascript:void(0);" title="Click on the item to add it on your checklist!">Item Recommendation</a>
                <ul class="inner">
                  <?php
                  $query = "SELECT weather FROM weather";
                  $result_weather = $pdo->prepare($query);
                  $result_weather->execute();
                  $test = $result_weather->fetch();
                  $weather = unserialize($test['weather']);
                  
                  if(in_array('Rain', $weather)){
                    $weather = 'Rain';
                  } elseif(in_array('Sunny', $weather)){
                    $weather = 'Sunny';
                  }

                  $query = "SELECT checklist.item_id,checklist.item_name FROM checklist LEFT JOIN user_checklist ON user_checklist.checklist_id = checklist.item_id WHERE (user_checklist.checklist_id IS NULL AND weather='Normal') OR (user_checklist.checklist_id IS NULL AND weather ='" . $weather . "')";
                  $result = $pdo->prepare($query);
                  $result->execute();

                  if ($result->rowCount() > 0) {
                    while ($row = $result->fetch()) {
                      echo "<li checklist-id='" . $row['item_id'] . "'><a href='javascript:void(0);' style='text-decoration:none' onclick='addChecklist(" . $row['item_id'] . ");'>" . $row['item_name'] . "</a></li>";
                    }
                  }
                  ?>
                </ul>
              </li>
            </ul>
          </div>

          <div class="modi-bg modi-edit">
            <div class="modi-box">
              <div class="modi-title" title>Edit Item</div>
              <div class="modi-input">
                <div class="modi-input-title">Item title</div>
                <input type="text" name="title" class="modi-input-field" value="">
              </div>
              <div class="modi-btn">
                <button class="btn modi-btn-save">Save</button>
                <button class="btn modi-btn-cncl">Cancel</button>
              </div>
            </div>
          </div>

          <div class="modi-bg modi-add">
            <div class="modi-box">
              <div class="modi-title" title>Add Item</div>
              <div class="modi-input">
                <div class="modi-input-title">Item title</div>
                <input type="text" name="title" class="modi-input-field" value="">
              </div>
              <div class="modi-btn">
                <button class="btn modi-btn-save">Save</button>
                <button class="btn modi-btn-cncl">Cancel</button>
              </div>
            </div>
          </div>
        </div>
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
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!--Skel.io skeleton framework-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/skel/3.0.1/skel.min.js" integrity="sha256-3e+NvOq+D/yeJy1qrWpYkEUr6SlOCL5mHpc2nZfX74E=" crossorigin="anonymous"></script>
    <!--Own Scripts-->
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/checklist.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
    <script>
      function addChecklist(id) {
        $("[checklist-id='" + id + "']").css("display", "none");

        var type = "addinto-checklist";
        $.ajax({
          url: 'add_checklist.php',
          type: 'post',
          data: {
            type: type,
            id: id
          },
          success: function(response) {
            console.log(id);
            window.location.reload();
          }
        });
      }
    </script>
  </main>
</body>


</html>