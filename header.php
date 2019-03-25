<?php
    session_start();
?>

<html>
<head>
    <title>ONLINE TRIP PLANNER</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>
   <!-- Header -->
   <header id="header">
        <nav class="left">
            <a href="#menu"><span>Menu</span></a>
        </nav>
        <a href="index.php" class="logo"><i class="far fa-map"></i>

            PlanIt</a>
        <nav class="right">
            <a href="login.php" class="button alt">Log in</a>
            <a href="#" class="button alt">Sign Up</a>
        </nav>
    </header>

<!-- Menu -->
    <nav id="menu">
        <ul class="links">
            <li><a href="index.html">Home</a></li>
            <li><a href="generic.html">Generic</a></li>
            <li><a href="elements.html">Elements</a></li>
        </ul>
        <ul class="actions vertical">
            <li><a href="#" class="button fit">Login</a></li>
        </ul>
    </nav>
    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>