<!DOCTYPE html>
<html>
<?php
session_start();
include "includes/dbh.inc.php";
include "includes/dbh_pdo.php";

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
  <link rel="stylesheet" href="assets/css/route.css">
  <link rel="stylesheet" href="assets/css/route_full.css">
  <!--Google API Fonts-->
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">
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
      <a href="route.php">My Plan</a>
      <a href="#" class="#">Hi, <?php echo $_SESSION['userUid'] ?></a>
      <a href="includes/logout.inc.php" class="#">Logout</a>
    </nav>
  </header>

  <main>
    <nav id="nav-top">
      <ul>
        <li><a href="route.php" class="active" style="text-decoration: none">Route</a></li>
        <li><a href="weather.php" style="text-decoration: none">Weather</a></li>
        <li><a href="recommendation.php" style="text-decoration: none">Recommendation</a></li>
        <li><a href="checklist.php" style="text-decoration: none">Checklist</a></li>
        <li><a href="calendar.php" style="text-decoration: none">Calendar</a></li>
      </ul>
    </nav>
  </main>

  <main>
    <svg xmlns:xlink="http://www.w3.org/1999/xlink" style="display: none;">
      <symbol viewBox="0 0 24 24" id="icon-desktop-reorder" width="100%" height="100%">
        <path d="m6.938 3 5.624 6.5h-3.214v8.125h-4.821v-8.125h-3.215z"></path>
        <path d="m17.062 21 5.626-6.5h-3.215v-8.125h-4.821v8.125h-3.214z"></path>
      </symbol>
      <symbol viewBox="0 0 24 24" id="icon-edit" width="100%" height="100%">
        <path d="M3,17.25V21h3.75L17.811,9.94l-3.75-3.75L3,17.25z M20.71,7.04c0.392-0.39,0.392-1.02,0-1.41l-2.34-2.34
          c-0.392-0.39-1.021-0.39-1.41,0l-1.83,1.83l3.75,3.75L20.71,7.04z"></path>
      </symbol>
      <symbol viewBox="0 0 24 24" id="icon-reorder" width="100%" height="100%">
        <path d="M3,15h18v-2H3V15z M3,19h18v-2H3V19z M3,11h18V9H3V11z M3,5v2h18V5H3z"></path>
      </symbol>
    </svg>

    <div id="planContent" class="plan-content" style="background-color: #fff;">
      <div id="resultpageContent" class="resultpage-content">
        <div id="overview" class="tab-content active">
          <div id="overviewRoutePane" class="overview-route-pane">
            <div id="route" style="background-color: #fff;">
              <h2 class="edit-route-title">View / Edit route</h2>
              <div class="route-main-pane" style="background-color: #fff; overflow-y: scroll;
