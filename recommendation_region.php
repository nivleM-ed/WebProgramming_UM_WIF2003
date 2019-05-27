<!DOCTYPE html>
<html>
<?php
    session_start();

    $_SESSION['result_arr'] = array();
    include("includes/dbh.inc.php");

    /* check connection */
    if ($conn->connect_errno) {
        printf("Connect failed: %s\n", $conn->connect_error);
        exit();
    }
    $searchq = $_GET['region'];
    // echo ($searchq);
    $query = "SELECT name_place,description,image,activity,place_id FROM recommendation WHERE region LIKE '$searchq'";
    $result = $conn->query($query);
    
    /* numeric array */
    $row = $result->fetch_all();
    // var_dump($row[0][0]);

?>


<head>
    <style>
        .card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
        }
        /* Outer */
        .popup {
            width:100%;
            height:100%;
            display:none;
            position:fixed;
            top:0px;
            left:0px;
            background:rgba(0,0,0,0.75);
        }
        .popup-inner{ overflow: -moz-scrollbars-none;
         }
        /* Inner */
        .popup-inner {
            max-width:700px;
            max-height:500px;
            width:100%;
            height:100%;
            padding:40px;
            position:absolute;
            top:57%;
            left:50%;
            -webkit-transform:translate(-50%, -50%);
            transform:translate(-50%, -50%);
            box-shadow:0px 2px 6px rgba(0,0,0,1);
            border-radius: 25px;
            background:#fff;
            /* overflow:auto; */
            overflow: -moz-scrollbars-none;
            /* overflow: hidden; */
        }

        /* Close Button */
        .popup-close {
            width:30px;
            height:30px;
            padding-top:4px;
            display:inline-block;
            position:absolute;
            top:0px;
            right:0px;
            transition:ease 0.25s all;
            -webkit-transform:translate(50%, -50%);
            transform:translate(50%, -50%);
            border-radius:1000px;
            background:rgba(0,0,0,0.8);
            font-family:Arial, Sans-Serif;
            font-size:20px;
            text-align:center;
            line-height:100%;
            color:#fff;
        }

        .popup-close:hover {
            -webkit-transform:translate(50%, -50%) rotate(180deg);
            transform:translate(50%, -50%) rotate(180deg);
            background:rgba(0,0,0,1);
            text-decoration:none;
        }
    </style>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!-- JQuery Library -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>

