<!DOCTYPE html>
<html>
<head>
  <?php
      session_start();
      include "config.php"
  ?>

  <meta charset="UTF-8">
  <title>Checklist</title>
  
  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script type="text/javascript" src="checklist.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet" type="text/css">
  <link href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link rel="stylesheet" href="checklist.css">
	
</head>

<body >
    
<div id="checklist" style="margin: 0 20%;">

    <div class="cl-header" >
      <div class="contents clearfix">
        <span class="header-title">Trip checklist</span>
        <button class="header-btn add-custom-item large"> + Add item</button>
      </div>
    </div>

    <div id="item-cl" style="float:right; width:70%;">
        <div style="background-color:#ff00ff">
        </div>
      <?php
          $query = "SELECT * FROM user_checklist";
          $result = $pdo->prepare($query);
          $result->execute();
          
          if($result->rowCount() > 0){
            while($row = $result->fetch()) {
              
              echo '<div class="item-container">';
              echo '<div class="item-box">';
              if($row['item_status']==1){
                echo '<input type="checkbox" class="cl-cb" item_id="' . $row['item_id'] . '" id="check' . $row['item_id'] . '"checked/>';
              } else {
                echo '<input type="checkbox" class="cl-cb" item_id="' . $row['item_id'] . '" id="check' . $row['item_id'] . '"/>';
              }
              
              echo '<label for="check' . $row['item_id'] . '" item_id="' . $row['item_id'] . '"><div><i class="fa fa-check"></i></div>' . $row['item_name'] . '</label>';
              echo '<span class="edit-btn side-btn" item-id="' . $row['item_id'] . '"/></span> ';
              echo '<span class="remv-btn side-btn" item-id="' . $row['item_id'] . '"/></span> </div></div>';
            }
          }
        ?>
    </div>

    <div id="rec-cl" style="background-color:none; width: 25%; display:block;">
      <ul class="accordion">
        <li>
          <a class="toggle" href="javascript:void(0);" title="Click on the item to add it on your checklist!">Item Recommendation</a>
          <ul class="inner">
            <?php
              //insert code to get weather here, let's assume if the weather is sunny (I'M SORRY I DON'T HAVE IDEA HOW TO DO IT)
              $weather = 'sunny';
              $query = "SELECT * FROM checklist WHERE weather='normal' or weather='" . $weather ."'";
              $result = $pdo->prepare($query);
              $result->execute();
              if($result->rowCount() > 0){
                while($row = $result->fetch()){
                  if($row['item_hide']==1){
                    echo "<li style='display:none' checklist-id='" . $row['item_id'] ."'><a href='javascript:void(0);' onclick='doSomething(" . $row['item_id'] .");'>" . $row['item_name'] . "</a></li>";
                  } else {
                    echo "<li checklist-id='" . $row['item_id'] ."'><a href='javascript:void(0);' onclick='doSomething(" . $row['item_id'] .");'>" . $row['item_name'] . "</a></li>";
                  }
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

    <?php
      
    ?>



</div>

</body>

  <script>
    function doSomething(id){
      $("[checklist-id='"+id+"']").css("display","none");
      var type="addinto-checklist";
      $.ajax({
        url:'saveData.php',
        type:'post',
        data:{type:type,id:id},
        success:function(response){
          console.log(id);
          window.location.reload();
        }
      });
    }
  </script>
  
</html>