min-width: 200px; height: 500px; margin-left:-4%;">

                <div class="route-rows">
                  <div class="route-row boundary-row start" style="background-color: #fff;">
                    <div class="left">
                      <div class="marker"></div>
                      <div class="line down"></div>
                    </div>

                    <div class="content">
                      <div class="title">Start: <?php echo $country_from ?></div>
                    </div>
                  </div>
                  <div class="left">
                    <div class="start-end-dates">Start Date: <?php echo $date_start ?></div>
                  </div>
                  <div id="r1" class="draggable route-row stay-row  first">
                    <div class="left">
                      <div class="marker notranslate"></div>
                      <div class="line"></div>
                    </div>
                    <div class="content">
                      <div class="title"><?php echo $country_to ?></div>
                    </div>
                  </div>
                  <?php

                  // Attempt select query execution
                  try {
                    $sql = "SELECT * FROM events WHERE user_id = '$user_id'";

                    $result = $pdo->prepare($sql);
                    $result->execute();
                    if ($result->rowCount() > 0) {

                      while ($row = $result->fetch()) {
                        echo "<div id='".$row['id']."' class='draggable route-row stay-row  first'><div class='left'><div class='marker notranslate'></div><div class='line'></div></div><div class='content' ><div class='title'>".$row['title']."</div>";
                        echo '<div style="padding-left:15px;font-size:14px;color:#888; font-style:italic;">' . date('Y-n-j', strtotime($row['start_event'])) . '</div>';
                        echo "<span class='line-hr'></span><svg class='edit stay-icon' for='".$row['id']."' title='Edit destination'><use xlink:href='#icon-edit'></use></svg></div></div>";
                      }
                      // Free result set
                      unset($result);
                    } else {
                      echo "No records matching your query were found.";
                    }
                  } catch (PDOException $e) {
                    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
                  }
                  ?>
                </div>
                <div class="content">
                  <div class="start-end-dates">End Date: <?php echo $date_end ?></div>
                </div>
                <div class="route-row boundary-row end">
                  <div class="left">
                    <div class="marker"></div>
                    <div class="line up"></div>
                  </div>
                  <div class="content">
                    <div class="title" id="weather_country_to">End: <?php echo $country_from ?></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Add destination -->
            <div class="route-right-pane">
              <button class="routeaddbtn add-destination cta-button large">Add destination</button>
              <form action="calendar.php"><button class="cta-button large">Change dates</button></form>
              <div class="clearfix" style="background-color: #fff;"></div>

              <div class="dest-rail active" style="display: block;">
                <div class="card" style="width: 400px;">
                  <div class="card-body" id="reccard" style="width: 440px;">
                    <h5 class="card-title">Recommendations</h5>
                    <p class="card-text" style="width: 350px;">
                      <table style="width:90%">
                        <?php
                        include("includes/dbh.inc.php");
                        $user = $_SESSION['userUid'];
                        $sql = "select idUsers from users where uidUsers like '$user'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_all();
                        $userid = $row[0][0];

                        $sql = "SELECT recommendation.name_place, user_recommendation.place_id FROM `recommendation` 
                                  inner join user_recommendation ON recommendation.place_id = user_recommendation.place_id
                                  where user_recommendation.user_id like '$userid'";

                        $result = $conn->query($sql);
                        $row = $result->fetch_all();
                        $_SESSION["result_arr"] = $row;
                        echo "<br>";
                        $rownum = count($row);
                        $num = 1;

                        for ($i = 0; $i < $rownum; $i++) {
                          $k = $row[$i][0];
                          $j = $row[$i][1];
                          echo "<form>
                            <input type='hidden' id='copying' name='custId' value=$k>
                                </form>";
                          echo "<tr><th>$num. $k</th><th><a href='delete_recommendations.php?id=$j'><button onclick()='delete_recommendations.php?id=$j' style= 'height:30px; padding:3px; margin-top:15px;' type='button' class='btn btn-danger'>Remove</button></a></th>
                            </tr>";

                          $num++;
                        }
                        $conn->close();
                        ?>
                      </table>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="layer1 edit-pane" style="z-index: 100;">
          <div class="ui-dialog ui-corner-all ui-widget ui-widget-content ui-front dlg-route-edit dlg-modify-boundary dlg-add-destination mediumx animated ui-dialog-buttons open" style="height: auto; width: 20%; margin: 10% auto; display: block;">
            <div class="ui-dialog-titlebar ui-corner-all ui-widget-header ui-helper-clearfix">
              <span id="ui-id-16" class="ui-dialog-title">Edit destination</span>
              <button type="button" class="ui-button ui-corner-all ui-widget ui-button-icon-only ui-dialog-titlebar-close" title="Cancel edit">
                <span class="ui-button-icon ui-icon ui-icon-closethick"></span>
                <span class="ui-button-icon-space"> </span>
              </button>
            </div>

            <div id="ui-id-9" class="ui-dialog-content ui-widget-content" style="display: block; width: auto; min-height: 0px; max-height: none; height: auto; left: 20%;">
              <input type="text" class="flat ui-autocomplete-input" name="search" id="dest-search" placeholder="Start typing..." autocomplete="off" title="Edit destination">
            </div>

            <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
              <div class="ui-dialog-buttonset">
                <button type="button" style="left: 30%;" class="editsavebtn cta-button large" title="Save edit">Save</button>
                <button type="button" style="left: 40%; background-color:red;" class="editremobtn cta-button large" title="Remove destination">Remove</button>
              </div>
            </div>
          </div>
        </div>

        <div class="dialog-container add-pane" style="z-index: 1002;">
          <div class="ui-dialog ui-corner-all ui-widget ui-widget-content ui-front dlg-route-edit dlg-modify-boundary dlg-add-destination mediumx animated ui-dialog-buttons open" style="height: auto; width: 20%; margin: 10% auto; display: block;">
            <div class="ui-dialog-titlebar ui-corner-all ui-widget-header ui-helper-clearfix">
              <span class="ui-dialog-title">Add destination</span>
              <button type="button" class="ui-button ui-corner-all ui-widget ui-button-icon-only ui-dialog-titlebar-close" title="">
                <span class="ui-button-icon ui-icon ui-icon-closethick"></span>
                <span class="ui-button-icon-space"></span>
              </button>
            </div>

            <div class="ui-dialog-content ui-widget-content" style="display: block; width: auto; min-height: 0px; max-height: none; height: auto; left: 20%;">
              <input type="text" class="flat ui-autocomplete-input" name="search" placeholder="Start typing..." autocomplete="off">
            </div>

            <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix" style="z-index: 1010;">
              <div class="ui-dialog-buttonset">
                <button type="button" class="addtoplan cta-button large" style="left: 40%;">Add to plan</button>
              </div>
            </div>
          </div>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
  <script type="text/javascript" src="assets/js/addroute.js"></script>

</body>
</html>