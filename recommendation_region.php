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
    echo ($searchq);
    $query = "select name_place,description,image,place_id from recommendation WHERE region like '$searchq'";
    $result = $conn->query($query);
    
    /* numeric array */
    $row = $result->fetch_all();
    // var_dump($row[0][0]);

?>


<head>
    <title>Plan It</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS-->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/menu.css">
    <!-- <link rel="stylesheet" href="assets/css/test-checklist.css"> -->
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
      <section class="wrapper" style="margin-top:-10%; margin-bottom:-10%">
        <div class="container" style="padding: 10px; margin: auto; background-color:aliceblue; border-radius:1rem">
          <div class="container">
            <canvas id="myChart" style="border-style: hidden;"></canvas>
          </div>
          <div class="container">
            <table style="margin-top:10px">
              <tr id="dates">
                <td>Date</td>
              </tr>
              <tr id="weather">
                <td>Weather</td>
              </tr>
            </table>
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
                                                <p id="description1" class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <a id="add" class="btn btn-primary" onclick="adds1()">Add to Checklist</a>
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
                                                <p id="description2" class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <a id="add2" class="btn btn-primary" onclick="adds2()">Add to Checklist</a>
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
                                                <p id="description3" class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <a id="add" class="btn btn-primary" onclick="adds3()">Add to Checklist</a>
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
                                                <p id="description4" class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <a id="add" class="btn btn-primary" onclick="adds4()">Add to Checklist</a>
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
                                                <p id="description5" class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <a id="add" class="btn btn-primary" onclick="adds5()">Add to Checklist</a>
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
                                                <p id="description6" class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <a id="add" class="btn btn-primary" onclick="adds6()">Add to Checklist</a>
                                            </div>
                                            </div>
                                        </div>
                                        <br>
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
            var CITY = "<?php echo $_SESSION['country_to'] ?>";
            getWeatherData(CITY);
        </script>
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
            document.getElementById("description1").innerHTML=value[0][1];

            var image2=value[1][2];
            document.getElementById("name2").innerHTML=value[1][0];
            document.getElementById("image2").src=image2;
            document.getElementById("description2").innerHTML=value[1][1];

            var image3=value[2][2];
            document.getElementById("name3").innerHTML=value[2][0];
            document.getElementById("image3").src=image3;
            document.getElementById("description3").innerHTML=value[2][1];

            var image4=value[3][2];
            document.getElementById("name4").innerHTML=value[3][0];
            document.getElementById("image4").src=image4;
            document.getElementById("description4").innerHTML=value[3][1];

            var image5=value[4][2];
            document.getElementById("name5").innerHTML=value[4][0];
            document.getElementById("image5").src=image5;
            document.getElementById("description5").innerHTML=value[4][1];

            var image6=value[5][2];
            document.getElementById("name6").innerHTML=value[5][0];
            document.getElementById("image6").src=image6;
            document.getElementById("description6").innerHTML=value[5][1];

            function check(){
                
                var test="test";
                console.log(test);
            }
            
            function adds1(){   
                var pass = value[0][3];
                console.log(pass)
                
                $.ajax({
                    url:"add.php", //the page containing php script
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
                var pass = value[1][3];
                console.log(pass)
                
                $.ajax({
                    url:"add.php", //the page containing php script
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
                var pass = value[2][3];
                console.log(pass)
                $.ajax({
                    url:"add.php", //the page containing php script
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
                var pass = value[3][3];
                console.log(pass)
                $.ajax({
                    url:"add.php", //the page containing php script
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
                var pass = value[4][3];
                console.log(pass)
                $.ajax({
                    url:"add.php", //the page containing php script
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
                var pass = value[5][3];
                console.log(pass)
                $.ajax({
                    url:"add.php", //the page containing php script
                    type: "post", //request type,
                    dataType: 'json',
                    data: {passValue: pass},
                    success: function(data){
                        console.log(data);
                        }
                });        
                alert("Added to checklist: ");         
                }
            

        </script>


       
        
        <!--end-->
    </main>
</body>

</html>