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
    <link rel="stylesheet" href="assets/css/menu.css">
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
            <a href="index.html" class="logo"><i class="far fa-map"></i>&nbsp;PlanIt</a>
        </nav>
        <nav class="right">
            <a href="route.php">My Plan</a>
            <a href="#" class="#">Hi, <?php echo $_SESSION['userUid'] ?></a>
            <a href="includes/logout.inc.php" class="#">Logout</a>
        </nav>
    </header>

    <!-- Banner -->
    <section id="banner">
        <div>
            <h1 style="margin-top:-10%;">Weather Forecast</h1>
            <section class="wrapper" style="margin-top:-10%; margin-bottom:-15%">
                <div class="container" style="padding: 10px; margin: auto; background-color:aliceblue; border-radius:1rem">
                    <div class="container">
                        <canvas id="myChart" style="border-style: hidden;"></canvas>
                    </div>
                </div>
            </section>
        </div>
    </section>

    <main>
        <nav id="nav-top">
            <ul>
                <li><a href="recommendation.php" class="active" style="text-decoration: none">Recommendation</a></li>
                <li><a href="route.php" style="text-decoration: none">Route</a></li>
                <li><a href="checklist.php" style="text-decoration: none">Checklist</a></li>
                <li><a href="calender.php" style="text-decoration: none">Calender</a></li>
            </ul>
        </nav>

        <main>
            <div id="one" class="wrapper">
                <div class="inner flex flex-3"></div>
                <div class="align-center" style="margin-top:-90px;">
                    <h2>Recommendation Result</h2>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 sidebar">
                                <div class="sidebar-wrap">
                                    <h3 class="heading mb-4">Find City</h3>
                                    <!-- <form> -->
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Destination, City" id="place_search">
                                            <input type="submit" value="Search" class="btn btn-primary" id="search_button">
                                        </div>
                                    <!-- </form> -->
                                </div>
                            </div>

                            <div class="col-lg-9">
                                <div class="row" id="item-cl">
                                    <!-- item append below this -->
                                    <!-- <div class="col-md-4">
                                        <div class="destination">
                                            <div class="text p-3">
                                                <div class="d-flex">
                                                    <div class="one">
                                                        <h3>Seoul Tower, Korea</h3>
                                                    </div>
                                                </div>
                                                <p>One of the nicest views in Korea</p>
                                                <hr>
                                                <p class="bottom-area d-flex">
                                                    <span><i class="icon-map-o"></i> Seoul, Korea</span>
                                                    <span class="ml-auto"><a href="#">Add</a></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="destination">
                                            <div class="text p-3">
                                                <div class="d-flex">
                                                    <div class="one">
                                                        <h3>Jeju Island, Korea</h3>
                                                    </div>
                                                </div>
                                                <p>The best island there is in the world</p>
                                                <hr>
                                                <p class="bottom-area d-flex">
                                                    <span><i class="icon-map-o"></i> Korea</span>
                                                    <span class="ml-auto"><a href="#">Add</a></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div> -->

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
        <!-- <script src="assets/js/jquery.scrolly.min.js"></script> -->
        <script src="assets/js/util.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/checklist.js"></script>
        <script src="assets/js/recommendation.js"></script>
        <script src="assets/js/weather.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
        <script>
            var CITY = "<?php echo $_SESSION['country_to'] ?>";
            getWeatherData(CITY);
        </script>
        <!--end-->
    </main>
</body>

</html>