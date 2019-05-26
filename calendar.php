<?php
session_start();
include "includes/dbh.inc.php";

?>
<!DOCTYPE html>
<html>

<head>
  <title>PlanIt</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="assets/css/calendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script>
    $(document).ready(function() {
      var calendar = $('#calendar').fullCalendar({
        editable: true,
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        displayEventTime: false,
        events: 'calendar/load.php',
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {
          var title = prompt("Enter Event Title");
          if (title) {
            var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
            $.ajax({
              url: "calendar/insert.php",
              type: "POST",
              data: {
                title: title,
                start: start,
                end: end
              },
              success: function() {
                calendar.fullCalendar('refetchEvents');
                alert("Added Successfully");
              }
            })
          }
        },
        editable: true,
        eventResize: function(event) {
          var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
          var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
          var title = event.title;
          var id = event.id;
          $.ajax({
            url: "calendar/update.php",
            type: "POST",
            data: {
              title: title,
              start: start,
              end: end,
              id: id
            },
            success: function() {
              calendar.fullCalendar('refetchEvents');
              alert('Event Update');
            }
          })
        },

        eventDrop: function(event) {
          var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
          var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
          var title = event.title;
          var id = event.id;
          $.ajax({
            url: "calendar/update.php",
            type: "POST",
            data: {
              title: title,
              start: start,
              end: end,
              id: id
            },
            success: function() {
              calendar.fullCalendar('refetchEvents');
              alert("Event Updated");
            }
          });
        },

        eventClick: function(event) {
          if (confirm("Are you sure you want to remove it?")) {
            var id = event.id;
            $.ajax({
              url: "calendar/delete.php",
              type: "POST",
              data: {
                id: id
              },
              success: function() {
                calendar.fullCalendar('refetchEvents');
                alert("Event Removed");
              }
            })
          }
        },

      });
    });
  </script>
</head>

<body>
  <button style="margin-left:120px; margin-top:30px;background: #f6755e;color:#fff; border:1px solid #fff; border-radius:6px; padding:6px;" onclick="goBack()">Go Back</button>
  <button style="margin-left:120px; margin-top:30px;background: #f6755e;color:#fff; border:1px solid #fff; border-radius:6px; padding:6px;" onclick="showRec()">See recommendations</button>

  <div id="myDIV" style="display: none; margin-left: 120px; position: absolute; z-index:1000;">
      <div class="card" style="width: 300px; background: white; padding: 15px">
        <div class="card-body" id="reccard" style="width: 300px;">
          <h5 class="card-title" style="margin-left: 10px">Recommendations</h5>
          <p class="card-text" style="width: 300px;">
            <table style="width:90%;  margin-left:15px;">
              <?php
              include("includes/dbh.inc.php");
              $user = $_SESSION['userUid'];
              $sql = "select idUsers from users where uidUsers like '$user'";
              $result = $conn->query($sql);
              $row = $result->fetch_all();
              $userid = $row[0][0];
              // echo ($userid);

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
                // echo $row[$i][1]."<br>";
                $k = $row[$i][0];
                $j = $row[$i][1];
                echo "<form>
                            <input type='hidden' id='copying' name='custId' value=$k>
                                </form>";
                echo "<tr><th>$num. $k</th><th><a href='calendar/delete_recommendations_calendar.php?id=$j'><button onclick()='calendar/delete_recommendations_calendar.php?id=$j' style= 'height:30px; padding:3px; margin-top:15px;' type='button' class='btn btn-danger'>Remove</button></a></th>
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

  <script>
    function goBack() {
      window.history.back();
    }
  </script>
  <script>
    function showRec() {
      var x = document.getElementById("myDIV");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
  </script>
  <center>
    <h1 style="margin-top:-40px;border-bottom:1px solid #f1f1f1; padding-bottom:12px;">Calendar</h1>
  </center><br>
  <div class="container" style="position: relative;">
    <div id="calendar"></div>
  </div>
</body>

</html>