<body>
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
        <li><a href="weather.php" style="text-decoration: none">Weather</a></li>
        <li><a href="recommendation.php" class="active" style="text-decoration: none">Recommendation</a></li>
        <li><a href="checklist.php" style="text-decoration: none">Checklist</a></li>
        <li><a href="calendar.php" style="text-decoration: none">Calendar</a></li>
      </ul>
    </nav>

        <main>
            <div id="one" class="wrapper">
                <div class="inner flex flex-3"></div>
                <div class="align-center" style="margin-top:-90px;margin-left:-40px;">
                    <h2>Recommendation Result</h2>
                    <div class="container">
                        <div class="row" >
                            <div class="col-lg-3 sidebar" >
                                <div class="sidebar-wrap">
                                    <h3 class="heading mb-4">Find City</h3>
                                    <!-- <form> -->
                                        <form action = "recommendation.php" method = "POST">
                                            <div class="form-group" >
                                                <div class="row">
                                                <div class="autocomplete">
                                                <input type="text" class="form-control" placeholder="Enter Country" id="myInput" name="country">
                                                <br>
                                                <div>
                                                <input type="submit" value="Search"  id="search_button">
                                            </div>
                                                </div>
                                            </div>
                                            </div>
                                        </form>
                                    <!-- </form> -->
                                </div>
                            </div>

                           <!-- Bootstrap Card Start-->
                            <div class="col-lg-9">
                                
                           
                                <div class="row" id="item-cl">
                                    <!-- item append below this -->
                                    <!-- 1st Card -->
                                    <div class="col-md-4">
                                        <div class="destination">
                                        <div class="card" style="width: 18rem;">
                                            <img id="image1" class="card-img-top" src="images/destination-1.jpg" alt="Card image cap" height="300mm">
                                            <div class="card-body">
                                                <h5 id="name1" class="card-title">Card title</h5>
                                                <a id="add" data-popup-open="popup-1" class="btn btn-primary"  ">Details</a>
                                            </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <!-- 2nd Card -->
                                    <div class="col-md-4">
                                        <div class="destination">
                                        <div class="card" style="width: 18rem;">
                                            <img id="image2" class="card-img-top" src="images/destination-2.jpg" alt="Card image cap" height="300mm">
                                            <div class="card-body">
                                                <h5 id="name2" class="card-title">Sydney</h5>
                                                <a id="add" data-popup-open="popup-2" class="btn btn-primary"  ">Details</a>
                                            </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <!-- 3rd Card -->
                                    <div class="col-md-4">
                                        <div class="destination">
                                        <div class="card" style="width: 18rem;">
                                            <img id="image3" class="card-img-top" src="images/destination-3.jpg" alt="Card image cap" height="300mm">
                                            <div class="card-body">
                                                <h5 id="name3" class="card-title">Card title</h5>
                                                <a id="add" data-popup-open="popup-3" class="btn btn-primary"  ">Details</a>

                                            </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <!-- 4th Card -->
                                    <div class="col-md-4">
                                        <div class="destination">
                                        <div class="card" style="width: 18rem;">
                                        <img id="image4" class="card-img-top" src="images/destination-4.jpg" alt="Card image cap" height="300mm">
                                            <div class="card-body">
                                                <h5 id="name4" class="card-title">Card title</h5>
                                                <a id="add" data-popup-open="popup-4" class="btn btn-primary"  ">Details</a>

                                            </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <!-- 5th Card -->
                                    <div class="col-md-4">
                                        <div class="destination">
                                        <div class="card" style="width: 18rem;">
                                        <img id="image5" class="card-img-top" src="images/destination-5.jpg" alt="Card image cap" height="300mm">
                                            <div class="card-body">
                                                <h5 id="name5" class="card-title">Card title</h5>
                                                <a id="add" data-popup-open="popup-5" class="btn btn-primary"  ">Details</a>

                                            </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <!-- 6th Card -->
                                    <div class="col-md-4">
                                        <div class="destination">
                                        <div class="card" style="width: 18rem;">
                                        <img id="image6" class="card-img-top" src="images/destination-5.jpg" alt="Card image cap" height="300mm">
                                            <div class="card-body">
                                                <h5 id="name6" class="card-title">Card title</h5>
                                                <a id="add" data-popup-open="popup-6" class="btn btn-primary"  ">Details</a>

                                            </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    
                                    <!-- Card 1 pop up details -->
                                    <div class="popup" data-popup="popup-1">
                                        <div class="popup-inner">
                                        <div class="card" style="width: 20rem;">
                                            <img class="card-img-top" src=<?php echo $row[0][2] ?> alt="Card image cap" >
                                        </div>
                                            <h2><?php echo $row[0][0] ?></h2>
                                            <p><strong>Description: </strong><?php echo($row[0][1]) ?> </p>
                                            <!-- <p id="description6" class="card-text"><?php echo($row[0][1]) ?></p> -->
                                            <p><strong>Activity: </strong><?php echo($row[0][3]) ?> </p>
                                            <!-- <p><?php echo($row[0][3]) ?></p>                                             -->
                                            <a id="add" class="btn btn-primary"  onclick="adds1()">Add to Checklist</a>
                                            <a class="btn btn-primary" data-popup-close="popup-1" href="#">Close</a>
                                            <a class="popup-close" data-popup-close="popup-1" href="#">x</a>
                                        </div>
                                    </div>
                                    <!--End of Card 1 pop up details -->

                                    <!-- Card 2 pop up details -->
                                    <div class="popup" data-popup="popup-2">
                                        <div class="popup-inner">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src=<?php echo $row[1][2] ?> alt="Card image cap" >
                                        </div>
                                            <h2><?php echo $row[1][0] ?></h2>
                                            <p><strong>Description: </strong><?php echo($row[1][1]) ?> </p>
                                            <!-- <p id="description6" class="card-text"><?php echo($row[1][1]) ?></p> -->
                                            <p><strong>Activity: </strong> <?php echo($row[1][3]) ?></p>
                                            <!-- <p><?php echo($row[1][3]) ?></p>                                             -->
                                            <a id="add" class="btn btn-primary"  onclick="adds2()">Add to Checklist</a>
                                            <a class="btn btn-primary" data-popup-close="popup-2" href="#">Close</a>
                                            <a class="popup-close" data-popup-close="popup-2" href="#">x</a>
                                        </div>
                                    </div>
                                    <!--End of Card 2 pop up details -->

                                    <!-- Card 3 pop up details -->
                                    <div class="popup" data-popup="popup-3">
                                        <div class="popup-inner">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src=<?php echo $row[2][2] ?> alt="Card image cap" >
                                        </div>
                                            <h2><?php echo $row[2][0] ?></h2>
                                            <p><strong>Description: </strong><?php echo($row[2][1]) ?> </p>
                                            <!-- <p id="description6" class="card-text"><?php echo($row[2][1]) ?></p> -->
                                            <p><strong>Activity: </strong><?php echo($row[2][3]) ?> </p>
                                            <!-- <p><?php echo($row[2][3]) ?></p>                                             -->
                                            <a id="add" class="btn btn-primary"  onclick="adds3()">Add to Checklist</a>
                                            <a class="btn btn-primary" data-popup-close="popup-3" href="#">Close</a>
                                            <a class="popup-close" data-popup-close="popup-3" href="#">x</a>
                                        </div>
                                    </div>
                                    <!--End of Card 3 pop up details -->

                                    <!-- Card 4 pop up details -->
                                    <div class="popup" data-popup="popup-4">
                                        <div class="popup-inner">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src=<?php echo $row[3][2] ?> alt="Card image cap" >
                                        </div>
                                            <h2><?php echo $row[3][0] ?></h2>
                                            <p><strong>Description: <?php echo($row[3][1]) ?></strong> </p>
                                            <!-- <p id="description6" class="card-text"><?php echo($row[3][1]) ?></p> -->
                                            <p><strong>Activity:</strong> <?php echo($row[3][3]) ?> </p>
                                            <!-- <p><?php echo($row[3][3]) ?></p>                                             -->
                                            <a id="add" class="btn btn-primary"  onclick="adds4()">Add to Checklist</a>
                                            <a class="btn btn-primary" data-popup-close="popup-4" href="#">Close</a>
                                            <a class="popup-close" data-popup-close="popup-4" href="#">x</a>
                                        </div>
                                    </div>
                                    <!--End of Card 4 pop up details -->

                                    <!-- Card 5 pop up details -->
                                    <div class="popup" data-popup="popup-5">
                                        <div class="popup-inner">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src=<?php echo $row[4][2] ?> alt="Card image cap" >
                                        </div>
                                            <h2><?php echo $row[4][0] ?></h2>
                                            <p><strong>Description: </strong> <?php echo($row[4][1]) ?></p>
                                            <!-- <p id="description6" class="card-text"><?php echo($row[4][1]) ?></p> -->
                                            <p><strong>Activity: </strong> <?php echo($row[4][3]) ?></p>
                                            <!-- <p><?php echo($row[4][3]) ?></p> -->
                                            <a id="add" class="btn btn-primary"  onclick="adds5()">Add to Checklist</a>
                                            <a class="btn btn-primary" data-popup-close="popup-5" href="#">Close</a>
                                            <a class="popup-close" data-popup-close="popup-5" href="#">x</a>
                                        </div>
                                    </div>
                                    <!--End of Card 5 pop up details -->

                                    <!-- Card 6 pop up details -->
                                    <div class="popup" data-popup="popup-6">
                                        <div class="popup-inner">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src=<?php echo $row[5][2] ?> alt="Card image cap" >
                                        </div>
                                            <h2><?php echo $row[5][0] ?></h2>
                                            
                                            <p><strong>Description: </strong> <?php echo($row[5][1]) ?></p>
                                            <!-- <p id="description6" class="card-text"><?php echo($row[5][1]) ?></p> -->
                                            <p><strong>Activity: </strong> <?php echo($row[5][3]) ?></p>
                                            <!-- <p><?php echo($row[5][3]) ?></p> -->
                                            
                                            <a id="add" class="btn btn-primary"  onclick="adds6()">Add to Checklist<br></a>
                                            <a class="btn btn-primary" data-popup-close="popup-6" href="#">Close</a>
                                            <a class="popup-close" data-popup-close="popup-6" href="#">x</a>
                                        </div>
                                    </div>
                                    <!--End of Card 6 pop up details -->

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
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script> -->
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
        <!-- <script src="assets/js/recommendation.js"></script> -->
        <script src="assets/js/weather.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>

        <script>
            console.log("script on");
		$(".add-button").click(function () {
			itemId = $(this).attr('id');
			var value = $("h3[id='" + itemId + "']").text();
            console.log(value);
            console.log("button works");
        });
        
	
        </script>
        <script>
            <?php $_SESSION['result_arr'] = array(); ?>
            var value = <?php echo json_encode($row); ?>;
            console.log(value);
            var count = (Object.keys(value).length)/2;

            var image1=value[0][2];
            document.getElementById("name1").innerHTML=value[0][0];
            document.getElementById("image1").src=image1;

            var image2=value[1][2];
            document.getElementById("name2").innerHTML=value[1][0];
            document.getElementById("image2").src=image2;

            var image3=value[2][2];
            document.getElementById("name3").innerHTML=value[2][0];
            document.getElementById("image3").src=image3;

            var image4=value[3][2];
            document.getElementById("name4").innerHTML=value[3][0];
            document.getElementById("image4").src=image4;

            var image5=value[4][2];
            document.getElementById("name5").innerHTML=value[4][0];
            document.getElementById("image5").src=image5;

            var image6=value[5][2];
            document.getElementById("name6").innerHTML=value[5][0];
            document.getElementById("image6").src=image6;

            function check(){
                
                var test="test";
                console.log(test);
            }
            
            function adds1(){   
                var pass = value[0][4];
                console.log(pass)
                
                $.ajax({
                    url:"add_recommendations.php", //the page containing php script
                    type: "post", //request type,
                    dataType: 'json',
                    data: {passValue: pass},
                    success: function(data){
                        console.log(data);
                        }
                });    
                var userids = "<?php echo $_SESSION['userUid'] ?>";
                alert("Added to checklist");
              
            //   fetch("./add.php", {
            //     method: "POST", // *GET, POST, PUT, DELETE, etc.
            //     headers: {
            //         "Content-Type": "application/json",
            //         // "Content-Type": "application/x-www-form-urlencoded",
            //     },
            //     body: JSON.stringify({passValue: pass, name: 'amirul'}), // body data type must match "Content-Type" header
            // })
            // .then(response => response.json())
            // .then((data) => console.log(data));
            }

            function adds2(){
                var pass = value[1][4];
                console.log(pass)
                
                $.ajax({
                    url:"add_recommendations.php", //the page containing php script
                    type: "post", //request type,
                    dataType: 'json',
                    data: {passValue: pass},
                    success: function(data){
                        console.log(data);
                        }
                });        
              alert("Added to checklist: ");

            }

            function adds3(){
                var pass = value[2][4];
                console.log(pass)
                $.ajax({
                    url:"add_recommendations.php", //the page containing php script
                    type: "post", //request type,
                    dataType: 'json',
                    data: {passValue: pass},
                    success: function(data){
                        console.log(data);
                        }
                });        
                alert("Added to checklist: ");
            }

            function adds4(){
                var pass = value[3][4];
                console.log(pass)
                $.ajax({
                    url:"add_recommendations.php", //the page containing php script
                    type: "post", //request type,
                    dataType: 'json',
                    data: {passValue: pass},
                    success: function(data){
                        console.log(data);
                        }
                });        
                alert("Added to checklist: ");            
                }

            function adds5(){
                var pass = value[4][4];
                console.log(pass)
                $.ajax({
                    url:"add_recommendations.php", //the page containing php script
                    type: "post", //request type,
                    dataType: 'json',
                    data: {passValue: pass},
                    success: function(data){
                        console.log(data);
                        }
                });        
                alert("Added to checklist: ");           
                 }

            function adds6(){
                var pass = value[5][4];
                console.log(pass)
                $.ajax({
                    url:"add_recommendations.php", //the page containing php script
                    type: "post", //request type,
                    dataType: 'json',
                    data: {passValue: pass},
                    success: function(data){
                        console.log(data);
                        }
                });        
                alert("Added to checklist: ");         
                }
            
                // $(function() {
                    //----- OPEN
                    $('[data-popup-open]').on('click', function(e) {
                        var targeted_popup_class = jQuery(this).attr('data-popup-open');
                        $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);

                        e.preventDefault();
                    });

                    //----- CLOSE
                    $('[data-popup-close]').on('click', function(e) {
                        var targeted_popup_class = jQuery(this).attr('data-popup-close');
                        $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);

                        e.preventDefault();
                    });
                // });
        </script>


       
        
        <!--end-->
    </main>
</body>

</html>