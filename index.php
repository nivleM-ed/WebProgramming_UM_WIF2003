<!DOCTYPE html>
<html>

<head>
    <title>PlanIt</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--CSS-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <!--Google API Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">
    <!--Font Awesome Icons CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!--Boostrap CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <!-- Header -->
    <header id="header">
        <nav class="left">
            <a href="index.php" class="logo"><i class="far fa-map"></i>&nbsp;PlanIt<sup>&copy</sup></a>
            <a>Plan with ease!</a>
        </nav>
        <nav class="right">
            <a href="login.php" class="button alt">Log in</a>
            <a href="signup.php" class="button alt">Sign Up</a>
        </nav>
    </header>
    <!-- Banner -->
    <section id="banner">
        <div class="inner flex flex-3">
            <div class="align-left">
                <h1 style="margin-top:-60px;text-shadow: 4px 4px 10px #222;">
                    <bold>PlanIt<sup>&copy</sup> your <br>next Journey</bold>
                </h1>
                <h5 style="margin-top:-20px;color:#fff;text-shadow: 2px 2px 8px #222;">
                    <bold>Create a fully customized day-by-day itinerary for free</bold>
                </h5>

                <!--If not logged in, sent to login page-->
                <form method="POST" action="login.php">
                    <div class="form-row ">
                        <div class="col-md-3.2 mb-3">
                            <label for="inputFrom" style="text-shadow: 2px 2px 8px #222;color:white;text-align: left;">Origin</label>
                            <input type="text" class="form-control" id="inputFrom" placeholder="Enter Origin" required style="border:1px solid #f1f1f1; border-radius:8px; background:#fff; opacity:1;">
                        </div>
                        <div class="col-md-3.2 mb-3">
                            <label for="inputTo" style="text-shadow: 2px 2px 8px #222;color:white;text-align: left;">Destination</label>
                            <input type="text" class="form-control" id="inputTo" placeholder="Enter Destination" required style="border:1px solid #f1f1f1; border-radius:8px; background:#fff; opacity:1;">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3.2 mb-3">
                            <label for="validationDefault04" style="text-shadow: 2px 2px 8px #222;color:white;text-align: left;">Start Date</label>
                            <input class="form-control" type="date" value="" id="date-input" style="height:70% width:50%;">
                        </div>
                        <div class="col-md-3.2 mb-3">
                            <label for="validationDefault05" style="text-shadow: 2px 2px 8px #222;color:white;text-align: left;">End Date</label>
                            <input class="form-control" type="date" value="" id="date-input2" style="height:70% width:10%;">
                        </div>
                        <div class="col-md-3.2 mb-3">
                            <button type="submit" class="btn btn-primary" style="margin-top:35%"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <main>
        <!-- One -->
        <section id="two" class="wrapper style1 special">
            <div class="inner">
                <h1>Trip with ease</h1>
                <div>
                    <img src="assets/images/planit_use.png" alt="" width="80%" height="80%">
                </div>
            </div>
        </section>

        <!-- Two -->
        <section id="one" class="wrapper">
            <div class="inner" style="text-align: center">
                <h1>Benefits of PlanIt</h1>
            </div>

            <div class="inner flex flex-3">
                <img src="assets/images/recommendation.png" alt="" width="50%" height="50%" style="float: right;">
                <div class="flex-item right">
                    <img src="assets/images/one.png" alt="" width="12%" height="15%">
                    <p>
                        <h4><br>Recommendation API that helps search the perfect vacation spot for you!</h4>
                        <ul>
                            <li>Best places and time to visit</li>
                            <li>Best reviews</li>
                            <li>Perfect price range</li>
                            <li>Hidden spots</li>
                        </ul>
                    </p>
                </div>
            </div>
            <br><br>
            <div class="inner flex flex-3">
                <div class="flex-item right">
                    <img src="assets/images/two.png" alt="" width="12%" height="13%">
                    <p>
                        <h4><br>Customizable calender just for you!</h4>
                        <ul>
                            <li>Fully ustomizable calender</li>
                            <li>Add activites</li>
                            <li>Delete activities</li>
                        </ul>
                    </p>
                </div>
                <img src="assets/images/calender.png" alt="" width="50%" height="50%" style="float: right;">
            </div>
        </section>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!--Skel.io skeleton framework-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/skel/3.0.1/skel.min.js" integrity="sha256-3e+NvOq+D/yeJy1qrWpYkEUr6SlOCL5mHpc2nZfX74E=" crossorigin="anonymous"></script>
    <!--Own Scripts-->
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>