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
  <link rel="stylesheet" href="assets/css/main.css" />
  <link rel="stylesheet" href="assets/css/menu.css">
  <link rel="stylesheet" href="assets/css/calender.css">
  <link rel="stylesheet" href="assets/css/route.css">
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
      <a href="index.php" class="logo"><i class="far fa-map"></i>&nbsp;PlanIt</a>
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
        <li><a href="calender.php" class="active" style="text-decoration: none">Calender</a></li>
        <li><a href="route.php" style="text-decoration: none">Route</a></li>
        <li><a href="recommendation.php" style="text-decoration: none">Recommendation</a></li>
        <li><a href="checklist.php" style="text-decoration: none">Checklist</a></li>
      </ul>
    </nav>
    <!-- Two -->
    <section>
      <div style="margin-top:5%;margin-right:-5%; padding:25px; border-left:1px solid #f1f1f1;" class="route-right-pane">
        <div class="clearfix" style="background-color: #fff;"></div>
        <br>
        <div class="dest-rail active" style="display: block;">
          <div class="see-also">Trip recommendation:</div>
          <ul style="list-style: none; padding: 0;">
            <li>
              <span class="tour-title">Get from recomendations.</span>&nbsp;
            </li>
          </ul>
        </div>
      </div>
      </div>
      <br>
      <div style="margin-right:23%;" id='calendar'></div>

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
  <script src="assets/js/calendar.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['interaction', 'dayGrid', 'timeGrid'],
        header: {
          left: 'prev,next, today',
          center: 'title',
          right: 'dayGridMonth, dayGridWeek, dayGridDay'
        },
        defaultDate: '2019-04-12',
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,
        select: function(arg) {
          var title = prompt('Event Title:');
          if (title) {
            calendar.addEvent({
              title: title,
              start: arg.start,
              end: arg.end,
              allDay: arg.allDay
            })
          }
          calendar.unselect()
        },

        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: [{
            title: 'All Day Event',
            start: '2019-04-01'
          },
          {
            title: 'Long Event',
            start: '2019-04-07',
            end: '2019-04-10'
          },
          {
            groupId: 999,
            title: 'Repeating Event',
            start: '2019-04-09T16:00:00'
          },
          {
            groupId: 999,
            title: 'Repeating Event',
            start: '2019-04-16T16:00:00'
          },
          {
            title: 'Conference',
            start: '2019-04-11',
            end: '2019-04-13'
          },
          {
            title: 'Visit Seoul',
            start: '2019-04-12T10:30:00',
            end: '2019-04-12T12:30:00'
          },
          {
            title: 'Lunch',
            start: '2019-04-12T12:00:00'
          },
          {
            title: 'Visit Seoul Tower',
            start: '2019-04-12T14:30:00'
          },
          {
            title: 'Happy Hour',
            start: '2019-04-12T17:30:00'
          },
          {
            title: 'Dinner',
            start: '2019-04-12T20:00:00'
          },
          {
            title: 'Visit Myeondong',
            start: '2019-04-13T07:00:00'
          },
          {
            title: 'Click for Google',
            url: 'http://google.com/',
            start: '2019-04-28'
          }
        ],
        eventClick: function(arg) {
          if (confirm('delete event?')) {
            arg.event.remove()
          }
        }
      });

      calendar.render();
    });
  </script>
  <script src="assets/js/weather.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
  <script>
    var CITY = "<?php echo $_SESSION['country_to'] ?>";
    getWeatherData(CITY);
  </script>
</body>

</html>