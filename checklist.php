<!DOCTYPE html>
<html>
<?php
session_start();
?>

<head>
  <title>Plan It</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--CSS-->
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/route.css">
  <link rel="stylesheet" href="assets/css/test-checklist.css">
  <!--Google API Fonts-->
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <!--Font Awesome Icons CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!--Boostrap CDN-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <!-- Header -->
  <header id="header">
    <nav class="left">
      <a href="index.html" class="logo"><i class="far fa-map"></i>&nbsp;PlanIt</a>
    </nav>
    <nav class="right">
      <a href="#">New Plan</a>
      <a href="route.php">My Plan</a> <!-- isi webpage signup-->
      <a href="#" class="#"><?php echo $_SESSION['userUid'] ?></a>
    </nav>
  </header>

  <!-- Banner -->
  <section id="banner">
    <div>
      <h1 style="margin-top:-10%">Weather Forecast</h1>
      <section class="wrapper">
        <div class="align-center">
          <a class="weatherwidget-io" style="width:70%;left:12%; position:center;"
            href="https://forecast7.com/en/34d69135d50/osaka/" data-label_1="OSAKA" data-label_2="WEATHER"
            data-font="Roboto" data-icons="Climacons Animated" data-mode="Forecast" data-days="5"
            data-theme="pure">OSAKA WEATHER</a>
        </div>
      </section>
    </div>
  </section>

  <main>
    <ul class="menu">
      <li><a href="checklist.php" class="active" style="text-decoration: none">Checklist</a></li>
      <li><a href="route.php" style="text-decoration: none">Route</a></li>
      <li><a href="placeresult.php" style="text-decoration: none">Recommendation</a></li>
      <li><a href="calender.php" style="text-decoration: none">Calender</a></li>
      <li class="slider"></li>
    </ul>
    <!-- Two -->
    <main>
      <!-- One -->
      <!-- left side search-->
      <section>
        <div style="margin-top:40px; margin-bottom:180px;">
          <div id="checklist" style="margin: 0 15% 0 15% ;">

            <div class="cl-header">
              <div class="contents clearfix">
                <span class="header-title">Trip checklist</span>
                <button class="header-btn add-custom-item large"> + Add item</button>
              </div>
            </div>

            <div id="item-cl">
              <div class="item-container">
                <div class="item-box">
                  <input type="checkbox" class="cl-cb" id="check1" />
                  <label for="check1">Buy Ticket</label>
                  <span class="edit-btn side-btn" for="check1"></span>
                  <span class="remv-btn side-btn" for="check1"></span>
                </div>
              </div>
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
      </section>

      <!-- right side KOSONG-->
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
    <script src="https://code.jquery.com/jquery-3.3.1.js"
      integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
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
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/checklist.js"></script>
    <script>
        ! function (d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (!d.getElementById(id)) {
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://weatherwidget.io/js/widget.min.js';
            fjs.parentNode.insertBefore(js, fjs);
          }
        }(document, 'script', 'weatherwidget-io-js');
      </script>
  </main>
</body>


</html>